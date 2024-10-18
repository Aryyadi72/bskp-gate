<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\OTPMail;
use App\Mail\ActiveLoginNotification;

use App\Models\User;
use App\Models\LogActivity;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

use Carbon\Carbon;

use App\Services\OtpService;

class LoginRegisterController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function index()
    {
        $title = 'Auth Page';
        return view('auth.login', compact('title'));
    }

    public function otp_verify()
    {
        $title = 'OTP Verification Page';
        return view('auth.otp-verify', compact('title'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            $activeLogin = LogActivity::where('nik', $user->nik)
                ->where('otp_valid_until', '>', now())
                ->whereNotNull('login_at')
                ->whereNotNull('otp_verified_at')
                ->latest()
                ->first();

            if ($activeLogin) {
                $ipAddress = $request->ip();
                Mail::to($user->email)->send(new ActiveLoginNotification($user->nik, $user->email, now(), $ipAddress, $user->name));
                toastr()->closeOnHover(true)->closeDuration(10)->success('Login Berhasil!!!');
                return redirect()->route('main-app');
            }

            $pendingOtp = LogActivity::where('nik', $user->nik)
                ->where('otp_valid_until', '>', now())
                ->whereNull('otp_verified_at')
                ->latest()
                ->first();

            if ($pendingOtp) {
                Mail::to($user->email)->send(new OTPMail($pendingOtp->otp_code));

                toastr()->closeOnHover(true)->closeDuration(10)->info('OTP telah dikirim ulang ke email Anda.');
                return redirect()->route('otp-verify');
            }

            $otp = $this->otpService->generateOTP();
            $otpEncrypted = $this->otpService->hashOTP($otp);
            $getUserData = User::where('nik', $user->nik)->first();

            $loginActivity = LogActivity::create([
                'user_id' => $user->id,
                'nik' => $user->nik,
                'ip_address' => $request->ip(),
                'otp_code' => $otp,
                'otp_encrypt' => $otpEncrypted,
                'otp_valid_start' => now(),
                // 'otp_valid_until' => now()->addMinutes(1),
                'otp_valid_until' => now()->addDays(1),
            ]);

            $data = [
                'otp_code' => $otp,
                'nik' => $getUserData->nik,
                'name' => $getUserData->name,
                'email' => $getUserData->email,
                // 'otp_valid_until' => now()->addMinutes(1)->format('d-m-Y H:i'),
                'otp_valid_until' => now()->addDays(1)->format('d-m-Y H:i'),
            ];

            Mail::to($user->email)->send(new OTPMail($data));

            toastr()->closeOnHover(true)->closeDuration(10)->success('OTP telah dikirim email Anda.');
            return redirect()->route('otp-verify');
        }

        toastr()->closeOnHover(true)->closeDuration(10)->error('Silahkan isi Email & Password dengan benar.');
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
        ]);

        $loginActivity = LogActivity::where('user_id', Auth::id())
            ->where('otp_valid_until', '>', now())
            ->whereNull('otp_verified_at')
            ->whereNull('login_at')
            ->latest()
            ->first();

        if ($loginActivity && now()->lt($loginActivity->otp_valid_until)) {
            // Verifikasi OTP
            if (Hash::check($request->otp, $loginActivity->otp_encrypt)) {
                $loginActivity->update([
                    'login_at' => now(),
                    'otp_verified_at' => now(),
                ]); // Menyimpan waktu login
                return redirect()->route('main-app');
            } else {
                return back()->withErrors(['otp' => 'OTP is incorrect.']);
            }
        }

        return back()->withErrors(['otp' => 'OTP has expired.']);
    }

    public function logout()
    {
        $loginActivity = LogActivity::where('user_id', Auth::id())
            ->whereNull('logout_at')
            ->latest()
            ->first();

        if ($loginActivity) {
            $loginActivity->update([
                'logout_at' => now(),
            ]);
        }

        Auth::logout();
        toastr()->closeOnHover(true)->closeDuration(10)->success('Anda telah berhasil logout.');
        return redirect()->route('auth');
    }

    public function register_index()
    {
        $title = 'Register Page';
        return view('auth.register', compact('title'));
    }

    public function forgot_password()
    {
        $title = 'Forgot Password Page';
        return view('auth.forgot-password', compact('title'));
    }

    public function forgot_password_link(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function reset_password($token)
    {
        $title = 'Reset Password Page';
        return view('auth.reset-password', compact('title', 'token'));
    }

    public function reset_password_update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:16',
                'regex:/[A-Z]/',      // Minimal satu huruf kapital
                'regex:/[0-9]/',      // Minimal satu angka
                'regex:/[@$!%*#?&]/', // Minimal satu karakter spesial
            ],
                'password_confirmation' => 'required|same:password',
            ], [
                'password.min' => 'Password harus minimal 16 karakter.',
                'password.regex' => 'Password harus mengandung minimal satu huruf kapital, satu angka, dan satu karakter spesial (!@#$%^&*).',
                'password_confirmation.same' => 'Password dan Re-enter Password harus sama.',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function register(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:16',
                'regex:/[A-Z]/',      // Minimal satu huruf kapital
                'regex:/[0-9]/',      // Minimal satu angka
                'regex:/[@$!%*#?&]/', // Minimal satu karakter spesial
            ],
            're-password' => 'required|same:password',
        ], [
            'password.min' => 'Password harus minimal 16 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital, satu angka, dan satu karakter spesial (!@#$%^&*).',
            're-password.same' => 'Password dan Re-enter Password harus sama.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Membuat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auth::login($user);

        // Redirect ke halaman sukses atau login
        return redirect()->route('auth')->with('success', 'Registrasi berhasil! Silakan login.');
    }

}

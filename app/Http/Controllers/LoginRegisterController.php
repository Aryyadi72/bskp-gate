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

        // Autentikasi pengguna
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Cek apakah ada OTP yang masih valid dan sudah diverifikasi
            $activeLogin = LogActivity::where('nik', $user->nik)
                ->where('otp_valid_until', '>', now())
                ->whereNotNull('login_at') // OTP sudah diverifikasi
                ->whereNotNull('otp_verified_at')    // Belum logout
                ->latest()
                ->first();

            if ($activeLogin) {
                // OTP masih valid dan sudah diverifikasi, langsung masuk ke dashboard
                $ipAddress = $request->ip(); // Mendapatkan IP address pengguna
                Mail::to($user->email)->send(new ActiveLoginNotification($user->nik, $user->email, now(), $ipAddress));
                Alert::success('Success!', 'Login Berhasil!!!');
                return redirect()->route('main-app');
            }

            // Cek apakah ada OTP yang masih valid tapi belum diverifikasi
            $pendingOtp = LogActivity::where('nik', $user->nik)
                ->where('otp_valid_until', '>', now())
                ->whereNull('otp_verified_at') // OTP belum diverifikasi
                ->latest()
                ->first();

            if ($pendingOtp) {
                // OTP masih valid dan belum diverifikasi, kirim ulang OTP
                Mail::to($user->email)->send(new OTPMail($pendingOtp->otp_code));

                Alert::Info('Success!', 'OTP telah dikirim ulang ke email Anda.');
                return redirect()->route('otp.verify');
            }

            $otp = $this->otpService->generateOTP(); // Membuat OTP
            $otpEncrypted = $this->otpService->hashOTP($otp); // Meng-hash OTP

            // Menyimpan aktivitas login di database
            $loginActivity = LogActivity::create([
                'user_id' => $user->id,
                'nik' => $user->nik,
                'ip_address' => $request->ip(),
                'otp_code' => $otp, // Ini optional, untuk keperluan kirim email
                'otp_encrypt' => $otpEncrypted,
                'otp_valid_start' => now(),
                'otp_valid_until' => now()->addMinutes(10), // Misalnya OTP valid selama 10 menit
            ]);

            // Kirim OTP ke email pengguna
            Mail::to($user->email)->send(new OTPMail($otp));

            Alert::Success('Success!', 'OTP telah dikirim email Anda.');
            return redirect()->route('otp-verify');
        }

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
        Alert::success('Success!', 'Your Post as been submited!');
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

    public function register(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
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
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auth::login($user);

        // Redirect ke halaman sukses atau login
        return redirect()->route('auth')->with('success', 'Registrasi berhasil! Silakan login.');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginRegisterController extends Controller
{
    public function index()
    {
        return view('auth');
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

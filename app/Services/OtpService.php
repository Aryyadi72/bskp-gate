<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class OtpService
{
    /**
     * Generate a 6-character OTP.
     *
     * @return string
     */
    public function generateOTP()
    {
        return strtoupper(Str::random(6)); // Menghasilkan 6 karakter acak
    }

    /**
     * Hash the OTP using bcrypt.
     *
     * @param string $otp
     * @return string
     */
    public function hashOTP($otp)
    {
        return Hash::make($otp); // Menggunakan Hash facade untuk meng-hash OTP
    }
}

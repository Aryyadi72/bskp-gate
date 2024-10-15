@extends('auth.layouts.main')
@section('content')
    <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="{{ asset('assets/images/mature-1.jpg') }}" alt="" class="w-full h-full object-cover" />
    </div>

    <div
        class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">
        <div class="w-full h-100">
            <h1 class="text-xl font-bold">BSKP-GATE Forgot Password</h1>
            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">
                Reset Password
            </h1>

            <form class="mt-6" action="{{ route('reset-password-update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ request()->email }}">

                <div class="mt-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="" placeholder="Enter Password" minlength="16"
                        onfocus="showPasswordHint()" onblur="hidePasswordHint()"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        required />
                    <div id="password-hint" style="display: none; color: red; font-size: 12px">
                        Password harus memiliki:
                        <ul>
                            <li>Minimal 16 karakter</li>
                            <li>
                                Gunakan penggabungan huruf kapital, angka, dan
                                karakter spesial (!@#$%^&*)
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Re-Enter Password</label>
                    <input type="password" name="password_confirmation" id="" placeholder="Enter Password"
                        minlength="6"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        required />
                </div>

                <button type="submit"
                    class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">
                    Submit
                </button>
            </form>

            <hr class="my-6 border-gray-300 w-full" />

            <p class="mt-8">
                have account?
                <a href="{{ route('auth') }}" class="text-blue-500 hover:text-blue-700 font-semibold">
                    Back to Login
                </a>
            </p>

            <p class="text-sm text-gray-500 mt-12 text-center">
                &copy; 2021 Talwind - All Rights Reserved.
            </p>
        </div>
    </div>

    <script>
        function showPasswordHint() {
            document.getElementById("password-hint").style.display = "block";
        }

        function hidePasswordHint() {
            document.getElementById("password-hint").style.display = "none";
        }

        function validateRegisterForm() {
            const password = document.getElementById("register-password").value;
            const rePassword = document.getElementById("register-re-password").value;
            const email = document.getElementById("register-email").value;

            if (email.trim() === "") {
                alert("Email harus diisi!");
                return false;
            }

            // Regex untuk validasi password
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).{16,}$/;

            if (!passwordRegex.test(password)) {
                alert(
                    "Password harus minimal 16 karakter dan mengandung minimal satu huruf kapital, satu angka, dan satu karakter spesial (!@#$%^&*)."
                );
                return false;
            }

            if (password !== rePassword) {
                alert("Password dan Re-enter Password tidak sama");
                return false;
            }

            return true;
        }
    </script>
@endsection

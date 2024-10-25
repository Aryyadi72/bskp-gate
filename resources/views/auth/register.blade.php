@extends('auth.layouts.main')
@section('content')
    <div class="bg-blue-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
        <img src="{{ asset('assets/images/mature-2.jpg') }}" alt="" class="w-full h-full object-cover" />
    </div>

    <div
        class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12 flex items-center justify-center">
        <div class="w-full h-100">
            <h1 class="text-xl md:text-2xl font-bold leading-tight mb-3">
                Create account
            </h1>

            <form class="mt-1" action="{{ route('register.submit') }}" method="POST"
                onsubmit="return validateRegisterForm()">
                @csrf
                <div>
                    <label class="block text-gray-700">NIK</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" id="" placeholder="Enter NIK"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        autofocus autocomplete required />
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="" placeholder="Enter Name"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        autofocus autocomplete required />
                </div>

                {{-- <div class="mt-4">
                    <label for="options" class="block text-gray-700">Status</label>
                    <select id="options" name="options"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                        <option selected disabled>Select Status</option>
                        <option value="Manager">Manager</option>
                        <option value="Staff">Staff</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Regular">Regular</option>
                        <option value="Contract BSKP">Contract BSKP</option>
                    </select>
                </div> --}}

                {{-- <div class="mt-4">
                    <label for="options" class="block text-gray-700">Dept</label>
                    <select id="options" name="options"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                        <option selected disabled>Select Dept</option>
                        <option value="Acc & Fin">Acc & Fin</option>
                        <option value="BSKP">BSKP</option>
                        <option value="Factory">Factory</option>
                        <option value="FAD">FAD</option>
                        <option value="FSD">FSD</option>
                        <option value="GA">GA</option>
                        <option value="HR Legal">HR Legal</option>
                        <option value="HSE & DP">HSE & DP</option>
                        <option value="I/A">I/A</option>
                        <option value="I/B">I/B</option>
                        <option value="I/C">I/C</option>
                        <option value="II/D">II/D</option>
                        <option value="II/E">II/E</option>
                        <option value="II/F">II/F</option>
                        <option value="IT">IT</option>
                        <option value="QA & QM">QA & QM</option>
                        <option value="Security">Security</option>
                        <option value="Workshop">Workshop</option>
                    </select>
                </div> --}}

                {{-- <div class="mt-4">
                    <label for="options" class="block text-gray-700">Jabatan</label>
                    <select id="options" name="options"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                        <option selected disabled>Select Jabatan</option>
                        <option value="Adm A">Adm A</option>
                        <option value="Adm B">Adm B</option>
                        <option value="Asst Mng">Asst Mng</option>
                        <option value="Asst Mng Trainee">Asst Mng Trainee</option>
                        <option value="Cashier">Cashier</option>
                        <option value="Clerk 1">Clerk 1</option>
                        <option value="Clerk 2">Clerk 2</option>
                        <option value="CS">CS</option>
                        <option value="Dir">Dir</option>
                        <option value="Dvr">Dvr</option>
                        <option value="Dvr Mng">Dvr Mng</option>
                        <option value="HM">HM</option>
                        <option value="Insp">Insp</option>
                        <option value="Inst">Inst</option>
                        <option value="Krani">Krani</option>
                        <option value="Mdr Maint">Mdr Maint</option>
                        <option value="Mdr Tap">Mdr Tap</option>
                        <option value="Mech">Mech</option>
                        <option value="Mng">Mng</option>
                        <option value="Opr">Opr</option>
                        <option value="PD">PD</option>
                        <option value="Perawat">Perawat</option>
                        <option value="Pgs Lab">Pgs Lab</option>
                        <option value="Smk Kpr">Smk Kpr</option>
                        <option value="Spv">Spv</option>
                        <option value="Tapper">Tapper</option>
                        <option value="W Grad">W Grad</option>
                        <option value="W Mill">W Mill</option>
                        <option value="W Proc">W Proc</option>
                        <option value="W QCD">W QCD</option>
                        <option value="W WWTP">W WWTP</option>
                        <option value="Worker">Worker</option>
                    </select>
                </div> --}}

                <div class="mt-4">
                    <label class="block text-gray-700">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" id=""
                        placeholder="Enter Email Address"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        autofocus autocomplete required />
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="" placeholder="Enter Password" minlength="6"
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
                    <input type="password" name="re-password" id="" placeholder="Enter Password" minlength="6"
                        class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"
                        required />
                </div>

                <button type="submit"
                    class="w-full block bg-blue-500 hover:bg-blue-400 focus:bg-blue-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">
                    Register
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

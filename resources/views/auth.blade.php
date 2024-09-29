@extends('layouts.main')
@section('content')
    <div class="main">
        <!-- Section Header -->
        <section class="module bg-dark-30" data-background="assets/images/DJI_0555-scaled.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h1 class="module-title font-alt mb-0">Login-Register</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Login and Register Forms -->
        <section class="module">
            <div class="container">
                <div class="row">

                    <!-- Login Form -->
                    <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                        <h4 class="font-alt">Login</h4>
                        <hr class="divider-w mb-10" />
                        <form class="form">
                            <div class="form-group">
                                <input class="form-control" id="login-email" type="text" name="email"
                                    placeholder="Email" style="text-transform: none;" />
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="login-password" type="password" name="password"
                                    placeholder="Password" style="text-transform: none;" />
                            </div>
                            <div class="form-group">
                                <!-- <button class="btn btn-round btn-b">Login</button> -->
                                <a href="{{ route('main-app') }}" class="btn btn-round btn-b">Login</a>
                            </div>
                            <div class="form-group"><a href="">Forgot Password?</a></div>
                        </form>
                    </div>

                    <!-- Display Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Register Form -->
                    <div class="col-sm-5">
                        <h4 class="font-alt">Register</h4>
                        <hr class="divider-w mb-10" />
                        <form action="{{ route('register.submit') }}" method="POST" class="form"
                            onsubmit="return validateRegisterForm()">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" id="register-email" type="email" name="email"
                                    placeholder="Email" style="text-transform: none;" value="{{ old('email') }}"
                                    required />
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="register-password" type="password" name="password"
                                    placeholder="Password" style="text-transform: none;" onfocus="showPasswordHint()"
                                    onblur="hidePasswordHint()" required />
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
                            <div class="form-group">
                                <input class="form-control" id="register-re-password" type="password" name="re-password"
                                    placeholder="Re-enter Password" style="text-transform: none;" required />
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-round btn-b" type="submit">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        <!-- ... (Footer code remains unchanged) -->

        <!-- JavaScripts ============================================= -->
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

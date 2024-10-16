@extends('layouts.main')
@section('content')
    @include('sweetalert::alert')
    <link href="{{ asset('assets-main/assets/libs/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-main/assets/libs/jquery-steps/steps.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="card-body wizard-content">
                <h4 class="card-title">Basic Form Example</h4>
                <h6 class="card-subtitle"></h6>
                <form id="example-form" action="{{ route('user-store') }}" class="m-t-40" method="POST">
                    @csrf
                    <div>
                        <h3>Account</h3>
                        <section>
                            <label for="email">Email *</label>
                            <input id="email" name="email" type="text" class="required email form-control">
                            <label for="password">Password *</label>
                            <input id="password" name="password" type="password" class="required form-control"
                                onfocus="showPasswordHint()" onblur="hidePasswordHint()">
                            <div id="password-hint" style="display: none; color: red; font-size: 12px">
                                Password harus memiliki:
                                <ul>
                                    <li>Minimal 16 karakter</li>
                                    <li>
                                        Gunakan penggabungan huruf kapital, angka, dan
                                        karakter spesial (!@#$%^&*)
                                    </li>
                                </ul>
                                <br>
                            </div>
                            <label for="confirm">Confirm Password *</label>
                            <input id="confirm" name="confirm" type="password" class="required form-control">
                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Profile</h3>
                        <section>
                            <label for="nik">NIK *</label>
                            <input id="nik" name="nik" type="text" class="required form-control">
                            <label for="name">Name *</label>
                            <input id="name" name="name" type="text" class="required form-control">
                            <label for="status">Status *</label>
                            <input id="status" name="status" type="text" class="required form-control">
                            <label for="dept">Dept *</label>
                            <input id="dept" name="dept" type="text" class="required form-control">
                            <label for="jabatan">Jabatan *</label>
                            <input id="jabatan" name="jabatan" type="text" class="required form-control">
                            <p>(*) Mandatory</p>
                        </section>
                        <h3>Hints</h3>
                        <section>
                            <ul>
                                <li>Pastikan semua data yang diinputkan sudah benar.</li>
                                <li>Pastikan untuk mengingat password yang anda inputkan.</li>
                                <li>Pastikan untuk tidak memberikan informasi rahasia apapun kepada orang lain.</li>
                            </ul>
                        </section>
                        <h3>Finish</h3>
                        <section>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                        </section>
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>

    <script src="{{ asset('assets-main/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-main/assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets-main/assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
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
    <script>
        // Basic Example with form
        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                // alert("Submitted!");
                form.submit();
            }
        });
    </script>
@endsection

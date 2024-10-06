@extends('layouts.main')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal2"><i
                                class="mdi mdi-library-plus"></i>
                            Tambah</button>
                        <br><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>IP Address</th>
                                        <th>OTP Code</th>
                                        <th>OTP Valid Start</th>
                                        <th>OTP Valid End</th>
                                        <th>OTP Verified At</th>
                                        <th>Login Time</th>
                                        <th>Logout Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $index => $log)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $log->nik }}</td>
                                            <td>{{ $log->ip_address }}</td>
                                            <td>{{ $log->otp_code }}</td>
                                            <td>{{ $log->otp_valid_start }}</td>
                                            <td>{{ $log->otp_valid_until }}</td>
                                            <td>{{ $log->otp_verified_at }}</td>
                                            <td>{{ $log->login_at }}</td>
                                            <td>{{ $log->logout_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection

@extends('layouts.main')
@section('content')
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('user-create') }}" class="btn btn-primary btn-sm"><i
                                class="mdi mdi-library-plus"></i> Tambah</a>
                        <br><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Dept</th>
                                        <th>Jabatan</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userAccount as $index => $ua)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $ua->nik }}</td>
                                            <td>{{ $ua->name }}</td>
                                            <td>{{ $ua->status }}</td>
                                            <td>{{ $ua->dept }}</td>
                                            <td>{{ $ua->jabatan }}</td>
                                            <td>{{ $ua->email }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#Modal-edit-{{ $ua->id }}"><i
                                                        class="mdi mdi-table-edit"></i> Ubah</button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#Modal-delete-{{ $ua->id }}"><i
                                                        class="mdi mdi-delete-forever"></i> Hapus</button>

                                                <a href="{{ $ua->url }}" target="_blank"
                                                    class="btn btn-dark btn-sm"><i class="mdi mdi-open-in-new"></i>
                                                    Akses</a>
                                            </td>
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

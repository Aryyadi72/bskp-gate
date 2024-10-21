@extends('layouts.main')
@section('content')
    @include('sweetalert::alert')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h3 class="page-title">{{ $title }}</span>
                </h3>
                <div class="ml-auto text-right">
                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#Modal2"><i
                            class="mdi mdi-library-plus"></i>
                        Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="my-3">
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Aplikasi</th>
                                        <th>Role</th>
                                        <th>Opt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $index => $role)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $role->nik }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->email }}</td>
                                            <td>{{ $role->appname }}</td>
                                            <td>{{ $role->role }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#Modal-edit-{{ $role->roleid }}"><i
                                                        class="mdi mdi-table-edit"></i> Ubah</button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#Modal-delete-{{ $role->roleid }}"><i
                                                        class="mdi mdi-delete-forever"></i> Hapus</button>

                                                {{-- <a href="{{ $roleurl }}" target="_blank" class="btn btn-dark btn-sm"><i
                                                        class="mdi mdi-open-in-new"></i> Akses</a> --}}
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

    {{-- Modal Create --}}
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('role-app-store', ['token' => session('jwt_token')]) }}" class="form-horizontal"
                method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Aplikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group row">
                                            <label class="col-sm-3 text-left control-label col-form-label">User</label>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control custom-select"
                                                    style="width: 100%; height:36px;" name="user_id">
                                                    <option selected disabled>Select Name</option>
                                                    @foreach ($listUsersAdd as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 text-left control-label col-form-label">Apps</label>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control custom-select"
                                                    style="width: 100%; height:36px;" name="app_id">
                                                    <option selected disabled>Select App</option>
                                                    @foreach ($listAppsAdd as $app)
                                                        <option value="{{ $app->id }}">{{ $app->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 text-left control-label col-form-label">Role</label>
                                            <div class="col-sm-9">
                                                <select class="select2 form-control custom-select"
                                                    style="width: 100%; height:36px;" name="role">
                                                    <option selected disabled>Select Role</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Inputer">Inputer</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    @foreach ($roles as $role)
        <div class="modal fade" id="Modal-edit-{{ $role->roleid }}" tabindex="-1" role="dialog"
            aria-labelledby="Modal-edit-{{ $role->roleid }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('role-app-update', ['roleid' => $role->roleid, 'token' => session('jwt_token')]) }}"
                    class="form-horizontal" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Aplikasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="form-group row">
                                                <label class="col-sm-3 text-left control-label col-form-label">User</label>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control custom-select"
                                                        style="width: 100%; height:36px;" name="user_id">
                                                        @foreach ($lisUsersUpdate as $user)
                                                            <option
                                                                value="{{ $user->id }} {{ $user->id == $role->user_id ? 'selected' : '' }}">
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 text-left control-label col-form-label">Apps</label>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control custom-select"
                                                        style="width: 100%; height:36px;" name="app_id">
                                                        @foreach ($listAppsUpdate as $app)
                                                            <option
                                                                value="{{ $app->id }} {{ $app->id == $role->app_id ? 'selected' : '' }}">
                                                                {{ $app->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 text-left control-label col-form-label">Role</label>
                                                <div class="col-sm-9">
                                                    <select class="select2 form-control custom-select"
                                                        style="width: 100%; height:36px;" name="role">
                                                        <option value="Admin"
                                                            {{ $role->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="Inputer"
                                                            {{ $role->role == 'Inputer' ? 'selected' : '' }}>Inputer
                                                        </option>
                                                        <option value="User"
                                                            {{ $role->role == 'User' ? 'selected' : '' }}>User</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal Delete --}}
        <div id="Modal-delete-{{ $role->roleid }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="Modal-delete-{{ $role->roleid }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="primary-header-modalLabel">Hapus Data
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="{{ route('app-delete', $role->roleid) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" class="form-control" name="id" value="{{ $role->roleid }}"><br>
                        <p class="mx-3">Apakah anda yakin ingin menghapus data?</p>
                        <input type="hidden" name="token" value="{{ session('jwt_token') }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endforeach


    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection

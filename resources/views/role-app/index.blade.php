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
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->nik }}">{{ $user->name }}</option>
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
                                                    @foreach ($apps as $app)
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
                                                    <option>Admin</option>
                                                    <option>Inputer</option>
                                                    <option>User</option>
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
    {{-- @foreach ($roles as $role)
        <div class="modal fade" id="Modal-edit-{{ $role->id }}" tabindex="-1" role="dialog"
            aria-labelledby="Modal-edit-{{ $role->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('app-update', $role->id, ['token' => session('jwt_token')]) }}"
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
                                                <label for="fname"
                                                    class="col-sm-3 text-left control-label col-form-label">Apps
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="fname"
                                                        name="name" value="{{ $role->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="lname"
                                                    class="col-sm-3 text-left control-label col-form-label">URL</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname"
                                                        name="url" value="{{ $role->url }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="lname"
                                                    class="col-sm-3 text-left control-label col-form-label">Color</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-danger-{{ $link->id }}" name="color"
                                                            value="danger"
                                                            {{ $link->color == 'danger' ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-danger-{{ $link->id }}">Red</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-success-{{ $link->id }}" name="color"
                                                            value="success"
                                                            {{ $link->color == 'success' ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-success-{{ $link->id }}">Green</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-cyan-{{ $link->id }}" name="color"
                                                            value="cyan" {{ $link->color == 'cyan' ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-cyan-{{ $link->id }}">Blue</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-warning-{{ $link->id }}" name="color"
                                                            value="warning"
                                                            {{ $link->color == 'warning' ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-warning-{{ $link->id }}">Yellow</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-primary-{{ $link->id }}" name="color"
                                                            value="primary"
                                                            {{ $link->color == 'primary' ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-primary-{{ $link->id }}">Purple</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-secondary-{{ $link->id }}" name="color"
                                                            value="secondary"
                                                            {{ $link->color == 'secondary' ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-secondary-{{ $link->id }}">Gray</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-info-{{ $link->id }}" name="color"
                                                            value="info" {{ $link->color == 'info' ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-info-{{ $link->id }}">Navy</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="color-dark-{{ $link->id }}" name="color"
                                                            value="dark"
                                                            {{ $link->color == 'dark' || is_null($link->color) ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="color-dark-{{ $link->id }}">Black</label>
                                                    </div>
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
        </div> --}}

    {{-- Modal Delete --}}
    {{-- <div id="Modal-delete-{{ $link->id }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="Modal-delete-{{ $link->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-danger">
                        <h4 class="modal-title" id="primary-header-modalLabel">Hapus Data
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="{{ route('app-delete', $link->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" class="form-control" name="id" value="{{ $link->id }}"><br>
                        <p class="mx-3">Apakah anda yakin ingin menghapus data?</p>
                        <input type="hidden" name="token" value="{{ session('jwt_token') }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal --> --}}
    {{-- @endforeach --}}


    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection

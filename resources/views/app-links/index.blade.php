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
                                        <th>Nama Aplikasi</th>
                                        <th>URL</th>
                                        <th>Slug</th>
                                        <th>Opt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($links as $index => $link)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $link->name }}</td>
                                            <td>{{ $link->url }}</td>
                                            <td>{{ $link->slug }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#Modal-edit-{{ $link->id }}"><i
                                                        class="mdi mdi-table-edit"></i> Ubah</button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#Modal-delete-{{ $link->id }}"><i
                                                        class="mdi mdi-delete-forever"></i> Hapus</button>

                                                <a href="{{ $link->url }}" target="_blank" class="btn btn-dark btn-sm"><i
                                                        class="mdi mdi-open-in-new"></i> Akses</a>
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
            <form action="{{ route('app-store') }}" class="form-horizontal" method="POST">
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
                                            <label for="fname"
                                                class="col-sm-3 text-left control-label col-form-label">Apps
                                                Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="fname" name="name"
                                                    placeholder="First Name Here">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lname"
                                                class="col-sm-3 text-left control-label col-form-label">URL</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="lname" name="url"
                                                    placeholder="Last Name Here">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="lname"
                                                class="col-sm-3 text-left control-label col-form-label">Color</label>
                                            <div class="col-sm-9">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="danger"
                                                        name="color" value="danger" required>
                                                    <label class="custom-control-label" for="danger">Red</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidation2" name="color" value="success"
                                                        required>
                                                    <label class="custom-control-label"
                                                        for="customControlValidation2">Green</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidation3" name="color" value="cyan"
                                                        required>
                                                    <label class="custom-control-label"
                                                        for="customControlValidation3">Blue</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidation1" name="color" value="warning"
                                                        required>
                                                    <label class="custom-control-label"
                                                        for="customControlValidation1">Yellow</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidation2" name="color" value="primary"
                                                        required>
                                                    <label class="custom-control-label"
                                                        for="customControlValidation2">Purple</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidation3" name="color" value="secondary"
                                                        required>
                                                    <label class="custom-control-label"
                                                        for="customControlValidation3">Gray</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidation3" name="color" value="info"
                                                        required>
                                                    <label class="custom-control-label"
                                                        for="customControlValidation3">Navy</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input"
                                                        id="customControlValidation3" name="color" value="dark"
                                                        required>
                                                    <label class="custom-control-label"
                                                        for="customControlValidation3">Black</label>
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit --}}
    @foreach ($links as $link)
        <div class="modal fade" id="Modal-edit-{{ $link->id }}" tabindex="-1" role="dialog"
            aria-labelledby="Modal-edit-{{ $link->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('app-update', $link->id) }}" class="form-horizontal" method="POST">
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
                                                        name="name" value="{{ $link->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="lname"
                                                    class="col-sm-3 text-left control-label col-form-label">URL</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lname"
                                                        name="url" value="{{ $link->url }}">
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
        </div>

        {{-- Modal Delete --}}
        <div id="Modal-delete-{{ $link->id }}" class="modal fade" tabindex="-1" role="dialog"
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

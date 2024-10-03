@extends('layouts.main')
@section('content')
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
                                        <th>Opt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($links as $index => $link)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $link->name }}</td>
                                            <td>{{ $link->url }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#Modal-edit-{{ $link->id }}"><i
                                                        class="mdi mdi-table-edit"></i> Ubah</button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#Modal-delete-{{ $link->id }}"><i
                                                        class="mdi mdi-delete-forever"></i> Hapus</button>

                                                {{-- <button type="button" class="btn btn-dark btn-sm"><i
                                                        class="mdi mdi-open-in-new"></i> Akses</button> --}}

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

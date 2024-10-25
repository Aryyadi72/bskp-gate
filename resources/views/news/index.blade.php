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
                                        <th>Title</th>
                                        <th>URL</th>
                                        <th>Slug</th>
                                        <th>Opt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $index => $new)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $new->name }}</td>
                                            <td>{{ $new->url }}</td>
                                            <td>{{ $new->slug }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#Modal-edit-{{ $new->id }}"><i
                                                        class="mdi mdi-table-edit"></i> Ubah</button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#Modal-delete-{{ $new->id }}"><i
                                                        class="mdi mdi-delete-forever"></i> Hapus</button>

                                                <a href="{{ $new->url }}" target="_blank" class="btn btn-dark btn-sm"><i
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

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection

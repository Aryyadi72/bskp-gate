@extends('layouts.main')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Selamat Datang, <span class="text-info">{{ auth()->user()->name }}</span>
                </h4>
                <div class="ml-auto text-right">
                    <div id="time">
                        {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        @php
            $token = request()->query('token');
        @endphp
        <div class="row">
            @foreach ($links as $link)
                <div class="col-md-6 col-lg-2">
                    <div class="card card-hover">
                        <a href="{{ $link->url }}?token={{ session('jwt_token') }}" target="_blank"
                            title="{{ $link->slug }}">
                            <div class="box bg-{{ $link->color ?? 'dark' }} text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-apps"></i></h1>
                                <h6 class="text-white">{{ $link->name }}</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/absen/public" target="_blank">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-account-multiple"></i></h1>
                            <h6 class="text-white">Attendance Management</h6>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/daily-new/public" target="_blank">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-factory"></i></h1>
                            <h6 class="text-white">BSKP Production</h6>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/kpi/public" target="_blank">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-trophy"></i></h1>
                            <h6 class="text-white">BSKP KPI</h6>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/zen-z-zai/public" target="_blank">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-file-document"></i></h1>
                            <h6 class="text-white">Zen-Z-Zai</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/doc-app/public" target="_blank">
                        <div class="box bg-secondary text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-clipboard-text"></i></h1>
                            <h6 class="text-white">BSKP SOP</h6>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/salary/public" target="_blank">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-cash-100"></i></h1>
                            <h6 class="text-white">BSKP Salary</h6>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/soilcondition/s/public" target="_blank">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-google-maps"></i></h1>
                            <h6 class="text-white">BSKP MAP</h6>
                        </div>
                    </a>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-3">
                <div class="card card-hover">
                    <a href="http://192.168.99.202/nextcloud" target="_blank">
                        <div class="box bg-primary text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-cloud-sync"></i></h1>
                            <h6 class="text-white">Nextcloud</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <!-- card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">News Updates</h4>
                    </div>
                    <ul class="list-style-none">
                        <li class="d-flex no-block card-body">
                            <i class="fa fa-check-circle w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">Lorem ipsum dolor sit, amet consectetur
                                    adipisicing elit. Similique perferendis deserunt porro fugit fugiat aspernatur, itaque,
                                    at beatae, iste facilis mollitia? Nemo vel libero doloribus, quam tempora porro sed
                                    cumque!</a>
                                <span class="text-muted">dolor sit amet, consectetur adipiscing</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">20</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex no-block card-body border-top">
                            <i class="fa fa-gift w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">Congratulation Maruti, Happy
                                    Birthday</a>
                                <span class="text-muted">many many happy returns of the day</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">11</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex no-block card-body border-top">
                            <i class="fa fa-plus w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">Maruti is a Responsive Admin
                                    theme</a>
                                <span class="text-muted">But already everything was solved. It will ...</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">19</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex no-block card-body border-top">
                            <i class="fa fa-leaf w-30px m-t-5"></i>
                            <div>
                                <a href="#" class="m-b-0 font-medium p-0">Envato approved Maruti Admin
                                    template</a>
                                <span class="text-muted">i am very happy to approved by TF</span>
                            </div>
                            <div class="ml-auto">
                                <div class="tetx-right">
                                    <h5 class="text-muted m-b-0">20</h5>
                                    <span class="text-muted font-16">Jan</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

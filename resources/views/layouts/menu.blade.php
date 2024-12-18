<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">My Profile</span>
                    </a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('main-app', ['token' => session('jwt_token')]) }}" aria-expanded="false"><i
                            class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                @if (auth()->user()->dept == 'IT')
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('app-index', ['token' => session('jwt_token')]) }}" aria-expanded="false"><i
                                class="mdi mdi-apps"></i><span class="hide-menu">App</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('log-index', ['token' => session('jwt_token')]) }}" aria-expanded="false"><i
                                class="mdi mdi-account-alert"></i><span class="hide-menu">Activity Log</span></a></li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('user-index', ['token' => session('jwt_token')]) }}" aria-expanded="false"><i
                                class="mdi mdi-account-multiple"></i><span class="hide-menu">User Account</span></a>
                    </li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="{{ route('role-app-index', ['token' => session('jwt_token')]) }}"
                            aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">User
                                Role</span></a>
                    </li>
                @endif

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="hide-menu">News</span></a>
                </li>

                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="sidebar-link waves-effect waves-dark sidebar-link"
                            style="background: none; border: none; cursor: pointer;">
                            <i class="mdi mdi-logout"></i><span class="hide-menu">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

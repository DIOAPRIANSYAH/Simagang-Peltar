<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="flex justify-center items-center text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo mr-5" href="#">
            <img src="{{ asset('assets/images/logo ptba.png') }}" class="mr-2 mx-auto" alt="logo" />
        </a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-toggle="dropdown"
                    id="profileDropdown">
                    <img src="{{ asset('storage/images/users/' . Auth::user()->foto) }}" alt="profile"
                        style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;" />
                    <p class="mb-0">{{ Auth::user()->name }}</p>
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <a role="menuitem" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off text-primary"></i>
                            Logout
                        </a>
                    </form>
                </div>
            </li>
            <li class="nav-item nav-settings d-none d-lg-flex">
                <a class="nav-link" href="#">
                    <i class="icon-ellipsis"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>

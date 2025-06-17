<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <!-- BEGIN NAVBAR TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- END NAVBAR TOGGLER -->
        <!-- BEGIN NAVBAR LOGO -->
        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">

            @if (Session::get('is_admin_logged_in'))
                <img alt="iauoffsa" width="150" src="{{ asset('src/dist/img/icons/brands/logo3.png') }}">
            @else
                <a class="d-flex" href="/">
                    <img alt="iauoffsa" width="150" src="{{ asset('src/dist/img/icons/brands/logo3.png') }}">
                </a>
            @endif

            @yield('message')
        </div>
        <!-- END NAVBAR LOGO -->
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{ asset('src/dist/img/icons/brands/logo2.png') }})"><span
                            class="badge bg-green"></span> </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>black Jack.</div>
                        <div class="mt-1 small text-secondary">Administrator</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">ស្ថានភាព</a>
                    <div class="dropdown-item" id="login-time" data-time="{{ session()->get('login_at', now()) }}">
                        {{-- {{ session()->get('login_at', now())->diffForHumans() }} --}}
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="/admins/change-password" class="dropdown-item">ផ្លាស់ប្ដូរពាក្យសម្ងាត់</a>

                    <a href="/admins/logout" class="dropdown-item text-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

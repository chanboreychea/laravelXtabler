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

            @php
                $alerts = [];

                if (session('success')) {
                    $alerts[] = ['type' => 'success', 'message' => session('success')];
                }

                if (session('error')) {
                    $alerts[] = ['type' => 'danger', 'message' => session('error')];
                }

            @endphp

            @if (!empty($alerts))
                <div class="alert-wrapper top-0 start-50 translate-middle-x mt-3"
                    style="z-index: 1050; position: fixed; width: 100%;">
                    @foreach ($alerts as $index => $alert)
                        <div id="alert-{{ $index }}"
                            class="alert-container d-flex align-items-center justify-content-center mb-2"
                            data-aos="fade-down" data-aos-delay="{{ 100 + $index * 100 }}">
                            <div class="alert alert-important text-light bg-{{ $alert['type'] }} alert-dismissible d-flex align-items-center shadow"
                                role="alert">
                                <div class="m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                </div>
                                <div class="fs-5 ms-2">
                                    {{ $alert['message'] }}
                                </div>
                                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <!-- END NAVBAR LOGO -->
        <div class="navbar-nav flex-row order-md-last">
            {{-- <div class="d-none d-md-flex">
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications" data-bs-auto-close="outside" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-1">
                            <path
                                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                            </path>
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                        </svg>
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="card-title">ការជូនដំណឹង!!!</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="avatar"
                                                style="background-image: url({{ asset('src/dist/img/icons/brands/logo2.png') }})"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <a href="#"
                                                class="text-body d-block">សូមស្វាគមន៍មកកាន់គេហទំព័ររបស់យើង</a>
                                            <div class="d-block text-secondary mt-1">
                                                សូមចូលរួមជាមួយយើងដើម្បីទទួលបានព័ត៌មានថ្មីៗ</div>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-secondary small">1 នាទីមុន</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn btn-2 w-100"> Archive all </a>
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-2 w-100"> Mark all as read </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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

@extends('template.master')

@section('title', 'Dashboard')

@section('contents')

    <div class="page-center d-flex align-items-start justify-content-center min-vh-100 position-relative">

        <div class="container-xl">

            <div class="page-body">

                <div class="row row-deck g-3 row-cards">

                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="500">
                        <a href="/confirmation-letters/create"
                            class="card card-link card-link-pop text-primary p-5 d-flex align-items-center justify-content-center hover-shadow">
                            <div class="card-stamp">
                                <div class="card-stamp-icon bg-vk">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path
                                            d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                        <path d="M12 7v10" />
                                    </svg>
                                </div>
                            </div>
                            <div class="avatar avatar-md mb-3 bg-primary-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path
                                        d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                    <path d="M12 7v10" />
                                </svg>
                            </div>
                            <strong class="mt-2">ទទួលថវិកាជាតិ</strong>
                        </a>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="500">
                        <a href="/confirmation-letters/index"
                            class="card card-link card-link-pop text-primary p-5 d-flex align-items-center justify-content-center hover-shadow">
                            <div class="card-stamp">
                                <div class="card-stamp-icon bg-vk">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5" />
                                        <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="avatar avatar-md mb-3 bg-primary-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5" />
                                    <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4" />
                                </svg>
                            </div>
                            <strong class="mt-2">ប្រើប្រាស់ថវិកាជាតិ</strong>
                        </a>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="500">
                        <a href="/confirmation-letters/create"
                            class="card card-link card-link-pop text-primary p-5 d-flex align-items-center justify-content-center hover-shadow">
                            <div class="card-stamp">
                                <div class="card-stamp-icon bg-vk">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path
                                            d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                        <path d="M12 7v10" />
                                    </svg>
                                </div>
                            </div>
                            <div class="avatar avatar-md mb-3 bg-primary-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-coin">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                    <path
                                        d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                                    <path d="M12 7v10" />
                                </svg>
                            </div>
                            <strong class="mt-2">ទទួលភាគទាន</strong>
                        </a>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 aos-init aos-animate" data-aos="zoom-in"
                        data-aos-delay="500">
                        <a href="/confirmation-letters/index"
                            class="card card-link card-link-pop text-primary p-5 d-flex align-items-center justify-content-center hover-shadow">
                            <div class="card-stamp">
                                <div class="card-stamp-icon bg-vk">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5" />
                                        <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="avatar avatar-md mb-3 bg-primary-lt">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-moneybag">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5" />
                                    <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4" />
                                </svg>
                            </div>
                            <strong class="mt-2">ប្រើប្រាស់ភាគទាន</strong>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection

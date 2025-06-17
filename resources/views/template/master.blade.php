<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('src/dist/img/favicon/favicon.ico') }}">

    <!-- CSS -->
    <link href="{{ asset(path: 'src/dist/css/tabler.min.css?1745427592') }}" rel="stylesheet" />
    <link href="{{ asset(path: 'src/dist/css/tabler-themes.min.css?1745427592') }}" rel="stylesheet" />
    <link href="{{ asset(path: 'src/dist/libs/tom-select/dist/css/tom-select.bootstrap5.min.css?1745427592') }}"
        rel="stylesheet" />
    <!-- end css  -->

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset(path: 'src/dist/css/tabler-vendors.min.css?1745427592') }}" rel="stylesheet" />
    <title>@yield('title')</title>

</head>

<body>
    <script src="{{ asset(path: 'src/dist/js/tabler-theme.min.js?1745427592') }}"></script>

    <div class="page">
        <!-- BEGIN NAVBAR  -->
        @if (request()->segment(1) != '')
            <div class="sticky-top">

                @include('template.header')

                @include('template.navbar')
            </div>
        @endif

        <div class="page-wrapper">
            <!-- BEGIN PAGE HEADER -->
            @if (request()->segment(1) == 'admins')
            @endif
            <!-- END PAGE HEADER -->

            <!-- BEGIN PAGE BODY -->
            @yield('contents')
            <!-- END PAGE BODY -->

            <!--  BEGIN FOOTER  -->
            {{-- @if (request()->segment(1) != '')
                <footer class="footer py-1">
                    <div class="container-xl">
                        <div class="row">

                            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                                <div class="footer-social">
                                    <a class="icon-socials icon-facebook"
                                        href="https://www.facebook.com/profile.php?id=100069646752356" target="_blank">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook m-0">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="icon-socials icon-youtube"
                                        href="https://www.youtube.com/channel/UCzZH_Yx9_deWTDWT3XLjwZQ" target="_blank">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube m-0">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                                                <path d="M10 9l5 3l-5 3z" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="icon-socials icon-internet" href="https://iauoffsa.gov.kh"
                                        target="_blank">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-world m-0">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                <path d="M3.6 9h16.8" />
                                                <path d="M3.6 15h16.8" />
                                                <path d="M11.5 3a17 17 0 0 0 0 18" />
                                                <path d="M12.5 3a17 17 0 0 1 0 18" />
                                            </svg>
                                        </span>
                                    </a>
                                    <a class="icon-socials icon-internet" href="https://t.me/iauoffsa" target="_blank">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram me-0">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <a class="footer-logo d-flex justify-content-center" href="/">
                                    <img alt="iauoffsa" width="70"
                                        src="{{ asset('src/dist/img/icons/brands/logo2.png') }}">
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                                <div class="font-xs color-text-paragraph-2 text-primary">
                                    អាសយដ្ឋាន ៖​ អគាលេខ ១៦៨F (ជាន់ទី៩) ផ្លូវ ៥៩៨
                                    សង្កាត់ច្រាំងចំរេះ១ ខណ្ឌឬស្សីកែវ រាជធានីភ្នំពេញ
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            @endif --}}
            <!--  END FOOTER  -->
        </div>
    </div>

    <script src="{{ asset(path: 'src/dist/js/tabler.min.js?1745427592') }}"></script>

    <script src="{{ asset(path: 'src/dist/libs/apexcharts/dist/apexcharts.min.js?1745427592') }}" defer></script>
    <script src="{{ asset(path: 'src/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1745427592') }}" defer></script>
    <!-- JS Vector Maps -->
    <script src="{{ asset(path: 'src/dist/libs/jsvectormap/dist/maps/world.js') }}?1745427592" defer></script>
    <script src="{{ asset(path: 'src/dist/libs/jsvectormap/dist/maps/world-merc.js') }}?1745427592" defer></script>

    <!-- noUiSlider -->
    <script src="{{ asset(path: 'src/dist/libs/nouislider/dist/nouislider.min.js?1745427592') }}" defer></script>

    <!-- Litepicker -->
    <script src="{{ asset(path: 'src/dist/libs/litepicker/dist/litepicker.js?1745427592') }}" defer></script>

    <!-- Tom Select -->
    <script src="{{ asset(path: 'src/dist/libs/tom-select/dist/js/tom-select.base.min.js?1745427592') }}" defer></script>
    <script src="{{ asset(path: 'src/dist/libs/litepicker/dist/litepicker.js') }}" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{ asset(path: 'src/js/tomselect.js') }}"></script>
    <script src="{{ asset(path: 'src/js/date-picker.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: false,
        });

        function updateLoginTime() {
            let loginAt = document.getElementById("login-time").getAttribute("data-time");
            let timeDiff = moment(loginAt).fromNow();
            document.getElementById("login-time").innerText = timeDiff;
        }

        // run immediately
        updateLoginTime();

        // update every 1 minute
        setInterval(updateLoginTime, 60000);
    </script>

    <!-- new theme customization  -->
    <script>
        // Apply saved theme settings immediately before DOM fully loads
        (function() {
            const themeConfig = {
                theme: "light",
                "theme-base": "gray",
                "theme-font": "khmer",
                "theme-primary": "blue",
                "theme-radius": "1",
            };
            for (const key in themeConfig) {
                const value = localStorage.getItem("tabler-" + key) || themeConfig[key];
                document.documentElement.setAttribute("data-bs-" + key, value);
            }
        })();

        document.addEventListener("DOMContentLoaded", function() {
            var themeConfig = {
                theme: "light",
                "theme-base": "gray",
                "theme-font": "khmer",
                "theme-primary": "blue",
                "theme-radius": "1",
            };

        });
    </script>

    <!-- for validation  -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

    {{-- Auto-remove script of alert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert-container');

            alerts.forEach((alert, index) => {
                setTimeout(() => {
                    alert.classList.add('fade');
                    setTimeout(() => {
                        alert.remove();
                    }, 500); // time to wait after fade
                }, 5000 + index * 200); // delay auto-remove (5s + offset per alert)
            });
        });
    </script>

    {{-- Format number --}}
    <script>
        class NumberFormatter {
            constructor(selector) {
                this.inputs = document.querySelectorAll(selector);
                this.attachEvents();
            }

            attachEvents() {
                this.inputs.forEach(input => {
                    input.addEventListener('input', () => this.format(input));
                });
            }

            format(input) {
                // Remove all non-numeric characters
                let value = input.value.replace(/[^0-9]/g, '');
                // Format with commas
                input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }

            // Optional: Method to get clean numeric value without commas
            static getRawValue(input) {
                return input.value.replace(/,/g, '');
            }
        }

        // Initialize formatter for inputs with class "format-number"
        new NumberFormatter('.format-number');
    </script>
</body>

</html>

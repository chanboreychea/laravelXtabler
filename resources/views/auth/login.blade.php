@extends('template.master')

@section('title', 'ចូលគ្រប់គ្រងប្រព័ន្ធ')

@section('contents')

    <div class="page page-center d-flex align-items-center justify-content-center min-vh-100 position-relative">
        <div class="container container-tight py-4">

            <div class="card card-md">
                <form class="needs-validation" novalidate action="/admins/login" method="POST">
                    @csrf
                    <div class="card-header d-flex justify-content-center">
                        <img src="{{ asset('src/dist/img/icons/brands/logo3.png') }}" alt="logo">

                    </div>
                    <div class="card-status-top bg-blue"></div>
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <h2>ប្រព័ន្ធកិច្ចបញ្ជីការគណនេយ្យ</h2>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">អ្នកគ្រប់គ្រង</label>
                            <input type="email" class="form-control" name="username"
                                placeholder="EXAMPLE_EMAIL@iauoffsa.gov.kh" required>
                            <div class="invalid-feedback">
                                សូមវាយបញ្ចូលអាសយដ្ឋានអ៊ីមែល
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">ពាក្យសម្ងាត់</label>
                            <div class="input-group input-group-flat">
                                <input type="password"
                                    style="font-family: system-ui, 'khmer mef1', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                                    class="form-control" name="password" placeholder="ពាក្យសម្ងាត់" autocomplete="off"
                                    id="password">
                                <span class="input-group-text">
                                    <div class="link-secondary" data-bs-toggle="tooltip"
                                        onclick="togglePasswordVisibility()" aria-label="Show password"
                                        data-bs-original-title="Show password">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-eye cursor-pointer" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="2"></circle>
                                            <path
                                                d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7">
                                            </path>
                                        </svg>
                                    </div>
                                </span>
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-check text-primary">
                                <input type="checkbox" class="form-check-input cursor-pointer">
                                <span class="form-check-label cursor-pointer">Remember me.</span>
                            </label>
                        </div> --}}

                        <div class="mt-3">
                            <button class="btn btn-primary hover-shadow w-100" type="submit" name="login">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-login-2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2" />
                                    <path d="M3 12h13l-3 -3" />
                                    <path d="M13 15l3 -3" />
                                </svg>
                                <span>ចូលគ្រប់គ្រងប្រព័ន្ធ</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- for show and hide password  -->
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var passwordIcon = document.querySelector('.input-group-text svg');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('icon-tabler-eye');
                passwordIcon.classList.add('icon-tabler-eye-off');
                passwordIcon.innerHTML = `
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.585 10.587a2 2 0 0 0 2.829 2.828" /><path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.6 0 -6.6 -2 -9 -6c1.272 -2.12 2.712 -3.678 4.32 -4.674m2.86 -1.146a9.055 9.055 0 0 1 1.82 -.18c3.6 0 6.6 2 9 6c-.666 1.11 -1.379 2.067 -2.138 2.87" /><path d="M3 3l18 18" /></svg>
                `;
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('icon-tabler-eye-off');
                passwordIcon.classList.add('icon-tabler-eye');
                passwordIcon.innerHTML = `
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <circle cx="12" cy="12" r="2" />
                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                `;
            }
        }
    </script>
    <!-- end show and hide password  -->
@endsection

@extends('template.master')

@section('title', 'ការផ្លាស់ប្ដូរពាក្យសម្ងាត់')

@section('contents')

    <div class="page page-center d-flex justify-content-center min-vh-70 pt-5">
        <div class="container container-tight pt-5">

            <div class="card">
                <form action="/admins/change-password" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-status-top bg-blue"></div>
                    <div class="card-body">

                        <div class="mb-5">
                            <label class="form-label">ពាក្យសម្ងាត់ចាស់</label>
                            <div class="input-group input-group-flat">
                                <input type="password"
                                    style="font-family: system-ui, 'khmer mef1', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                                    class="form-control" name="password" autocomplete="off" id="password">
                                <span class="input-group-text">
                                    <div class="link-secondary" onclick="togglePasswordVisibility('password', this)">
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
                            @error('password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="hr"></div>

                        <div class="mb-3">
                            <label class="form-label">ពាក្យសម្ងាត់ថ្មី</label>
                            <div class="input-group input-group-flat">
                                <input type="password"
                                    style="font-family: system-ui, 'khmer mef1', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                                    class="form-control" name="new_password" autocomplete="off" id="new-password">
                                <span class="input-group-text">
                                    <div class="link-secondary" onclick="togglePasswordVisibility('new-password', this)">
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
                            @error('new_password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="form-label">បញ្ជាក់ពាក្យសម្ងាត់ថ្មី</label>
                            <div class="input-group input-group-flat">
                                <input type="password"
                                    style="font-family: system-ui, 'khmer mef1', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;"
                                    class="form-control" name="confirm_new_password" autocomplete="off"
                                    id="confirm-new-password">
                                <span class="input-group-text">
                                    <div class="link-secondary"
                                        onclick="togglePasswordVisibility('confirm-new-password', this)">
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
                            <div id="password-error" class="text-danger mt-2"></div>
                            @error('confirm_new_password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary hover-shadow w-100" type="submit">
                                <span>ផ្លាស់ប្ដូរពាក្យសម្ងាត់</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- for show and hide password  -->
    <script>
        function togglePasswordVisibility(inputId, iconElement) {
            var passwordInput = document.getElementById(inputId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                iconElement.classList.remove('icon-tabler-eye');
                iconElement.classList.add('icon-tabler-eye-off');
                iconElement.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye-off">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"/>
                        <path d="M16.681 16.673a8.717 8.717 0 0 1-4.681 1.327c-3.6 0-6.6-2-9-6
                            c1.272-2.12 2.712-3.678 4.32-4.674m2.86-1.146a9.055 9.055 0 0 1 1.82-.18c3.6
                            0 6.6 2 9 6-.666 1.11-1.379 2.067-2.138 2.87"/>
                        <path d="M3 3l18 18"/>
                    </svg>
                `;
            } else {
                passwordInput.type = 'password';
                iconElement.classList.remove('icon-tabler-eye-off');
                iconElement.classList.add('icon-tabler-eye');
                iconElement.innerHTML = `
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
                `;
            }
        }
    </script>
    <!-- end show and hide password  -->
@endsection

@extends('template.master')

@section('title', 'បញ្ជីលិខិតការបញ្ជាក់ប្រាក់បៀវត្ស')

@section('message')
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
                    class="alert-container d-flex align-items-center justify-content-center mb-2" data-aos="fade-down"
                    data-aos-delay="{{ 100 + $index * 100 }}">
                    <div class="alert alert-important text-light bg-{{ $alert['type'] }} alert-dismissible d-flex align-items-center shadow"
                        role="alert">
                        <div class="m-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
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

@endsection

@section('contents')

    <div class="page-center d-flex align-items-start justify-content-center min-vh-100 position-relative">

        <div class="container-xl">

            <div class="page-header">

                <h2 class="page-title">
                    ការបង្កើតលិខិតបញ្ជាក់ប្រាក់បៀវត្ស
                </h2>
                <div class="text-muted mt-1">Welcome to the admin dashboard</div>

            </div>

            <div class="page-body">

                <div class="row row-cards ">

                    <div class="card">

                        <div class="modal-status bg-primary"></div>
                        <div class="card-body">
                            <form action="/salary-certificates/store" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body py-4">

                                    <div class="row g-3 mb-4">

                                        <div class="col-md-12 col-xl-4">

                                            <label class="form-label fw-bold required">ឈ្មោះ</label>
                                            <input type="text" class="form-control" name="employee_name_kh"
                                                value="{{ old('employee_name_kh') }}" placeholder="គោត្តនាម និងនាម">
                                            @error('employee_name_kh')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-12 col-xl-4">

                                            <label class="form-label fw-bold required">អក្សរឡាតាំង</label>
                                            <input type="text" class="form-control" name="employee_name_en"
                                                value="{{ old('employee_name_en') }}" placeholder="គោត្តនាម និងនាម">
                                            @error('employee_name_en')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 col-xl-4">

                                            <label for="gender" class="form-label fw-bold required">ភេទ
                                            </label>
                                            <select name="gender" id="gender" class="form-select"
                                                aria-label="Default select example">

                                                <option value="" selected>
                                                    ជ្រើសរើស</option>
                                                <option value="ប្រុស">
                                                    ប្រុស </option>
                                                <option value="ស្រី">
                                                    ស្រី </option>
                                                <option value="ផ្សេងៗ">
                                                    ផ្សេងៗ </option>
                                            </select>
                                            @error('gender')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                    </div>

                                    <div class="row g-3 mb-4">

                                        <div class="col-sm-12 col-xl-4">
                                            <label for="date" class="form-label fw-bold">ថ្ងៃ ខែ ឆ្នាំកំណើត
                                                <span class="text-danger mx-1 fw-bold">*</span>
                                            </label>
                                            <div class="input-icon">
                                                <span class="input-icon-addon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <rect x="4" y="5" width="16" height="16" rx="2">
                                                        </rect>
                                                        <line x1="16" y1="3" x2="16"
                                                            y2="7">
                                                        </line>
                                                        <line x1="8" y1="3" x2="8"
                                                            y2="7">
                                                        </line>
                                                        <line x1="4" y1="11" x2="20"
                                                            y2="11">
                                                        </line>
                                                        <rect x="8" y="15" width="2" height="2"></rect>
                                                    </svg>
                                                </span>
                                                <input type="text" autocomplete="off" class="form-control datepicker"
                                                    name="date_of_birth" placeholder="ថ្ងៃ ខែ ឆ្នាំ"
                                                    value="{{ old('date_of_birth') }}" data-date-format="dd-mm-yyyy"
                                                    id="date">
                                            </div>
                                            @error('date_of_birth')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 col-xl-4">

                                            <label class="form-label fw-bold required">សញ្ជាតិ</label>
                                            <input type="text" class="form-control" name="nationality"
                                                value="{{ old('nationality') }}" placeholder="ជាតិ">
                                            @error('nationality')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 col-xl-4">

                                            <label class="form-label fw-bold required">ជនជាតិ</label>
                                            <input type="text" class="form-control" name="ethnicity"
                                                value="{{ old('ethnicity') }}" placeholder="ជនជាតិ">
                                            @error('ethnicity')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-12">
                                            <label for="place_of_birth"
                                                class="form-label fw-bold required">ទីកន្លែងកំណើត</label>
                                            <div class="input-icon">
                                                <textarea type="text" cols="5" autocomplete="off" placeholder="ភូមិ ឃុំ/សង្កាត់ ស្រុក/ខ័ណ្ទ ខេត្ត/រាជធានី"
                                                    class="form-control" id="place_of_birth" name="place_of_birth">{{ old('place_of_birth') }}</textarea>
                                            </div>
                                            @error('place_of_birth')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row g-3">

                                        <div class="col-sm-12 col-md-6 col-xl-3">
                                            <label class="form-label fw-bold required">ប្រភេទមន្ត្រី</label>
                                            <input type="text" class="form-control" name="type_of_employee"
                                                value="{{ old('type_of_employee') }}" placeholder="ប្រភេទមន្ត្រី">
                                            @error('type_of_employee')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-xl-3">

                                            <label class="form-label fw-bold required">ឋានៈតួនាទី</label>
                                            <input type="text" class="form-control" name="employee_position"
                                                value="{{ old('employee_position') }}" placeholder="ឋានៈតួនាទី">
                                            @error('employee_position')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-xl-3">

                                            <label class="form-label fw-bold required">បម្រើការងារ</label>
                                            <input type="text" class="form-control" name="employee_serve"
                                                value="{{ old('employee_serve') }}" placeholder="រយៈពេលបម្រើការងារ">
                                            @error('employee_serve')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-sm-12 col-md-6 col-xl-3">

                                            <label class="form-label fw-bold required">ប្រាក់បៀវត្ស</label>
                                            <input type="text" class="form-control format-number"
                                                name="employee_salary" value="{{ old('employee_salary') }}"
                                                placeholder="ចំនួនប្រាក់">
                                            @error('employee_salary')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="d-flex justify-content-between gap-2">
                                        <a href="/dashboard" class="btn btn-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-x">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                                                <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                                                <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                                                <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                                                <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                                                <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                                                <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                                                <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                                                <path d="M14 14l-4 -4" />
                                                <path d="M10 14l4 -4" />
                                            </svg>
                                            <span class="text">បោះបង់</span>
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-circle-dashed-check">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8.56 3.69a9 9 0 0 0 -2.92 1.95" />
                                                <path d="M3.69 8.56a9 9 0 0 0 -.69 3.44" />
                                                <path d="M3.69 15.44a9 9 0 0 0 1.95 2.92" />
                                                <path d="M8.56 20.31a9 9 0 0 0 3.44 .69" />
                                                <path d="M15.44 20.31a9 9 0 0 0 2.92 -1.95" />
                                                <path d="M20.31 15.44a9 9 0 0 0 .69 -3.44" />
                                                <path d="M20.31 8.56a9 9 0 0 0 -1.95 -2.92" />
                                                <path d="M15.44 3.69a9 9 0 0 0 -3.44 -.69" />
                                                <path d="M9 12l2 2l4 -4" />
                                            </svg>
                                            <span class="text">រក្សាទុក</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

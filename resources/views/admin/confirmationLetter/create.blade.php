@extends('template.master')

@section('title', 'ការបញ្ជាក់លិខិត')

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
                    ការបង្កើតលិខិត (ទម្រង់ "ក")
                </h2>
                <div class="text-muted mt-1">Welcome to the admin dashboard</div>
            </div>
            <div class="page-body">
                <div class="row row-cards ">
                    <form action="/confirmation-letters/store" method="POST" enctype="multipart/form-data">
                        <div class="card">

                            <div class="modal-status bg-primary"></div>
                            <div class="card-body">
                                @csrf
                                <div class="modal-body py-4">

                                    <div class="row g-3 mb-4">

                                        <div class="col-md-12 col-xl-3">
                                            <label for="type_of_letter" class="form-label fw-bold required">ប្រភេទលិខិត
                                            </label>
                                            <select name="type_of_letter" id="type_of_letter" class="form-select"
                                                aria-label="Default select example">

                                                <option value="" selected>
                                                    ជ្រើសរើស</option>
                                                @foreach ($letters as $letter)
                                                    <option value="{{ $letter }}"
                                                        {{ old('type_of_letter') == $letter ? 'selected' : '' }}>
                                                        {{ $letter }}</option>
                                                @endforeach
                                            </select>
                                            @error('type_of_letter')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-12 col-xl-9">

                                            <label class="form-label fw-bold required">យោង</label>
                                            <input type="text" class="form-control" name="reference"
                                                value="{{ old('reference') }}" placeholder="យោង">

                                            @error('reference')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-12 col-xl-3">

                                            <label class="form-label fw-bold required">ឈ្មោះ</label>
                                            <input type="text" class="form-control" name="employee_name_kh"
                                                value="{{ old('employee_name_kh') }}" placeholder="គោត្តនាម និងនាម">
                                            @error('employee_name_kh')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-12 col-xl-9">

                                            <label class="form-label fw-bold required">ថ្ងៃខែឆ្នាំកំណើត</label>
                                            <div class="row g-2">
                                                <div class="col-4">
                                                    <input type="number" class="form-control"
                                                        value="{{ old('day_of_birth') }}" name="day_of_birth"
                                                        placeholder="ថ្ងៃ" min="1" max="31">
                                                    @error('day_of_birth')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <input type="number" class="form-control" name="month_of_birth"
                                                        value="{{ old('month_of_birth') }}" placeholder="ខែ" min="1"
                                                        max="12">
                                                    @error('month_of_birth')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-4">
                                                    <input type="number" class="form-control" name="year_of_birth"
                                                        value="{{ old('year_of_birth') }}" placeholder="ឆ្នាំ"
                                                        min="1900" max="{{ date('Y') }}">
                                                    @error('year_of_birth')
                                                        <div class="text-danger mt-2">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-md-12 col-xl-4">

                                            <label class="form-label fw-bold required">ប្រភេទមន្ត្រី</label>
                                            <input type="text" class="form-control" name="type_of_employee"
                                                value="{{ old('type_of_employee') }}" placeholder="ប្រភេទមន្ត្រី">
                                            @error('type_of_employee')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-12 col-xl-4">

                                            <label class="form-label fw-bold required">បច្ចុប្បន្នជា</label>
                                            <input type="text" class="form-control"
                                                value="{{ old('employee_position') }}" name="employee_position"
                                                placeholder="តួនាទី">
                                            @error('employee_position')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>

                                        <div class="col-md-12 col-xl-4">

                                            <label class="form-label fw-bold required">នៃនាយកដ្ឋាន</label>
                                            <input type="text" class="form-control" name="department_name"
                                                value="{{ old('department_name') }}" placeholder="នាយកដ្ឋាន">
                                            @error('department_name')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="row g-3 mb-4">
                                        <div class="col-12">
                                            <label for="purpose" class="form-label fw-bold required">គោលបំណង</label>
                                            <div class="input-icon">
                                                <textarea type="text" cols="5" autocomplete="off" placeholder="គោលបំណង" class="form-control"
                                                    id="purpose" name="purpose">{{ old('purpose') }}</textarea>
                                            </div>
                                            @error('purpose')
                                                <div class="text-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <div class="d-flex justify-content-between gap-2">
                                        <a href="/confirmation-letters/index" class="btn btn-secondary">
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

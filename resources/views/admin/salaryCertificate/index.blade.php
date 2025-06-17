@extends('template.master')

@section('title', 'បញ្ជីលិខិតការបញ្ជាក់ប្រាក់បៀវត្ស')

@section('message')
    @if ($message = Session::get('message'))
        <div class="position-absolute top-0 end-0 success-alert" id="success-alert" style="z-index:999;">
            <div class="toast show ">

                <div class="toast-header">

                    <strong class="me-auto">ការកក់បន្ទប់ប្រជុំ</strong>

                    <button type="button" class="btn-close text-white" data-bs-dismiss="toast"></button>

                </div>

                <div class="toast-body text-success">

                    <b>{{ $message }}</b>

                </div>

            </div>
        </div>
    @endif
@endsection

@section('contents')

    <div class="page-center d-flex align-items-start justify-content-center min-vh-100 position-relative">

        <div class="container-xl">

            <div class="page-header">

                <h2 class="page-title">
                    បញ្ជីលិខិតការបញ្ជាក់ប្រាក់បៀវត្ស
                </h2>
                <div class="text-muted mt-1">Welcome to the admin dashboard</div>

            </div>

            <div class="page-body">

                <div class="row row-cards">

                    <div class="card m-0 p-0">
                        <div class="card-header">
                            <h4 class="card-title">

                            </h4>
                            <div class="card-options">

                                <form action="">

                                </form>
                                <a href="/dashboard" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 14l-4 -4l4 -4" />
                                        <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                                    </svg>
                                    <span class="text">ត្រលប់</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body m-0 p-0">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap table-striped table-hover">
                                    <thead class="table-light" style="height: 50px;">
                                        <tr>
                                            <th class="d-none d-xl-table-cell text-center align-middle fw-bold">
                                                ល.រ</th>
                                            <th class="d-none d-xl-table-cell text-center align-middle fw-bold">
                                                ឈ្មោះមន្រ្តី
                                            </th>
                                            <th class="d-none d-xl-table-cell text-center align-middle fw-bold">
                                                អក្សរឡាតាំង
                                            </th>
                                            <th class="d-none d-xl-table-cell text-center align-middle fw-bold">
                                                ថ្ងៃខែឆ្នាំកំណើត
                                            </th>
                                            <th class="d-none d-xl-table-cell text-center align-middle fw-bold">
                                                ភេទ
                                            </th>
                                            <th class="d-none d-xl-table-cell text-center align-middle fw-bold">
                                                តួនាទី
                                            </th>
                                            <th class="d-none d-xl-table-cell text-center align-middle fw-bold">
                                                សកម្មភាព
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salaryCertificate as $key => $item)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $salaryCertificate->firstItem() + $key }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->employee_name_kh }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->employee_name_en }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->date_of_birth }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->gender }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->employee_position }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="/salary-certificates/show/{{ $item->id }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="មើលលិខិត">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path
                                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                    </a>

                                                    <a href="/salary-certificate/{{ $item->id }}/edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($salaryCertificate->count() == 0)
                                            <tr>
                                                <td colspan="7" class="text-center align-middle">
                                                    <h4 class="text-danger">មិនមានទិន្នន័យ</h4>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer w-100 d-flex justify-content-center align-items-center">
                            {{-- <div class="d-flex justify-content-center align-items-center"> --}}
                            {{ $salaryCertificate->appends(request()->query())->links('pagination::bootstrap-4') }}

                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

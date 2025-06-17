@extends('template.master')

@section('title', 'បញ្ជីការបញ្ជាក់លិខិត')

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
                    បញ្ជីការស្នើសុំបញ្ជាក់លិខិត
                </h2>
                <div class="text-muted mt-1">Welcome to the admin dashboard</div>

            </div>

            <div class="page-body">
                <div class="row row-cards">
                    <div class="card m-0 p-0">
                        <div class="card-header">
                            <div class="card-title w-100">
                                <form action="/confirmation-letters/index" method="GET">
                                    <div class="row">
                                        <div class="col-xl-2 col-md-12 mb-2 mb-xl-0">
                                            <select name="period" class="form-select">
                                                <option value="" selected hidden>រយៈពេល</option>
                                                <option value="today">ថ្ងៃនេះ</option>
                                                <option value="yesterday">ម្សិលមិញ</option>
                                                <option value="this_week">សប្ដាហ៍នេះ</option>
                                                <option value="last_week">សប្ដាហ៍មុន</option>
                                                <option value="this_month">ខែនេះ</option>
                                                <option value="last_month">ខែមុន</option>
                                                <option value="last_30_days">៣០ ថ្ងៃចុងក្រោយ</option>
                                                <option value="this_year">ឆ្នាំនេះ</option>
                                                <option value="last_year">ឆ្នាំមុន</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-2 col-md-12 mb-2 mb-xl-0">
                                            <select name="type_of_letter" class="form-select">
                                                <option value="" selected hidden>ប្រភេទលិខិត</option>
                                                <option value="បញ្ជាក់ប្រាក់បៀវត្ស">បញ្ជាក់ប្រាក់បៀវត្ស</option>
                                                <option value="បញ្ជាក់ជាកម្មសិក្សា">បញ្ជាក់ជាកម្មសិក្សា</option>
                                                <option value="បញ្ជាក់ជាមន្ត្រី">បញ្ជាក់ជាមន្ត្រី</option>
                                                <option value="បញ្ជាក់អំពីតួនាទីការងារ">បញ្ជាក់អំពីតួនាទីការងារ</option>
                                                <option value="ប្រគល់សិទ្ធចុះហត្ថលេខា">ប្រគល់សិទ្ធចុះហត្ថលេខា</option>
                                                <option value="បញ្ជាក់បេសកកម្ម">បញ្ជាក់បេសកកម្ម</option>
                                                <option value="បញ្ជាក់ផ្សេងៗ">បញ្ជាក់ផ្សេងៗ</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-2 col-md-12 mb-2 mb-xl-0">
                                            <div class="input-icon">
                                                <span class="input-icon-addon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path
                                                            d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z">
                                                        </path>
                                                        <path d="M16 3v4"></path>
                                                        <path d="M8 3v4"></path>
                                                        <path d="M4 11h16"></path>
                                                        <path d="M11 15h1"></path>
                                                        <path d="M12 15v3"></path>
                                                    </svg>
                                                </span>
                                                <input class="form-control datepicker" placeholder="កាលបរិច្ឆេទ"
                                                    type="text" name="created_at" id="created_at" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-12 mb-2 mb-xl-0">
                                            <div class="input-icon">
                                                <span class="input-icon-addon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                    </svg>
                                                </span>
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="ឈ្មោះមន្រ្តី">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-12 mb-2 mb-xl-0">
                                            <button type="submit" class="btn btn-primary w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <circle cx="10" cy="10" r="7" />
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                                </svg>
                                                <span class="text">ស្វែងរក</span>
                                            </button>
                                        </div>
                                        <div class="col-xl-2 col-md-12 mb-2 mb-xl-0">
                                            <a href="/confirmation-letters/create" class="btn btn-success w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                    <path d="M9 12h6" />
                                                    <path d="M12 9v6" />
                                                </svg>
                                                <span class="text">បង្កើតលិខិត</span>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body m-0 p-0">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter table-striped table-hover">
                                    <thead style="height: 50px;">
                                        <tr>
                                            <th style="width: 5%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                ល.រ</th>
                                            <th style="width: 20%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                កម្មវត្ថ
                                            </th>
                                            <th style="width: 20%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                ឈ្មោះមន្រ្តី
                                            </th>

                                            <th style="width: 10%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                កាលបរិច្ឆេទបង្កើត
                                            </th>

                                            <th style="width: 10%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                កាលបរិច្ឆេទកែប្រែ
                                            </th>
                                            <th style="width: 10%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                រយៈពេលបង្កើត
                                            </th>
                                            <th style="width: 10%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                ស្ថានភាព
                                            </th>
                                            <th style="width: 15%"
                                                class=" d-xl-table-cell text-center align-middle fw-bold">
                                                សកម្មភាព
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($confirmationLetters as $key => $item)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ ++$key }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->type_of_letter }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->employee_name_kh }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->created_at->format('d/m/Y') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->updated_at->format('d/m/Y') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($item->status == '0')
                                                        <span class="badge bg-warning text-white">Drafted</span>
                                                    @elseif ($item->status == '1')
                                                        <span class="badge bg-primary text-white">Submited</span>
                                                    @elseif ($item->status == '2')
                                                        <span class="badge bg-success text-white">Approved</span>
                                                    @elseif ($item->status == '3')
                                                        <span class="badge bg-danger text-white">Rejected</span>
                                                    @else
                                                        <span class="badge bg-secondary">N/A</span>
                                                    @endif
                                                </td>

                                                <td class="text-center align-middle d-flex justify-content-center gap-1">

                                                    <a href="/confirmation-letters/show/{{ $item->id }}"
                                                        class="text-warning" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="មើលលិខិត">
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

                                                    <a href="/confirmation-letters/{{ $item->id }}/edit">
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

                                                    <div data-bs-toggle="modal" class="text-danger cursor-pointer"
                                                        data-bs-target="#deleteConfirmationLetterModal{{ $item->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($confirmationLetters->count() == 0)
                                            <tr>
                                                <td colspan="8" class="text-center align-middle">
                                                    <img src="{{ asset('src/dist/img/icons/svgs/empty.svg') }}"
                                                        alt="empty data">
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer w-100 d-flex justify-content-center align-items-center">
                            {{ $confirmationLetters->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if ($confirmationLetters->isNotEmpty())
        @foreach ($confirmationLetters as $item)
            <div class="modal fade" id="deleteConfirmationLetterModal{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                {{ 'លុបការស្នើសុំលិខិត' }}{{ $item->type_of_letter }}</h5>
                        </div>
                        <div class="modal-footer">
                            <form action="/confirmation-letters/{{ $item->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input class="btn btn-primary btn-sm" type="submit" value="យល់ព្រម">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection

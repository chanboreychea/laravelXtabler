@extends('template.preview')
@section('title', 'លិខិតបញ្ជាក់ប្រាក់បៀវត្ស')
@section('preview-title', 'លិខិតបញ្ជាក់ប្រាក់បៀវត្ស')
@section('preview-content')

    <style>
        .line-group {
            display: flex;
            padding-left: 50px;
        }

        .label {
            white-space: nowrap;
            margin-right: 5px;
        }

        .dot-line {
            /* flex: 1;
                        border-bottom: 1px dotted black;
                        margin-bottom: 5px; */

            overflow: hidden;
            white-space: nowrap;
            flex: 1;
        }

        .value {
            /* white-space: nowrap; */
            margin: 0 5px;
        }

        .full-stop {
            margin-left: 3px;
        }
    </style>

    <div class="pdf-page size-a4">
        <div class="pdf-header">
            <div class="invoice-number mb-5">
                <div
                    style="font-family: khmer; font-weight: bold; color: #2F5496; font-size: 16px; text-align: center; padding-bottom: 8px;">
                    ព្រះរាជាណាចក្រកម្ពុជា
                </div>
                <div style="font-family: khmer; font-weight: bold; color: #2F5496; font-size: 16px; text-align: center;">
                    ជាតិ សាសនា ព្រះមហាក្សត្រ
                </div>

            </div>
        </div>
        <div class="pdf-body">

            <div class="mb-xl-0" style="margin-top: -70px;">
                <div style="position: relative; color: #2F5496;">
                    <div class="company-logo" style="text-indent: 45px;">
                        <img class="p-1" src="{{ asset('src/dist/img/icons/brands/logo2.png') }}"
                            style="width: 100px;" />
                    </div>
                    <div
                        style="font-family: khmer; font-weight: bold; font-size: 12px; letter-spacing: -1px; line-height: 25px;">
                        អាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ
                        <br>
                        <div style="text-indent: 35px">អង្គភាពសវនកម្មផ្ទៃក្នុង</div>
                    </div>
                    {{-- <div
                        style="font-family: khmer; font-weight: bold; font-size: 12px;text-indent: 35px; letter-spacing: -1px;">

                    </div> --}}
                </div>
            </div>

            <div class="mb-2 mt-2"
                style="font-family: khmer; font-weight: bold; font-size:14px; text-align:center; line-height: 30px;">
                លិខិតបញ្ជាក់ប្រាក់បៀវត្ស
                <br>
                អង្គភាពសវនកម្មផ្ទៃក្នុងនៃអាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ
                <br>
                សូមបញ្ជាក់ថា៖
            </div>

            <div class="line-group mb-2">
                <span class="label">ឈ្មោះ</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ $salaryCertificate->employee_name_kh }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="label">អក្សរឡាំង</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ $salaryCertificate->employee_name_en }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
            </div>

            <div class="line-group mb-2">
                <span class="label">ភេទ</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ $salaryCertificate->gender }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="label">កើតថ្ងៃទី </span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ date('d', strtotime($salaryCertificate->date_of_birth)) }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="label"> ខែ</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value" id="monthOfBirth">{{ date('m', strtotime($salaryCertificate->date_of_birth)) }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="label">ឆ្នាំ</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ date('Y', strtotime($salaryCertificate->date_of_birth)) }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="label">សញ្ជាតិ</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ $salaryCertificate->nationality }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="label">ជនជាតិ</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ $salaryCertificate->ethnicity }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="full-stop">។</span>
            </div>

            <div class="line-group mb-2">
                <span class="label">ទីកន្លែងកំណើតៈ</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                <span class="value">{{ $salaryCertificate->place_of_birth }}</span>
                <span class="dot-line">{{ str_repeat('.', 100) }}</span>
            </div>

            <div class="line-group mb-2">
                <div class="col-6">
                    <div class="d-flex">
                        <span class="label">ប្រភេទមន្រ្តីៈ</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                        <span class="value">{{ $salaryCertificate->type_of_employee }}</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex">
                        <span class="label">ឋានៈតួនាទីៈ</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                        <span class="value">{{ $salaryCertificate->employee_position }}</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                    </div>
                </div>
            </div>

            <div class="line-group mb-2">
                <div class="col-6">
                    <div class="d-flex">
                        <span class="label">បម្រើការងារៈ</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                        <span class="value">{{ $salaryCertificate->employee_serve }}</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex">
                        <span class="label">ប្រាក់បៀវត្សៈ</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                        <span class="value">{{ number_format($salaryCertificate->employee_salary, 2) }} ៛</span>
                        <span class="dot-line">{{ str_repeat('.', 100) }}</span>
                    </div>
                </div>
            </div>

            <p style="font-family: khmer; font-size:14px; text-align:justify; text-indent: 50px; line-height: 30px;">
                <b>អង្គភាពសវនកម្មផ្ទៃក្នុង</b> សូមចេញលិខិតបញ្ជាក់នេះទុកឲ្យ​សាមុីខ្លួនប្រើប្រាស់តាមផ្លូវច្បាប់ដែល
                <br>
                អាចប្រើបាន និងមានសុពលភាពរយៈពេល ០៦ (ប្រាំមួយ) ខែ ចាប់ពីចុះហត្ថលេខានេះតទៅ។
            </p>

            <div class="row ">
                <div class="col-4"></div>
                <!-- Staff Information -->
                <div class="col-8" style="font-family: khmer; font-size: 14px; line-height: 30px; text-align: center;">
                    <div>
                        ថ្ងៃ ..................
                        ខែ ..............
                        ឆ្នាំ ...........
                        ព.ស ២៥.......
                    </div>
                    <div class="mb-2">
                        រាជធានីភ្នំពេញ ថ្ងៃទី ..................
                        ខែ ..............
                        ឆ្នាំ ...........
                    </div>
                    <h4>នាយកដ្ឋានកិច្ចការទូទៅ</h4>
                    <h4 class="mb-3">ប្រធាន</h4>
                </div>
            </div>
        </div>
    </div>

    <script>
        let monthElement = document.getElementById('monthOfBirth');
        let monthValue = monthElement.innerText;

        monthElement.innerText = getKhmerMonth(parseInt(monthValue));

        function getKhmerMonth(month) {
            const khmerMonths = [
                "", "មករា", "កម្ភៈ", "មិនា", "មេសា", "ឧសភា", "មិថុនា",
                "កក្កដា", "សីហា", "កញ្ញា", "តុលា", "វិច្ឆិកា", "ធ្នូ"
            ];
            return khmerMonths[month];
        }
    </script>

@endsection

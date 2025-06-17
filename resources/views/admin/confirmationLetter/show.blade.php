@extends('template.preview')

@section('preview-title', 'ផ្ទៀងផ្ទាត់លិខិត')

@section('preview-content')

    <style>
        .line-group {
            display: flex;
            /* padding-left: 50px; */
        }

        .label {
            white-space: nowrap;
            margin-right: 5px;
        }

        .dot-line {
            flex: 1;
            overflow: hidden;
            position: relative;
        }

        .dot-line::before {
            content: "............................................................................................................................";
            white-space: nowrap;
            display: block;
            overflow: hidden;
        }

        .value {
            margin: 0 5px;
        }

        .full-stop {
            margin-left: 3px;
        }
    </style>

    <div class="pdf-page size-a4">

        <div class="pdf-header">
            <div class="invoice-number ">
                <div style="color: #2F5496; text-align: center;">
                    <h3>ព្រះរាជាណាចក្រកម្ពុជា</h3>
                    <h3 class="mb-0">ជាតិ សាសនា ព្រះមហាក្សត្រ</h3>
                    <span style="font-family: Tacteing; font-size: 34px;">3</span>
                </div>
            </div>
        </div>
        <div class="pdf-body">

            {{-- <div class="mb-xl-0" style="margin-top: -70px;">
                <div style="position: relative; color: #2F5496;">
                    <div class="company-logo" style="text-indent: 50px;">
                        <img class="p-1" src="{{ asset('src/dist/img/icons/brands/logo2.png') }}"
                            style="width: 100px;" />
                    </div>
                    <div
                        style="font-family: khmer; font-weight: bold; font-size: 12px; letter-spacing: -1px; line-height: 25px;">
                        អាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ
                        <br>
                        <div style="text-indent: 35px">អង្គភាពសវនកម្មផ្ទៃក្នុង</div>
                    </div>

                </div>
            </div> --}}

            <div class="row">
                <div class="col-auto text-center" style="margin-top: -85px;">
                    <div class="mb-xl-0">
                        <div style="position: relative; color: #2F5496;">
                            <div class="company-logo">
                                <img class="p-1" src="{{ asset('src/dist/img/icons/brands/logo2.png') }}"
                                    style="width: 100px;" />
                            </div>
                            <div
                                style="font-family: khmer; font-weight: bold; font-size: 12px; letter-spacing: -1px; line-height: 25px;">
                                អាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ
                                <br>
                                <div style="">អង្គភាពសវនកម្មផ្ទៃក្នុង</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-2 mt-2"
                style="font-family: khmer; font-weight: bold; font-size:14px; text-align:center; line-height: 30px;">
                សូមគោរពជូន
                <br>
                ឯកឧត្តមប្រធានអង្គភាពសវនកម្មផ្ទៃក្នុងនៃអាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ
            </div>

            <div class="line-group mb-2" style="font-size:14px">
                <span class="label fw-bold">កម្មវត្ថុ ៖ </span>
                <span class="label">ការស្នើសុំបញ្ជាក់លិខិត</span>
                <span class="dot-line"></span>
                <span class="value">{{ $confirmationLetter->type_of_letter }}</span>
                <span class="dot-line"></span>
                <span>នៃអង្គភាពសវនកម្មផ្ទៃក្នុង</span>
            </div>

            <div class="line-group mb-2" style="font-size:14px; padding-left: 65px;">
                <span class="label">នៃអាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ។</span>
            </div>

            <div class="line-group mb-2" style="font-size:14px; text-align:justify; line-height: 25px; margin-bottom: 0px;">
                <span class="label fw-bold">យោង ៖ </span>
                <span class="value">{{ $confirmationLetter->reference }}។</span>
            </div>

            <p
                style="font-family: khmer; font-size:14px; text-align:justify; text-indent: 50px; line-height: 30px; margin-bottom: 0px;">
                សេចក្ដីដូចមានក្នុងកម្មវត្ថុ និងយោងខាងលើ សូមគោរពជម្រាបជូន <b>ឯកឧត្តមប្រធាន</b> មេត្តាជ្រាបដ៍ខ្ពង់ខ្ពស់ថា៖
                ខ្ញុំបាទ/នាងខ្ញុំឈ្មោះ {{ $confirmationLetter->employee_name_kh }}
                កើតថ្ងៃទី <span id="dayOfBirth">{{ $confirmationLetter->day_of_birth }}</span>
                ខែ <span id="monthOfBirth">{{ $confirmationLetter->month_of_birth }}</span>
                ឆ្នាំ <span id="yearOfBirth">{{ $confirmationLetter->year_of_birth }}</span>
                ប្រភេទមន្ត្រី {{ $confirmationLetter->type_of_employee }}
                បច្ចុប្បន្នជា {{ $confirmationLetter->employee_position }}
                នៃនាយកដ្ឋាន {{ $confirmationLetter->department_name }} ។
                ក្នុងគោលបំណង {{ $confirmationLetter->purpose }}
                ខ្ញុំបាទ/នាងខ្ញុំមានបំណងចង់បញ្ជាក់លិខិត {{ $confirmationLetter->type_of_letter }}
                នៃអង្គភាពសវនកម្មផ្ទៃក្នុងនៃអាជ្ញាធរសេវាហិរញ្ញវត្ថុមិនមែនធនាគារ (<b>អ.ស.ហ.</b>)។ អាស្រ័យហេតុនេះ
                សូមគោរពស្នើសុំការអនុញ្ញាតដ៏ខ្ពង់ខ្ពស់ពី
                <b>ឯកឧត្តមប្រធាន</b> ដើម្បីបញ្ជាក់លិខិត {{ $confirmationLetter->type_of_letter }}
                នៃអង្គភាពសវនកម្មផ្ទៃក្នុងនៃ <b>អ.ស.ហ.</b> ដោយក្ដីអនុគ្រោះបំផុត ។
            </p>

            <p
                style="font-family: khmer; font-size:14px; text-align:justify; text-indent: 50px; line-height: 30px; margin-bottom: 0px;">
                សេចក្ដីដូចបានគោរពជម្រាបជូនខាងលើនេះ សូម <b>ឯកឧត្តមប្រធាន</b> មេត្តាពិនិត្យ និងសម្រេចដោយសេចក្តី
                អនុគ្រោះដ៏ខ្ពង់ខ្ពស់បំផុត។
            </p>

            <p
                style="font-family: khmer; font-size:14px; text-align:justify; text-indent: 50px; line-height: 30px; margin-bottom: 0px;">
                សូម <b>ឯកឧត្តមប្រធាន</b> មេត្តាទទួលនូវការគោរពដ៏ខ្ពង់ខ្ពស់ពីខ្ញុំ។
            </p>

            <div class="row ">
                <div class="col-6 mt-5" style="font-family: khmer; font-size: 14px; text-align: center;">
                    <div class="mb-2">
                        បានឃើញ និងសូមគោរពជូន
                    </div>
                    <div class="mb-2 fw-bold">
                        ឯកឧត្តមប្រធានអង្គភាព
                    </div>
                    <div class="mb-2">
                        ពិនិត្យ និងសម្រេច
                    </div>
                    <div class="mb-2">
                        ថ្ងៃ ..................
                        ខែ ..............
                        ឆ្នាំ ........
                        ព.ស ២៥.....
                    </div>
                    <div class="mb-2">
                        ................ ថ្ងៃទី ....
                        ខែ ........
                        ឆ្នាំ ២០....
                    </div>
                    <h4>នាយកដ្ឋាន..................</h4>
                    <h4 class="mb-3">ប្រធាន</h4>
                </div>
                <!-- Staff Information -->
                <div class="col-6 mt-2" style="font-family: khmer; font-size: 14px; text-align: center;">
                    <div class="row mb-5">
                        <div class="mb-2">
                            ថ្ងៃ ..................
                            ខែ ..............
                            ឆ្នាំ ........
                            ព.ស ២៥....
                        </div>
                        <div class="mb-2">
                            ................ ថ្ងៃទី ....
                            ខែ ........
                            ឆ្នាំ ២០....
                        </div>
                        <h4 class="mb-5">ហត្ថលេខាសមីខ្លួន</h4>
                    </div>
                    <div class="row">
                        <div class="mb-2">
                            បានឃើញ និងឯកភាព
                        </div>
                        <div class="mb-2 fw-bold">
                            សូមជូន នាយកដ្ឋានកិច្ចការទូទៅ
                        </div>
                        <div class="mb-2">
                            ដើម្បីមុខងារ
                        </div>
                        <div class="mb-2">
                            ថ្ងៃ ..................
                            ខែ ..............
                            ឆ្នាំ ........
                            ព.ស ២៥.....
                        </div>
                        <div class="mb-2">
                            ................ ថ្ងៃទី ....
                            ខែ ........
                            ឆ្នាំ ២០....
                        </div>
                        <div class="fw-bold">អង្គភាពសវនកម្មផ្ទៃក្នុង</div>
                        <h4 class="mb-3">ប្រធាន</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

@endsection

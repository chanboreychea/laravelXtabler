@extends('template.master')

@section('title', 'ពិនិត្យលើលិខិត')

<style>
    .certificate-page-wrapper {
        width: 21cm;
        min-height: 29.7cm;
        padding-top: 1.19cm;
        padding-bottom: 1.6cm;
        padding-left: 2.11cm;
        padding-right: 2.31cm;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        overflow: auto;
    }

    .subpage {
        width: 100%;
        height: 26.91cm;
    }

    @page {
        size: A4 portrait;
        margin: 0px;
    }
</style>

@section('contents')

    <div class="page-header">
        <h2 class="page-title row d-flex align-items-center justify-content-space-evenly">
            <div class="col-4 d-flex justify-content-center">
                <a href="/confirmation-letters/index" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 14l-4 -4l4 -4" />
                        <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                    </svg>
                    <span>ត្រលប់</span>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <span class="d-lg-block d-none"> @yield('preview-title', 'ពិនិត្យលើលិខិត') </span>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center gap-2">
                <a href="{{ asset('src/dist/documents/requestconfirmationletter.docx') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-file-word">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2" />
                        <path d="M9 12l1.333 5l1.667 -4l1.667 4l1.333 -5" />
                    </svg>
                    <span>ឯកសារ</span>
                </a>

                <button onclick="printContent()" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-printer">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                        <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                    </svg>
                    <span>បោះពុម្ភ</span>
                </button>
            </div>
        </h2>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="page-center d-lg-flex align-items-center justify-content-center">
                <div id="pagecontent">
                    <div class="certificate-page-wrapper">
                        <div class="subpage">
                            @yield('preview-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printContent(id) {
            var printContent = document.getElementById('pagecontent').innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>

    <script>
        let dayElement = document.getElementById('dayOfBirth');
        let monthElement = document.getElementById('monthOfBirth');
        let yearElement = document.getElementById('yearOfBirth');
        let dayValue = dayElement.innerText;
        let monthValue = monthElement.innerText;
        let yearValue = yearElement.innerText;

        dayElement.innerText = getKhmerNum(parseInt(dayValue));
        monthElement.innerText = getKhmerMonth(parseInt(monthValue));
        yearElement.innerText = getKhmerNum(parseInt(yearValue));

        function getKhmerMonth(month) {
            const khmerMonths = [
                "", "មករា", "កម្ភៈ", "មិនា", "មេសា", "ឧសភា", "មិថុនា",
                "កក្កដា", "សីហា", "កញ្ញា", "តុលា", "វិច្ឆិកា", "ធ្នូ"
            ];
            return khmerMonths[month];
        }

        function getKhmerNum(num) {
            const khmerNumbers = {
                0: '០',
                1: '១',
                2: '២',
                3: '៣',
                4: '៤',
                5: '៥',
                6: '៦',
                7: '៧',
                8: '៨',
                9: '៩'
            };
            return num.toString().split('').map(digit => khmerNumbers[digit] || digit).join('');
        }
    </script>

@endsection

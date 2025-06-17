@extends('template.master')

@section('title', 'ចំណូល')

@section('message')
    @if ($message = Session::get('message'))
        <div class="toast show success-alert" style="position: absolute;top:0x;right:0px;z-index:9999" id="success-alert">
            <div class="toast-header">
                <strong class="me-auto">ការជូនដំណឹង</strong>
            </div>
            <div class="toast-body text-success">
                <b>{{ $message }}</b>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast show success-alert" style="position: absolute;top:0x;right:0px;z-index:9999" id="success-alert">
            <div class="toast-header">
                <strong class="me-auto">ការជូនដំណឹង</strong>
            </div>
            <div class="toast-body text-success">
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </div>
        </div>
    @endif

@endsection

@section('contents')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-header-action">
                        <a href="/revenues" class="btn btn-primary">
                            <i class="fas fa-chevron-left"></i>ចាកចេញ
                        </a>
                        <button type="button" id="addInput" class="btn btn-success btn-sm"
                            onclick="addInput()">ប្រភពចំណូល</button>
                        <button type="button" id="removeInput" class="btn btn-danger btn-sm" disabled
                            onclick="removeInput()">ដកប្រភពចំណូល</button>
                    </div>
                </div>
                <div class="card-body pe-5">
                    <form method="POST" action="/revenues" id="formAuthentication" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="frist_name">កាលបរិច្ឆេទ</label>
                                <input id="frist_name" type="date" value="{{ old('date') }}" class="form-control"
                                    name="date" required>
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="last_name">ភាគរយ</label>
                                <input id="last_name" type="number" class="form-control" name="rate" min="0"
                                    value="{{ old('rate') }}" autofocus required>
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="last_name">លេខលិខិត អ.ស.ហ</label>
                                <input id="last_name" type="text" class="form-control" name="noFsa" min="0"
                                    value="{{ old('noFsa') }}" autofocus required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="last_name">ឯកសារយោង</label>
                                <div class="custom-file">
                                    <input type="file" name="fileReference" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="frist_name">ប័ណ្ណចំណូលនៅធនាគារ</label>
                                <input id="frist_name" type="date" class="form-control" name="dateOfBankIncomeCard"
                                    value="{{ old('dateOfBankIncomeCard') }}">
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="bank">ABA</label>
                                <input id="bank" type="text" class="form-control" name="bank"
                                    value="{{ old('bank') }}" placeholder="ABA">
                                @error('bank')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <label>ឈ្មោះនិយ័តករ</label>
                                <select name="regulatorName[]" class="form-control regulatorName">
                                    @foreach ($regulators as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12 d-flex justify-content-between">
                                <div class="w-100 mr-2">
                                    <label>ប្រាក់ដុល្លា</label>
                                    <input type="text" class="form-control formatted-currency" name="amountDolla[]"
                                        placeholder="ចំនួនទឹកប្រាក់" pattern="[0-9]+(\.[0-9]+)?">
                                    @error('amountDolla')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-100">
                                    <label>ប្រាក់រៀល</label>
                                    <input type="text" class="form-control formatted-currency" name="amountRiel[]"
                                        placeholder="ចំនួនទឹកប្រាក់" pattern="[0-9]+(\.[0-9]+)?">
                                    @error('amountRiel')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="container"></div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                រក្សាទុក
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var regulators = {!! json_encode($regulators) !!};
        // console.log(regulators)
        var btnAddInput = document.getElementById("addInput");
        var btnRemoveInput = document.getElementById("removeInput");

        function addInput() {

            var amount = document.createElement("input");
            amount.type = "text";
            amount.className = "form-control amountDolla";
            amount.name = "amountDolla[]";
            amount.placeholder = "ចំនួនទឹកប្រាក់";
            amount.pattern = "[0-9]+(\.[0-9]+)?";

            var label = document.createElement("label");
            label.innerHTML = "ប្រាក់ដុល្លា";

            var amountriel = document.createElement("input");
            amountriel.type = "text";
            amountriel.className = "form-control amountRiel";
            amountriel.name = "amountRiel[]";
            amountriel.placeholder = "ចំនួនទឹកប្រាក់";
            amountriel.pattern = "[0-9]+(\.[0-9]+)?";

            var labelr = document.createElement("label");
            labelr.innerHTML = "ប្រាក់រៀល";

            var selectInput = document.createElement("select");
            selectInput.name = "regulatorName[]";
            selectInput.classList.add("form-control");
            selectInput.classList.add("regulatorName");

            // regulators.forEach(function(index, regulators) {
            //     var option = document.createElement("option");
            //     option.text = regulators;
            //     option.value = index;
            //     selectInput.add(option);
            // });

            for (const item in regulators) {
                var option = document.createElement("option");
                option.text = regulators[item];
                option.value = item;
                selectInput.add(option);
            }

            var labelSelectInput = document.createElement("label");
            labelSelectInput.innerHTML = "ឈ្មោះនិយ័តករ";

            var container = document.getElementById('container');
            // container.className = 'container w-100 p-0 m-0';
            var row = document.createElement('div');
            row.className = 'row items';

            var colRight = document.createElement('div');
            colRight.className = 'form-group col-lg-6 col-sm-12';

            colRight.appendChild(labelSelectInput);
            colRight.appendChild(selectInput);

            var colLeft = document.createElement('div');
            colLeft.className = 'form-group col-lg-6 col-sm-12 d-flex justify-content-between';

            var colLeftDolla = document.createElement('div');
            colLeftDolla.className = "w-100 mr-2"
            colLeftDolla.appendChild(label);
            colLeftDolla.appendChild(amount);

            var colLeftRiel = document.createElement('div');
            colLeftRiel.className = "w-100"
            colLeftRiel.appendChild(labelr);
            colLeftRiel.appendChild(amountriel);

            colLeft.appendChild(colLeftDolla);
            colLeft.appendChild(colLeftRiel);

            row.appendChild(colRight);
            row.appendChild(colLeft);
            container.appendChild(row);

            const childCount = container.childElementCount;
            // console.log(`items ${childCount}`);
            if (childCount > 0) {
                btnRemoveInput.disabled = false;;
            }
            if (childCount == regulators.length - 1) {
                btnAddInput.disabled = true;
            }
            // var elementsToRemove = container.getElementsByClassName('items');
            // var btnRemove = container.getElementsByClassName('removeItems');

        }


        function removeInput() {
            container.removeChild(container.lastChild);
            const childCountd = container.childElementCount;
            // console.log(`items ${childCountd}`);
            if (childCountd <= 0) {
                btnRemoveInput.disabled = true;;
            }
            if (childCountd < regulators.length - 1) {
                btnAddInput.disabled = false;
            }
        }

        // $(document).ready(function() {
        //     $('#myForm').submit(function(event) {
        //         // Prevent the default form submission
        //         event.preventDefault();

        //         // Get the form data
        //         var formData = $(this).serialize();

        //         // Send the AJAX request
        //         $.ajax({
        //             url: '/revenues', // Replace with your Laravel route
        //             type: 'POST',
        //             data: formData,
        //             success: function(response) {
        //                 // Handle the response
        //                 console.log(response);
        //             },
        //             error: function(xhr, status, error) {
        //                 // Handle errors
        //                 var er = xhr.responseText;
        //                 console.error(er);
        //             }
        //         });
        //     });
        // });
    </script>
@endsection

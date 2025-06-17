<td class="text-secondary text-center align-middle">

    <!-- Modal view Structure -->
    <a href="#" class="text-success" title="Delete" data-bs-toggle="modal"
        data-bs-target="#modal-view{{ $product->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
        </svg>
    </a>
    <div class="modal modal-blur fade" id="modal-view{{ $product->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">


                    <img src="{{ asset($product->product_img) }}" alt="product image" class="img-fluid mb-3"
                        style="height:300px; object-fit:cover; object-position:center;">

                </div>
                <div class="modal-footer bg-light">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn w-100 btn btn-secondary" data-bs-dismiss="modal"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-progress-x">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" />
                                        <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" />
                                        <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" />
                                        <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" />
                                        <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" />
                                        <path d="M14 14l-4 -4" />
                                        <path d="M10 14l4 -4" />
                                    </svg>បោះបង់</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal edit Structure -->
    <a href="#" class="text-primary" title="Edit" data-bs-toggle="modal"
        data-bs-target="#modal-edit{{ $product->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
            <path d="M16 5l3 3" />
        </svg>
    </a>
    <div class="modal modal-blur fade" id="modal-edit{{ $product->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/adminstrator/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-status bg-primary"></div>
                    <div class="modal-body py-4">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="mb-3">
                                    <label class="form-label">Product
                                        Name</label>
                                    <input type="text" class="form-control" name="itemName"
                                        value="{{ $product->product_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">

                                <div class="mb-3">
                                    <div class="form-label">Unit</div>
                                    <select class="form-select" name="unit">
                                        <option value="{{ $product->unit }}" selected="">
                                            {{ $product->unit }}
                                        </option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit }}">
                                                {{ $unit }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            {{-- <div class="col-md-6 col-xl-3">

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Quantity</label>
                                                                        <input type="text" class="form-control"
                                                                            name="qtyInstock"
                                                                            value="{{ $product->qty_instock }}">
                                                                    </div>

                                                                </div> --}}
                            <div class="col-md-6 col-xl-3">

                                <div class="mb-3">
                                    <div class="form-label">Status</div>
                                    <select class="form-select" name="isActive">
                                        <option value="1" {{ $product->is_active == 1 ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="2" {{ $product->is_active == 2 ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="productImg"
                                        accept=".png, .jpg, .jpeg">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                    <div class="modal-footer bg-light">

                        <div class="row w-100">
                            <button type="submit" class="btn btn-primary w-100"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
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
                                </svg>Update
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Modal delete Structure -->
    <a href="#" class="text-danger " title="Delete" data-bs-toggle="modal"
        data-bs-target="#modal-danger{{ $product->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icon-tabler-trash">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M4 7l16 0" />
            <path d="M10 11l0 6" />
            <path d="M14 11l0 6" />
            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
        </svg>
    </a>
    <div class="modal modal-blur fade" id="modal-danger{{ $product->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="modal-content">
                    <div class="modal-status bg-danger"></div>
                    <div class="modal-body text-center py-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon mb-2 text-danger icon-lg">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                            </path>
                            <path d="M12 9v4"></path>
                            <path
                                d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z">
                            </path>
                            <path d="M12 16h.01"></path>
                        </svg>
                        <h3>តើអ្នកពិតជាចង់លុបឯកសារនេះមែនទេ??</h3>
                        <div class="text-secondary">
                            ឯកសារដែលបានលុបហើយមិនអាចយកមកវិញបានទេ!</div>
                    </div>
                    <div class="modal-footer bg-light">
                        <div class="w-100">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn w-100 btn btn-secondary"
                                        data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-progress-x">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" />
                                            <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" />
                                            <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" />
                                            <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" />
                                            <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" />
                                            <path d="M14 14l-4 -4" />
                                            <path d="M10 14l4 -4" />
                                        </svg>បោះបង់</button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger w-100"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
                                        </svg>យល់ព្រម
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</td>

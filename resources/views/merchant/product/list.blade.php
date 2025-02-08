@extends('merchant\master')
@section('title')
{{ __('Product List') }}
@endsection
@section('content')

<div class="pc-container">

    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Product List</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card table-card">
                    <div class="card-body">
                        <div class="text-end p-sm-4 pb-sm-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModalLive">Add Product</button>
                        </div>
                        <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLiveLabel">Add Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('merchant.product.add') }}" method="POST">
                                        @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-lg-12">
                <input type="text" required
                    class="form-control mt-2  @error('product_name') is-invalid @enderror"
                    name="product_name" placeholder="Enter Product Name">
                @error('product_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12">
                <select
                    class="form-select @error('category_name') is-invalid @enderror"
                    id="category" name="category_name" required>
                    <option value="">Choose...</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->category_name }}">
                        {{ $category->category_name }}</option>
                    @endforeach
                </select>
                @error('category_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-12">
                <select
                    class="form-select @error('store_name') is-invalid @enderror"
                    id="category" name="store_name" required>
                    <option value="">Choose...</option>
                    @foreach ($stores as $store)
                    <option value="{{ $store->store_name }}">
                        {{ $store->store_name }}</option>
                    @endforeach
                </select>
                @error('store_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover tbl-product" id="pc-dt-simple">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Store Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->store_name }}</td>
                                    <td>
                                        <a href="{{ route('merchant.product.destroy',$product->id) }}"
                                            class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

@endsection

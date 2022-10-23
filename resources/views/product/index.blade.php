@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Add Product</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Product Name</label>
                            <input type="text" class="form-control" name="product_name" value="" placeholder="product name" required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Class</label>
                            <input type="text" class="form-control" name="class" placeholder="Enter class">
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img class="shadow rounded" src="" alt="" width="260px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Size</label>
                            <input type="text" class="form-control" name="size" value="" placeholder="Enter size"  required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Production Cost</label>
                            <input type="number" class="form-control" name="production_cost" >
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img class="shadow rounded" src="" alt="" width="260px">
                        </div>
                    </div>
                </div>

                <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Salling Price</label>
                                <input type="number" class="form-control" name="price" >
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img class="shadow rounded" src="" alt="" width="260px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Unit Type</label>
                                <input type="text" class="form-control" name="unit_type" >
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img class="shadow rounded" src="" alt="" width="260px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control" name="date" >
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img class="shadow rounded" src="" alt="" width="260px">
                            </div>
                        </div>
                </div>
                <div class="form-group text-right">
                <button type="submit" class="btn btn-success btn-rounded">Save</button>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

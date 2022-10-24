@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-6"><h4>Add Supplier</h4></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{url('/supplier/list/update/'.$suppliers->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Supplier Name</label>
                            <input type="text" class="form-control" name="supplier_name" value="{{$suppliers->supplier_name}}" placeholder="supplier name" required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" value="{{$suppliers->email}}" name="email" placeholder="Enter email">
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img class="shadow rounded" src="" alt="" width="260px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$suppliers->phone}}" placeholder="+88017542055420"  required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" class="form-control" name="date" value="{{$suppliers->date}}" >
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
                            <label for="exampleInputEmail1">Note</label>
                            <textarea class="form-control" name="note" cols="30" rows="5" value="{{$suppliers->note}}"></textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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

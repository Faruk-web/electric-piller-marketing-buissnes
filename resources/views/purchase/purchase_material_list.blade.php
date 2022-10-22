@extends('layouts.app')
@section('body_content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <div class="container p-4">
    <div class="row shadow rounded bg-light" style="padding-top:20px">
      <div class="col-md-10">
      <h2>Purchase Invoice List</h2>
      </div>
      <div class="col-md-2 text-right">
        <a style="font-size: 13px;" href="{{route('purchase.material')}}" class="btn btn-primary btn-rounded">Purchase Material</a>
          <!-- <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#exampleModal">Add Material</button> -->
      </div>
      <div class="row">
          <div class="col-md-12 text-danger">
              @if($errors->any())
                  {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
              @endif
          </div>
      </div>
      <div class="col-md-12 mb-3">
        <table class="table table-bordered data-table display nowrap">
          <thead>
              <tr>
                  <th>Invoice Number</th>
                  <th>Price</th>
                  <th >Total Price</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
</div>
</body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-light" id="exampleModalLabel">Add Doner</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('raw.material.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span class="text-danger">*</span>Material Name</label>
                            <input type="text" class="form-control" name="material_name" value="" required>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Material Type Unit</label>
                            <input type="text" class="form-control" name="unit_type" >
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
                            <label for="exampleInputEmail1">Price</label>
                            <input type="text" class="form-control" value="" name="price" >
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Note</label>
                            <textarea class="form-control" name="note" cols="30" rows="5"></textarea>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('purchase.material.data') }}",
        columns: [
            {data: 'invioce_number', name: 'invioce_number'},
            {data: 'price', name: 'price'},
            {data: 'total_price', name: 'total_price'},
            {data: 'action', name: 'action'},
        ],
        "scrollY": "300px",
        "pageLength": 50,
        "ordering": false,
    });
  });
</script>

@endsection

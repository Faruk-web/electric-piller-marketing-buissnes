@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4>Create New Purchase</h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('purchase.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12 p-1">
                        <div class="shadow rounded p-2 mb-4">
                            <h4 class="fw-bold">Set Supplier Info or <span class="badge badge-pill badge-primary" data-toggle="modal" data-target="#exampleModal" style="cursor: grab;">Search Supplier</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Supplier Name</label>
                                        <input type="text" class="form-control" name="supplier_name" id="supplier_name" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Supplier Phone</label>
                                        <input type="text" class="form-control" maxlength="11" minlength="11" name="doner_phone" value="" id="doner_phone" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Date</label>
                                        <input type="date" class="form-control" name="date"  value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                <label for="example-text-input-alt"><span class="text-danger">*</span>Total Gross</label>
                                    <input type="number" class="form-control" name="total_gross" value="" required="">
                                </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="shadow rounded p-2">
                              <div class="form-group">
                                    <label for="example-text-input-alt"><span class="text-danger">*</span>Note</label>
                                    <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light" id="exampleModalLabel">Search Supplier and set</h5>
          <button type="button" class="close text-light" id="modal_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group shadow rounded p-1">
                        <input type="text" class="form-control" id="doner_search"
                            placeholder="Search by supplier info (name, phone)" name="company_name">
                    </div>
                </div>
                <div class="col-md-3 text-center">

                </div>
                <div class="col-md-12">
                    <div class="pl-1 pr-1 pb-2">
                        <div class="card-body shadow rounded">
                            <table class="table table-bootstrap">
                                <tbody id="doner_show_info"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

<script>
    // Begin:: doner Search for 
    $('#doner_search').keyup(function () {
        var project_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/purchase/invoice/search-project',
            data: {
                'project_info': project_info
            },
            success: function (data) {
                $('#doner_show_info').html(data);
            }
        });
    });
    // End:: doner Search for
</script>

<script>
function setDonerInfo(supplier_name, phone) {
    $('#supplier_name').val(supplier_name);
    $('#doner_phone').val(phone);
    $('#modal_close').click();
    success("Doner Info set Successfully.");
}

</script>

@endsection



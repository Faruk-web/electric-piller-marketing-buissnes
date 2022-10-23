@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4></h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('production.product.store')}}">
                @csrf
                    <div class="row">
                        <div class="col-md-8 p-1">
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
                                </div>
                        <div class=" p-3 shadow">
                                <h4 class="m-0">Production To Product Output =></h4>
                                <div  class="row p-3">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th >Product Name</th>
                                        <th >Product Quantity</th>
                                        <th >Production Cost</th>
                                        <th >Total Product Cost</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody id="selected_products"></tbody>

                        </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <label for="">Total Tk:</label>
                                    <input type="text" class="form-control" id="all_total">
                                </div>
                            </div>
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" id="all_total">
                        <div class="" style="padding-top:10px">
                            <div class="form-group text-right">
                             <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                         </div>
                       <div class="col-md-4 p-1">
                            
                            <div class="shadow">
                                <div class="form-group shadow rounded p-3">
                                    <label for="example-text-input-alt">Search Product</label>
                                    <input type="text" class="form-control" id="product_search" placeholder="Search By product Name" name="product_search">
                                    <div class="row mt-2 p-3" id="product_show_info">

                                    </div>
                                </div>
                        </div>
                    <div class="col-md-4">
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
    function setDonerInfo(supplier_name, phone) {
    $('#supplier_name').val(supplier_name);
    $('#doner_phone').val(phone);
    $('#modal_close').click();
    success("Doner Info set Successfully.");
}


    // Begin:: members Search for
    $('#product_search').keyup(function () {
        var product_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search/product',
            data: {
                'product_info': product_info
            },
            success: function (data) {
                $('#product_show_info').html(data);
            }
        });
    });
    // End:: doner Search for
</script>

<script>

function setMember(id, name, phone, type) {
    var check = $('#product_id_'+id).val();
    if(check) {
        error("Products is exist.");
    }
    else {
        const cartDom = `
            <tr id="product_column_`+id+`">
            <td><input type="text" class="col-md-12" name="product_id[]" id="product_id_`+id+`" value="`+name+`">
            <td><input type="hidden" name="invioce_number[]" id="product_id_`+id+`" value="`+id+`">
            <input type="number" class="form-control qty"  name="quantity[]" oninput="qty(`+id+`)" value="" id="qty`+id+`" ></td>
           <td> <input type="number" class="form-control price" name="product_cost[]" oninput="price(`+id+`)" value="" id="price`+id+`" ></td>
           <td> <input type="number" class="form-control total" name="total_production[]" value="0" id="total`+id+`" ></td>
           <td><button type="button" onclick="delete_product(`+id+`)" class="mt-2 btn btn-danger btn-sm">X</button></td>
            </tr>
            `;

        $('#selected_products').append(cartDom);
        $('#product_show_info').html('');
        $('#product_search').val('');
        success("product Added.");
    }
}

function delete_product(id) {
    $('#product_column_'+id).remove();
    success("Product Deleted.");
    multiply();
}

function setDonerInfo(name, phone) {
    $('#doner_name').val(name);
    $('#doner_phone').val(phone);
    $('#modal_close').click();
    success("Doner Info set Successfully.");
}

function qty(id) {
         multiply();

    }

    function price(id) {
         multiply();

    }

    function multiply() {

        var qty = document.querySelectorAll(".qty");

        var i, qty = qty.length;
        for (i = 0; i < qty; i++) {

            perprice = Number(document.getElementsByClassName('price')[i].value);
            qty = Number(document.getElementsByClassName('qty')[i].value);
            tk = perprice*qty;
            document.getElementsByClassName('total')[i].value=tk.toFixed(2);
            calculateSum();

        }
        function calculateSum() {
		var final_tk = 0;
		$(".total").each(function() {
			if(!isNaN(this.value) && this.value.length!=0) {
				final_tk += parseFloat(this.value);
			}
		});

		$('#all_total').val(final_tk);
    }

    }

</script>

@endsection



@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4>Material To Make Product</h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('material.make.product.submite')}}">
                @csrf
                <div class="row">
                    <div class="col-md-8 p-1">
                        <div class="shadow rounded p-2 mb-4">
                            <!-- <h4 class="fw-bold">Set Product Info or <span class="badge badge-pill badge-primary" data-toggle="modal" data-target="#exampleModal" style="cursor: grab;">Search Prodcut</span></h4> -->
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Product Name</label>
                                        <input type="text" class="form-control" name="product_id" id="project_name" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Date</label>
                                        <input type="date" class="form-control" maxlength="11" minlength="11" name="date" value="" required="">
                                    </div>
                                </div> -->
                               <div class="col-md-12">
                                    <div class="form-group">
                                    <h4 class="m-0">Material info make product =></h4>
                                   <div id="selected_members" class="row p-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> Material Name</th>
                                                <th> Unit Amount</th>
                                                <th> Price</th>
                                                <th> Total price</th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                            
                                <div class="col-md-4">
                                    <label for="">Total Tk:</label>
                                    <input type="text" class="form-control" id="all_total" readonly>
                                </div>
                      
                        </div>
                            </div>
                        </div>
                        <div class="shadow rounded p-2">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shadow">
                            <div class="form-group shadow rounded p-3">
                                <label for="example-text-input-alt">Search Materials</label>
                                <input type="text" class="form-control" id="member_search" placeholder="Search by product name , product cost" name="member_search">
                                <div class="row mt-2 p-3" id="member_show_info">

                                </div>
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
          <h5 class="modal-title text-light" id="exampleModalLabel">Search product and set</h5>
          <button type="button" class="close text-light" id="modal_close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group shadow rounded p-1">
                        <input type="text" class="form-control" id="project_search"
                            placeholder="Search by product info (Name, Unit Type)" name="company_name">
                    </div>
                </div>
                <div class="col-md-3 text-center">

                </div>
                <div class="col-md-12">
                    <div class="pl-1 pr-1 pb-2">
                        <div class="card-body shadow rounded">
                            <table class="table table-bootstrap">
                                <tbody id="project_show_info"></tbody>
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
     // Begin:: project Search for
     $('#project_search').keyup(function () {
        var project_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/create/search/material/product',
            data: {
                'project_info': project_info
            },
            success: function (data) {
                console.log("Hello world!");
                $('#project_show_info').html(data);
            }
        });
    });
</script>
<script>
    // Begin:: members Search for 
    $('#member_search').keyup(function () {
        var member_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/create/search/material',
            data: {
                'member_info': member_info
            },
            success: function (data) {
                $('#member_show_info').html(data);
            }
        });
    });
    // End:: doner Search for 
</script>

<script>

function setMember(id, material_name, price) {
    var check = $('#product_id'+id).val();
    if(check) {
        error("Member is exist.");
    }
    else {
        const cartDom = `
                        <tr id="product_column_`+id+`">
                            <td><input type="text" class="form-control" name="material_name[]" id="product_id_`+id+`" value="`+material_name+`" readonly>
                            <td><input type="hidden" name="invioce_number[]" id="product_id_`+id+`" value="`+id+`">
                            <input type="number" class="form-control qty"  name="quantity[]" oninput="qty(`+id+`)" value="" id="qty`+id+`" ></td>
                            <td> <input type="number" class="form-control price" name="price[]" oninput="price(`+id+`)" value="`+price+`" id="price`+id+`" ></td>
                            <td> <input type="number" class="form-control total" name="total_price[]" value="0" id="total`+id+`" readonly></td>
                            <td><button type="button" onclick="delete_product(`+id+`)" class="mt-2 btn btn-danger btn-sm">X</button></td>
                        </tr>

                        `;

        $('#selected_members').append(cartDom);
        $('#member_show_info').html('');
        $('#member_search').val('');
        success("Member Added.");
    }
}

function delete_product(id) {
    $('#product_column_'+id).remove();
    success("Product Deleted.");
    multiply();
}

function setDonerInfo(title, code) {
    $('#project_name').val(title);
    $('#project_code').val(code);
    $('#modal_close').click();
    success("project Info set Successfully.");
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



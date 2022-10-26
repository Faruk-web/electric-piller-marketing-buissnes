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
                                    <input type="text" class="form-control" id="all_total" readonly>
                                </div>
                            </div>
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" id="all_total">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Note</label>
                                        <textarea class="form-control" name="note" cols="30" rows="5" value=""></textarea>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="" style="padding-top:10px">
                            <div class="form-group text-right">
                             <button type="submit" class="btn btn-success">Submit</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
referrerpolicy="no-referrer"></script>

<script>
    // Begin:: doner Search for
    $('#doner_search').keyup(function () {
        var doner_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/project/create/search-doner',
            data: {
                'doner_info': doner_info
            },
            success: function (data) {
                $('#doner_show_info').html(data);
            }
        });
    });
    // End:: doner Search for

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
            <td><input type="text" class="form-control" name="product_id[]" id="product_id_`+id+`" value="`+name+`" readonly>
            <td><input type="hidden" name="invioce_number[]" id="product_id_`+id+`" value="`+id+`">
            <input type="number" class="form-control qty"  name="quantity[]" oninput="qty(`+id+`)" value="" id="qty`+id+`" ></td>
            <td> <input type="number" class="form-control price" name="product_cost[]" oninput="price(`+id+`)" value="" id="price`+id+`" ></td>
            <td> <input type="number" class="form-control total" name="total_production[]" value="0" id="total`+id+`" readonly></td>
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



@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4>Materials for {{$product_info->product_name}} To Make</h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('material.make.product.submite')}}">
                @csrf
                <div class="row">
                    <div class="col-md-8 p-1">
                        <div class="shadow rounded p-2 mb-4">
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="form-group">
                                   <div id="selected_members" class="row p-3">
                                    <table class="table table-bordered">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th> Material Info</th>
                                                <th> Unit</th>
                                                <th> Price</th>
                                                <th> Total price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_output">
                                            @foreach($materials_info as $material)
                                            <tr>
                                                <td>
                                                    {{$material->MaterialInfo->material_name}}
                                                    <input type="hidden" name="material_id" id="material_id_{{$material->MaterialInfo->id}}" value="{{$material->MaterialInfo->id}}" >
                                                </th>
                                                <td><input class="form-control" type="number" name="unit_amount" id="" value="{{$material->unit_amount}}" step=any></td>
                                                <td><input class="form-control" type="number" name="price" id="" value="{{$material->price}}" step=any></td>
                                                <td><input class="form-control" type="number" name="total_price" id="" value="{{$material->total_price}}" step=any></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                                <div class="col-md-4">
                                    <label for="">Total Tk:</label>
                                    <input type="text" class="form-control" id="all_total">
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
    var check = $('#material_id_'+id).val();
    if(check) {
        error("Member is exist.");
    }
    else {
        const cartDom = `<tr>
                            <td>
                                `+material_name+`
                                <input type="hidden" name="material_id" id="material_id_`+id+`" value="`+id+`" >
                            </th>
                            <td><input class="form-control" type="number" name="unit_amount" id="" value="" step=any></td>
                            <td><input class="form-control" type="number" name="price" id="" value="`+price+`" step=any></td>
                            <td><input class="form-control" readonly type="number" name="total_price" id="" value="" step=any></td>
                        </tr>`;

        $('#tbody_output').append(cartDom);
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



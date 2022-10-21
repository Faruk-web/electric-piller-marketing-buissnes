@extends('layouts.app')
@section('body_content')
<div class="content">
    <div class="row">
        <div class="col-md-8"><h4>Create First Resulation</h4></div>
        <div class="col-md-2"></div>
        <div class="col-sm-12 col-xl-12 col-md-12">
            <div class="block block-rounded d-flex flex-column">
                <div class="block-content block-content-full justify-content-between align-items-center">
                <form method="POST" action="{{route('purchase.material.submite')}}">
                @csrf
                <div class="row">
                    <div class="col-md-8 p-1">
                        <div class="shadow rounded p-2 mb-4">
                            <h4 class="fw-bold">Set project Info or <span class="badge badge-pill badge-primary" data-toggle="modal" data-target="#exampleModal" style="cursor: grab;">Search Project</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Project Name</label>
                                        <input type="text" class="form-control" name="project_name" id="project_name" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input-alt"><span class="text-danger">*</span>Project code</label>
                                        <input type="text" class="form-control" maxlength="11" minlength="11" name="project_code" value="" id="project_code" required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="example-text-input-alt"><span class="text-danger">*</span>Description </label>
                                    <textarea name="editor1" id="" cols="10" rows="0" class="form-control "></textarea>
                               </div>
                               <div class="col-md-12">
                                    <div class="form-group">
                                    <h4 class="m-0">Prasent Members =></h4>
                                   <div id="selected_members" class="row p-3">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="col-md-3" width="6%">SL</th>
                                                <th class="col-md-3" width="6%"> Name</th>
                                                <th class="col-md-3" width="6%"> title</th>
                                                <th class="col-md-3" width="6%"> Signature</th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <label for="example-text-input-alt"><span class="text-danger">*</span> Long Description </label>
                                    <textarea name="editor2" id="" cols="10" rows="0" class="form-control"></textarea>
                               </div>
                               <div class="col-md-12 shadow">
                                        <div class=" rounded p-2">
                                            <div class="form-group text-right">
                                                <button type="button" id="btn2" class="btn btn-success">Add+</button>
                                            </div>
                                        </div>
                                        <dive class="oll">
                                        <table class="table">
                                            <tr>
                                                <th  class="col-md-3"  width="6%">Subject</th>
                                                <th  class="col-md-3"  width="6%">Discussion</th>
                                                <th  class="col-md-3"  width="6%">decision made</th>
                                                <th  class="col-md-4"  width="6%">burdened person</th>
                                                
                                            </tr>
                                           
                                        </table>
                                      </dive>
                                </div>
                            </div>
                        </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input-alt">Date</label>
                                        <input type="date" class="form-control" name="date" value="" id="doner_address">
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
                                <label for="example-text-input-alt">Search Members</label>
                                <input type="text" class="form-control" id="member_search" placeholder="Search By name, phone" name="member_search">
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
          <h5 class="modal-title text-light" id="exampleModalLabel">Search project and set</h5>
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
                            placeholder="Search by project info (title, code)" name="company_name">
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
$(document).ready(function(){
  $("#btn2").click(function(){
    $(".oll").append(`
    <div class="col-md-12 ">
    
        <table class="table ">
            <tr>
                <td><input type="text" name="sub[]" class="col-md-12"></td>
                <td><input type="text" name="decision[]" class="col-md-12"></td>
                <td><input type="text" name="comment[]" class="col-md-12"></td>
                <td><input type="text" name="person[]" class="col-md-12"></td>
                <td>
                <button type="button"  class="btn btn-danger btn-sm ">X</button>
                </td>
            </tr>
        </table>
   
    </dive>
    `);
  });
  $("button").click(function(){
    $(".div1").remove();
  });
});
</script>
<script>
     // Begin:: project Search for
     $('#project_search').keyup(function () {
        var doner_info = $(this).val();
        $.ajax({
            type: 'get',
            url: '/create/search-doner',
            data: {
                'doner_info': doner_info
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
            url: '/search_member',
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

function setMember(id, name, phone, type) {
    var check = $('#member_id'+id).val();
    if(check) {
        error("Member is exist.");
    }
    else {
        const cartDom = `
                        <tr id="member_column_`+id+`">
                            <td>
                            <input type="text" class="col-md-8" class="form-control m-0"  name="serial[]" oninput="qty(`+id+`)" value="" id="qty`+id+`" >
                            </td>
                            <td><input type="hidden" name="member_id[]" value="`+id+`"><h5 class="col-md-2 text-success">`+name+`</h5></td>
                            <td> 
                            <input type="text" class="col-md-10" class="form-control "   oninput="qty(`+id+`)" value="" id="qty`+id+`" >
                            </td>
                            <td> 
                            <input type="text" class="col-md-10" class="form-control"   oninput="qty(`+id+`)" value="" id="qty`+id+`" >
                            </td>
                            <td>
                            <button type="button" onclick="delete_product(`+id+`)" class=" btn btn-danger btn-sm">X</button>
                            </td>
                        </tr>

                        `;

        $('#selected_members').append(cartDom);
        $('#member_show_info').html('');
        $('#member_search').val('');
        success("Member Added.");
    }
}

function delete_member(id) {
    $('#member_column_'+id).remove();
    success("Member Deleted.");
}

function setDonerInfo(title, code) {
    $('#project_name').val(title);
    $('#project_code').val(code);
    $('#modal_close').click();
    success("project Info set Successfully.");
}

</script>
@endsection



<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Material;
use App\Models\MaterialInfoToMakeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;
class ProductInvoiceController extends Controller
{
    //product invoice create
    public function create(){
        return view('product.index');
    }
    public function productstore(Request $request){
        $products = new Product;
        $products->product_name = $request->product_name;
        $products->class = $request->class;
        $products->size = $request->size;
        $products->date = $request->date;
        $products->production_cost = $request->production_cost;
        $products->price = $request->price;
        $products->unit_type = $request->unit_type;
        $products->created_at = Carbon::now();
        $products->save();
        return Redirect()->route('product.list')->with('success', 'New Product Added.');
    }
     //product invoice create
     public function material_product(){
        return view('product.material_make_product');
    }
       // search_member
       public function search_product(Request $request) {
        $output = '';
        $member_info = $request->member_info;
          $members = Product::where(function ($query) use ($member_info) {
                                $query->where('product_name', 'LIKE', '%'. $member_info. '%')
                                    ->orWhere('production_cost', 'LIKE', '%'. $member_info. '%');
                            })
                            ->limit(10)
                            ->get(['production_cost', 'product_name', 'id']);
         // dd($members);
          if(!empty($member_info)) {
              if(count($members) > 0) {
                foreach ($members as $member) {
                    $output.='<div class="col-md-12 p-1">
                                <div class="shadow row rounded border">
                                    <div class="col-md-12 p-2">
                                        <h5 class="m-0">'.$member->production_cost.'</h5>
                                        <span>'.$member->product_name.'</span><br>
                                        <button type="button" onclick="setMember('.$member->id.', \''.$member->production_cost.'\', \''.$member->product_name.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button>
                                    </div>
                                </div>
                            </div>';
                    }
              }
              else {
                $output.='<div colspan="6" class="text-center"><h2>No Result Found</h2></div>';
            }
        }
        return Response($output);
    }

    //first resulation details end
    public function material_make_product_submite(Request $request){
        // dd($request);
        $material_id=Material::where('material_name',$request->material_id)->first();
        $product_id=Product::where('product_name',$request->product_id)->first();
        foreach($request->product_id as $key => $item) {
        $purchase_material=new MaterialInfoToMakeProduct;
        $purchase_material->unit_amount	=$request->unit_amount[$key];
        $purchase_material->price	=$request->price[$key];
        $purchase_material->total_price	=$request->total_price[$key];
        $purchase_material->date	=$request->date;
        $purchase_material->material_id	=$material_id->id;
        $purchase_material->product_id	=$product_id->id;
        $purchase_material->save();
    }
    return Redirect()->route('material.make.product.list')->with('success','First Purchase Material Successfully Done');
}
    //product_list
    public function product_list(){
        return view('product.list');
    }
    //product_list_data
    public function product_list_data(Request $request){
        if ($request->ajax()) {
            $data = Product::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                
                ->addColumn('product_name', function($row){
                    return $row->product_name;
                })
                ->addColumn('unit_type ', function($row){
                    return $row->unit_type ;
                })
                ->addColumn('size', function($row){
                    return $row->size;
                })
                ->addColumn('price', function($row){
                    return $row->price;
                })
                
                ->rawColumns(['action', 'product_name', 'unit_type','size','price'])
                ->make(true);
        }
    }
    //material_make_product_product_list
    public function material_make_product_product_list(){
        return view('product.material_make_product_list');
    }
     //material_make_product_data
     public function material_make_product_data(Request $request){
        if ($request->ajax()) {
            $data = MaterialInfoToMakeProduct::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                ->addColumn('material_id', function($row){
                    return optional($row->MaterialInfo)->material_name;
                })
                ->addColumn('product_id', function($row){
                    return optional($row->ProductInfo)->product_name;
                })
                ->addColumn('unit_amount', function($row){
                    return $row->unit_amount;
                })
                ->addColumn('price', function($row){
                    return $row->price;
                })
                
                ->rawColumns(['action', 'material_id', 'product_id','unit_amount','price'])
                ->make(true);
        }
    }
}

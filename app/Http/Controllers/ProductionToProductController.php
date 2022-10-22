<?php

namespace App\Http\Controllers;
use App\Models\ProductInvoice;
use App\Models\RawMaterialStock;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;
class ProductionToProductController extends Controller
{
    //invoice create
    public function create(){
        return view('invoice.create');
    }
    //invoicestore
    public function invoicestore(Request $request){
        // dd($request);
        $product_invoice = new ProductInvoice;
        $total_products = ProductInvoice::count('id');
        $invioce_number = 'P121'.($total_products+1);
        $product_invoice->invioce_number = $invioce_number;
        $product_invoice->date = $request->date;
        $product_invoice->note = $request->note;
        $product_invoice->total_cost = $request->total_cost;
        $product_invoice->status = $request->status;
        $product_invoice->date = Carbon::now();
        $product_invoice->created_at = Carbon::now();
        $product_invoice->save();
        return Redirect()->back()->with('success', 'New product invoice Added');
    }
    //invoicelistdata
    public function invoicelistdata(Request $request){
        if ($request->ajax()) {
            $data = ProductInvoice::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                
                ->addColumn('invioce_number', function($row){
                    return $row->invioce_number;
                })
                ->addColumn('total_cost', function($row){
                    return $row->total_cost;
                })
                ->addColumn('status', function($row){
                    return $row->status;
                })
                
                ->rawColumns(['action', 'invioce_number', 'total_cost','status'])
                ->make(true);
            }
       }
       //production_material
       public function production_material(){
        return view('invoice.production_material_create');
    }
     //search project end
     public function search_doner(Request $request) {
        $output = '';
        $doner_info = $request->doner_info;
          $doners = RawMaterialStock::where(function ($query) use ($doner_info){
                                $query->where('material_id', 'LIKE', '%'. $doner_info. '%')
                                    ->orWhere('stock_quantity', 'LIKE', '%'. $doner_info. '%');
                            })
                            ->get(['stock_quantity', 'material_id', 'id']);

          if(!empty($doner_info)) {
              if(count($doners) > 0) {
                foreach ($doners as $doner) {
                    $output.='<tr>
                        <td>'.$doner->stock_quantity.'</td>
                        <td>'.$doner->material_id.'</td>
                        <td><button type="button" onclick="setDonerInfo(\''.$doner->stock_quantity.'\', \''.$doner->material_id.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
                        </tr>';
                    }
              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
            }
        }
        return Response($output);
    }
    // search_member
    public function search_member(Request $request) {
        $output = '';
        $member_info = $request->member_info;
          $members = ProductInvoice::where(function ($query) use ($member_info) {
                                $query->where('invioce_number', 'LIKE', '%'. $member_info. '%')
                                    ->orWhere('total_cost', 'LIKE', '%'. $member_info. '%');
                            })
                            ->limit(10)
                            ->get(['total_cost', 'invioce_number', 'id']);
         // dd($members);
          if(!empty($member_info)) {
              if(count($members) > 0) {
                foreach ($members as $member) {
                    $output.='<div class="col-md-12 p-1">
                                <div class="shadow row rounded border">
                                    <div class="col-md-12 p-2">
                                        <h5 class="m-0">'.$member->total_cost.'</h5>
                                        <span>'.$member->invioce_number.'</span><br>
                                        <button type="button" onclick="setMember('.$member->id.', \''.$member->total_cost.'\', \''.$member->invioce_number.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button>
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

    public function production_material_store(Request $request)
    {  
        dd($request);

        $total_invoice = ProductInvoice::count('id');
        $update_count = $total_invoice + 1;
        $invoice_number = "P".rand(1000, 9999).$update_count;

        $total_cost = 0;

            foreach($pid as $key => $item) {
                $unit = $request->quantity[$key];
                $material_id = $material_id[$key];
                $price = $request->price[$key];
                
                $check_raw_materials_stock =RawMaterialStock::where('material_id', $material_id)->first();
                
                if(!is_null($check_raw_materials_stock)) {
                    $db_stock = $check_raw_materials_stock->stock_quantity;
                    if($db_stock >= $quantity) {
                        
                        $total_price = $quantity * $price;

                        $production_materials = new ProductionMaterial;
                        $production_materials->raw_material_id = $material_id;
                        $production_materials->invioce_number = $invoice_number;
                            
                        
                        $rests_qty = $db_stock - $quantity;
                        if($rests_qty == 0) {
                            $check_raw_materials_stock::delete();
                        }
                        else {
                            DB::table('product_stocks')->where(['id'=>$check_product->id, 'shop_id'=>$shop_id])->update(['stock'=>$rest_quantity, 'cartoon_amount'=>$rest_cartoon_qty]);
                        }
                        
                        $total_cost = $total_cost + $total_price;

                    }
                    
                }
            }

            $insert = BranchToSRproductsTransfer::insert(['shop_id'=>$shop_id, 'user_id'=>Auth::user()->id, 'invoice_id'=>$invoice_id, 'sender_branch_id'=>$sender_branch, 'sr_id'=>$sr_id, 'note'=>$request->note, 'date'=>$date, 'created_at'=>$current_time]);
            if($insert) {
                DB::table('moments_traffics')->insert(['shop_id' => $shop_id, 'user_id' => Auth::user()->id, 'info' => 'Stock Out from Branch To SR Transfer (BTSR). Invoice num '.$invoice_id, 'created_at' => $current_time]);
                return Redirect()->route('b.to.sr.transfer.index')->with('success', 'Stock Out from Branch To SR Transfer Successfully done.');
            }
            else {
                return Redirect()->back()->with('error', 'Sorry something is wrong, please try again.');
            }
            return Redirect()->back()->with('error', 'Sorry you can not access this page');
     
    }


}
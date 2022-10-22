<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseMaterial;
use App\Models\Material;
use App\Models\RawMaterialStock;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;

class PurchaseInvoiceController extends Controller
{
    //purchase Invoice
    public function Invoice(){
        return view('purchase.index');
    }
     //search project start
     public function search_project(Request $request) {
        $output = '';
        $project_info = $request->project_info;
          $projects = Supplier::where(function ($query) use ($project_info) {
                                $query->where('supplier_name', 'LIKE', '%'. $project_info. '%')
                                    ->orWhere('phone', 'LIKE', '%'. $project_info. '%');
                            })
                            ->get(['supplier_name','phone', 'id']);
          // dd($projects);
          if(!empty($project_info)) {
              if(count($projects) > 0) {
                foreach ($projects as $project) {
                    $output.='<tr>
                        <td>'.$project->supplier_name.'</td>
                        <td>'.$project->phone.'</td>
                        <td><button type="button" onclick="setDonerInfo(\''.$project->supplier_name.'\', \''.$project->phone.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
                        </tr>';
                    }
              }
              else {
                $output.='<tr><td colspan="6" class="text-center"><h2>No Result Found</h2></td></tr>';
            }
        }
        return Response($output);
    }
    //search project end
    //store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_name' => 'required',           
        ]);
        $supplier_id = Supplier::where('supplier_name', $request->supplier_name)->first('id');
        $project = new PurchaseInvoice;
        $total_projects = PurchaseInvoice::count('id');
        $invioce_number = 'S121'.($total_projects+1);
        $project->supplier_id = $supplier_id->id;
        $project->invioce_number = $invioce_number;
        $project->date = $request->date;
        $project->note = $request->note;
        $project->total_gross = $request->total_gross;
        $project->date = Carbon::now();
        $project->created_at = Carbon::now();
        $project->save();
        return Redirect()->back()->with('success', 'New Purchase Added');
    }
    // ==========================================================
    //purchase Invoice
    public function purchase_material(){
        return view('purchase.purchase_material');
    }
     //search project end
     public function search_doner(Request $request) {
        $output = '';
        $doner_info = $request->doner_info;
          $doners = Material::where(function ($query) use ($doner_info){
                                $query->where('unit_type', 'LIKE', '%'. $doner_info. '%')
                                    ->orWhere('material_name', 'LIKE', '%'. $doner_info. '%');
                            })
                            ->get(['material_name', 'unit_type', 'id']);

          if(!empty($doner_info)) {
              if(count($doners) > 0) {
                foreach ($doners as $doner) {
                    $output.='<tr>
                        <td>'.$doner->material_name.'</td>
                        <td>'.$doner->unit_type.'</td>
                        <td><button type="button" onclick="setDonerInfo(\''.$doner->material_name.'\', \''.$doner->unit_type.'\')" class="btn btn-primary btn-sm btn-rounded">Select</button></td>
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
          $members = PurchaseInvoice::where(function ($query) use ($member_info) {
                                $query->where('invioce_number', 'LIKE', '%'. $member_info. '%')
                                    ->orWhere('supplier_id', 'LIKE', '%'. $member_info. '%');
                            })
                            ->limit(10)
                            ->get(['supplier_id', 'invioce_number', 'id']);
         // dd($members);
          if(!empty($member_info)) {
              if(count($members) > 0) {
                foreach ($members as $member) {
                    $output.='<div class="col-md-12 p-1">
                                <div class="shadow row rounded border">
                                    <div class="col-md-12 p-2">
                                        <h5 class="m-0">'.$member->supplier_id.'</h5>
                                        <span>'.$member->invioce_number.'</span><br>
                                        <button type="button" onclick="setMember('.$member->id.', \''.$member->supplier_id.'\', \''.$member->invioce_number.'\')" class="mt-2 btn btn-success btn-sm btn-block btn-rounded">Select</button>
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
        public function purchase_material_submite(Request $request){
            // dd($request->supplier_id);
            $material_id=Material::Where('material_name',$request->material_id)->first();
            foreach($request->supplier_id as $key => $item) {
            $raw_material_stock =   new RawMaterialStock;
            $total_stocks = RawMaterialStock::sum('stock_quantity');
            $stock_quantitys = ($total_stocks+$request->quantity[$key]);
            $raw_material_stock->material_id	=$material_id->id;
            $raw_material_stock->stock_quantity=$stock_quantitys;
            $raw_material_stock->date	=$request->date;
            $raw_material_stock->save();
        }
            $material_id=Material::where('material_name',$request->material_id)->first();
            
            foreach($request->supplier_id as $key => $item) {
            $purchase_material=new PurchaseMaterial;
            $purchase_material->supplier_id	=$request->supplier_id[$key];
            $purchase_material->invioce_number	=$request->invioce_number[$key];
            $purchase_material->quantity	=$request->quantity[$key];
            $purchase_material->price	=$request->price[$key];
            $purchase_material->total_price	=$request->total_price[$key];
            $purchase_material->date	=$request->date;
            $purchase_material->material_id	=$material_id->id;
            $purchase_material->save();
        }

        
        return back()->with('success','First Purchase Material Successfully Done');
    }
    //Invoice_list
    public function Invoice_list(){
        return view('purchase.purchase_list');
    }
    //data fache for lis
    public function Invoice_list_data(Request $request){
        if ($request->ajax()) {
            $data = PurchaseInvoice::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                ->addColumn('supplier_name', function($row){
                    return optional($row->senderSupplierInfo)->supplier_name;
                })
                ->addColumn('invioce_number', function($row){
                    return $row->invioce_number;
                })
                ->addColumn('total_gross', function($row){
                    return $row->total_gross;
                })
                
                ->rawColumns(['action', 'supplier_name', 'invioce_number','total_gross'])
                ->make(true);
        }
      
    }
    //purchase_material_list
    public function purchase_material_list(){
        return view('purchase.purchase_material_list');
    }
    //data fache for lis
    public function purchase_material_data(Request $request){
        if ($request->ajax()) {
            $data = PurchaseMaterial::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                ->addColumn('invioce_number', function($row){
                    return $row->invioce_number;
                })
                ->addColumn('price', function($row){
                    return $row->price;
                })
                ->addColumn('total_price', function($row){
                    return $row->total_price;
                })
                
                ->rawColumns(['action', 'invioce_number', 'price','total_price'])
                ->make(true);
        }
    
    }
}

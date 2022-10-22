<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DataTables;
class SupplierController extends Controller
{
    //supplier create
    public function index(){
        return view('supplier.index');
    }
    //list
    public function list(){
        return view('supplier.list');
    }
       //list of data fach
       public function list_data(Request $request){
        if ($request->ajax()) {
            $data = Supplier::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
                })
                
                ->addColumn('supplier_name', function($row){
                    return $row->supplier_name;
                })
                ->addColumn('phone ', function($row){
                    return $row->phone ;
                })
                ->addColumn('balance', function($row){
                    return $row->balance;
                })
                
                ->rawColumns(['action', 'supplier_name', 'phone','balance'])
                ->make(true);
        }
      
    }
    public function store(Request $request){
        $suppliers = new Supplier;
        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->email = $request->email;
        $suppliers->phone = $request->phone;
        $suppliers->date = $request->date;
        $suppliers->note = $request->note;
        $suppliers->created_at = Carbon::now();
        $suppliers->save();
        return Redirect()->back()->with('success', 'New supplier Added.');
    }
}

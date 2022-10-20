<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class SupplierController extends Controller
{
    //supplier create
    public function index(){
        return view('supplier.index');
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

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\User;
use App\Models\RawMaterialStock;
use DataTables;
use Illuminate\Support\Carbon;
class RawMaterial extends Controller
{
    //raw material
    public function rawmateriallistedit($id){
        $materials=Material::find($id);
        return view('material.index',compact('materials'));
    }
     //rawmaterial_update
     public function rawmaterial_update(Request $request, $id)
    {
        $material =Material::find($id);
        $material->material_name = $request->material_name;
        $material->unit_type = $request->unit_type;
        $material->price = $request->price;
        $material->note = $request->note;
        $material->created_at = Carbon::now();
        $material->update();
        return redirect()->route('raw.material.list')->with('status','Material Updated Successfully');
    }

    
    //rawmateriallist
     public function rawmateriallist(){
        return view('material.list');
    }
    //list
    public function rawmaterial_data(Request $request){
        if ($request->ajax()) {
            $data = Material::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.list.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded" >Edit</a>';
                })
                
                ->addColumn('material_name', function($row){
                    return $row->material_name;
                })
                ->addColumn('unit_type', function($row){
                    return $row->unit_type;
                })
                ->addColumn('price', function($row){
                    return $row->price;
                })
                
                ->rawColumns(['action', 'material_name', 'unit_type','price'])
                ->make(true);
        }
      
    }
    public function rawmaterialstore(Request $request)
    
    {
        $material = new Material;
        $material->material_name = $request->material_name;
        $material->unit_type = $request->unit_type;
        $material->price = $request->price;
        $material->note = $request->note;
        $material->created_at = Carbon::now();
        $material->save();
        return Redirect()->back()->with('success', 'New material Added.');
    }

        //materialstock
        public function materialstock(){
            return view('material.stock');
        }
         //list
       public function materialstockdata(Request $request){
        if ($request->ajax()) {
            $data = RawMaterialStock::orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<a href="'.route('raw.material.list.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded" >Edit</a>';
                })
                ->addColumn('material_id', function($row){
                    return optional($row->MaterialInfo)->material_name;
                })
                ->addColumn('unit_type', function($row){
                    return optional($row->MaterialInfo)->unit_type;
                })
                ->addColumn('price', function($row){
                    return optional($row->MaterialInfo)->price;
                })
                ->addColumn('stock_quantity', function($row){
                    return $row->stock_quantity;
                })
                ->rawColumns(['action', 'material_id', 'stock_quantity','unit_type','price'])
                ->make(true);
        }
      
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\User;
use DataTables;
use Illuminate\Support\Carbon;
class RawMaterial extends Controller
{
    //raw material
    public function rawmaterial(){
        return view('material.index');
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
                    return '<a href="'.route('raw.material.edit', $row->id).'"   class="btn btn-info btn-sm btn-rounded">Edit</a> <a type="button" target="_blank"  class="btn btn-success btn-sm btn-rounded">View</a>';
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
}

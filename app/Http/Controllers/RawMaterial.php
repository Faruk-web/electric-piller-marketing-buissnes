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

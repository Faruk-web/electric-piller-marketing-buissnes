<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\PurchaseInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        // dd($request);
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
        // $project->status = 'members';
        $project->date = Carbon::now();
        $project->created_at = Carbon::now();
        $project->save();
        return Redirect()->back()->with('success', 'New Purchase Added');
    }
}

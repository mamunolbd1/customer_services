<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\crm_details;
use Session;

class CRMController extends Controller
{
    public function index(Request $request){
        $phone_number = $request->phone_number ?? '';
        $agent_name = $request->agent_name ?? '';
        $crms = crm_details::where('phone_number',$phone_number)->get();
        $last_crm = crm_details::where('phone_number',$phone_number)->latest()->first();
        return view('frontend.crms',compact('crms', 'last_crm', 'phone_number', 'agent_name'));
    }
    public function insert(Request $request){
        // dd($request->all());
        // $request->validate([
        //     // 'name'            => 'required|max:55',
        //     'call_type'       => 'required',
        //     'phone_number'  => 'required',
        //     'query_type'      => 'required',
        //     'gender'          => 'required',
        //     'call_remarks'    => 'required',
        //     'alt_phone_number'    => 'required',
        //     'address'         => 'required',
        //     'verbatim'        => 'required',
        // ]);
        
        $info = new crm_details;
        $info->agent_name = $request->agent_name;
        $info->name = $request->customer_name;
        $info->call_type = $request->call_type;
        $info->phone_number = $request->phone_name;
      
        $info->query_type = $request->query_type;
        $info->gender = $request->gender;
        $info->call_remarks = $request->call_remarks;
        $info->alt_phone_number = $request->alt_phone_number;
        $info->address = $request->address;
        $info->verbatim = $request->verbatim;
        $info->save();

        Session::flash('msg','CRM List inserted Successfully');
        return redirect()->back();
    }
    
    public function delete($id){
        $info = crm_details::find($id);
        if(!is_null($info)){
            $info->delete();
        }
        Session::flash('msg','CRM Deleted Successfully');
        return back();
    }
}

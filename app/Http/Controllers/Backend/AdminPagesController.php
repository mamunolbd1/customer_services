<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\crm_details;
use App\Exports\ExportUser;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use DB;
use App\Models\User;
use Session;
class AdminPagesController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.pages.index');
    }
    public function data(){
        $info = crm_details::OrderBy('id','desc')->get();
        return view('backend.pages.crm_data',compact('info'));
    }
    public function export(){
        return view('backend.pages.export');
    }
    public function exportPost(Request $request){
        // print_r(date('Y-m-d', strtotime($request->to)).' 11:59:59');
        // exit();
        $data = crm_details::whereBetween('created_at', [ date('Y-m-d H:i:s', strtotime($request->from)), date('Y-m-d', strtotime($request->to)).' 11:59:59'])->get();
        return Excel::download(new ExportUser($data), 'crms.xlsx');
    }
    public function create(){
        return view('backend.pages.create');
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        // $user->address = $request->address;
        $user->save();

        Session::flash('msg','A new user created Successfully');
        return redirect()->back();
    }
    // public function exportPost(Request $request){
    //     $crms = crm_details::where('agent_name', Auth::user()->id)->get();
    //     $fileName = 'crms.csv';
    //     return $this->getCSV($crms, $fileName);
    //     return redirect()->back();
    // }

    // public function getCSV($crms = [], $fileName)
    // {
    //     $headers = array(
    //         "Content-type"        => "text/csv",
    //         "Content-Disposition" => "attachment; filename=$fileName",
    //         "Pragma"              => "no-cache",
    //         "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
    //         "Expires"             => "0"
    //     );

    //     $columns = [
    //         'ID',
    //         'Date',
    //         'Name',
    //         'Gender',
    //         'Phone Number',
    //         'Call Type',
    //         'Query Type',
    //         'Call Remarks',
    //         'Alt Phone Number',
    //         'Address',
    //         'Verbatim',

    //     ];

    //     $callback = function () use ($crms, $columns) {
    //         $file = fopen('php://output', 'w');
    //         fputcsv($file, $columns);
    //         foreach ($crms as $crm) {
    //             fputcsv($file, array(
    //                 $row['id'] = $crm->id,
    //                 $row['created_at'] = $crm->created_at,
    //                 $row['name'] = $crm->name,
    //                 $row['gender'] = $crm->gender,
    //                 $row['phone_number'] = $crm->phone_number,
    //                 $row['call_type'] = $crm->call_type,
    //                 $row['query_type'] = $crm->query_type,
    //                 $row['call_remarks'] = $crm->call_remarks,
    //                 $row['alt_phone_number'] = $crm->alt_phone_number,
    //                 $row['address'] = $crm->address,
    //                 $row['verbatim'] = $crm->verbatim,
    //             ));
    //         }
    //         fclose($file);
    //     };
    //     return response()->stream($callback, 200, $headers);
    // }
}

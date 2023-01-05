<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentUser;
use Session;

class UserPagesController extends Controller
{
    public function insert(Request $request){
        $user = new AgentUser;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->save();

        Session::flash('msg','A new user created Successfully');
        return redirect()->back();
    }
}

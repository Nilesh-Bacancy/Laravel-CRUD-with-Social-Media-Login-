<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class admincustomercontroller extends Controller
{
    //
    function addcustomer(Request $req)
    {
        $user=new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone_no=$req->phno;
        $user->password=Hash::make($req->password);
        $user->status=1;
        $user->is_admin=0;
        $user->save();
        return redirect('Admin/admincustomer');
    }

    function editcustomer(Request $req)
    {
      
        $user= User::where('id',$req->uid)->first();
        $user->name=$req->uname;
        $user->email=$req->uemail;
        $user->phone_no=$req->uphno;
        $user->status=$req->status;
        $user->save();
        
        return redirect('Admin/admincustomer');
    }

    function deletecustomer(Request $req)
    {
      

        $user= User::where('id',$req->did)->first();
        $user->delete();
        return redirect('Admin/admincustomer');
    }

    public function changeUserStatus(Request $request)
    {
        $user = User::find($request->customer_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'User status change successfully.']);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class changepasswordcontroller extends Controller
{
    //
    function changepassword(Request $req)
    {
         $validated = $req->validate([
            'opass' => 'required',
            'npass' => 'required',
            'passconf' => 'required',
        ]);
        $user=User::where('id',$req->uid)->first();
        if($user && Hash::check($req->opass,$user->password) && $req->npass == $req->passconf && $validated)
        {
            $user->password=Hash::make($req->npass);
            $user->save();
            return redirect('customerhome');
        }
        else{
            return redirect()->back();
        }
    }
    function adminchangepassword(Request $req)
    {
        $validated = $req->validate([
            'opass' => 'required',
            'npass' => 'required',
            'passconf' => 'required',
        ]);
        $user=User::where('id',$req->uid)->first();
        if($user && Hash::check($req->opass,$user->password) && $req->npass == $req->passconf && $validated)
        {
            $user->password=Hash::make($req->npass);
            $user->save();
            return redirect('Admin/adminhome');
        }
        else{
            return redirect()->back();
        }
    }
}

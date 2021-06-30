<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\passwordreset;

use Illuminate\Http\Request;

class resetpasswordcontroller extends Controller
{
    function resetshow($token)
    {
       $last=passwordreset::latest()->first();
       $t=$last->token;
        $user =passwordreset::where('token',$token)->first();
        
   if($token == $t )
   {
        return view('resetpassword',compact('user'));
   }
   else
   {
       return "it is not last token";
   }
}

    function resetpassword (Request $req)
    {
        $user =User::where('email',$req->email)->first();
        DB::table('passwordresets')->where('email', '=', $req->email)->delete();
        if($req->npass == $req->cpass)
        {
            $user->password=Hash::make($req->npass);
            $user->save();
            return redirect('login');
        }
        
    }
}

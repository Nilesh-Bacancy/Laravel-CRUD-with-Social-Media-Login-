<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeuser;


class registrationcontroller extends Controller
{
    //
    function register(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone_no' => 'required',
        ]);
        if($validated)
        {
        $user=new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone_no=$req->phone_no;
        $user->password=Hash::make($req->password);
        $user->status=1;
        $user->is_admin=0;
        $user->image="n.jpg";
        $user->save();
     //   this code is for welcome email to user
// // parthdpatel2804@gmail.com
//         $useremail = $req->email;
//         Mail::to($useremail)->send(new welcomeuser($user));
        return redirect('login');
        }
    }

    
}

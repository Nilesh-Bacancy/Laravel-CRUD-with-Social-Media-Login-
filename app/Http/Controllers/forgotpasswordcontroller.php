<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\passwordreset;
class forgotpasswordcontroller extends Controller
{
    //
    function forgotpassword(Request $req)
    {
        $varify=User::where('email',$req->email)->count();
        $varifypass=passwordreset::where('email',$req->email)->count();

        $validated = $req->validate([
            'email' => 'required|email',
        ]);
        
        if($validated && $varify == 1 )
        {
//Create Password Reset Token
DB::table('passwordresets')->insert([
    'email' => $req->email,
    'token' => Str::random(60),
    'created_at' => now()
]);

//Get the token just created above
$user=User::where('email',$req->email)->first();
$tokendata =passwordreset::latest()->where('email', $req->email)->first();
$token=$tokendata->token;

            $to_name=$user->name;
            $to_email=$req->email;
            $data=array("name"=>"Click below link:","body"=>"http://localhost:8000/resetpassword/". $token);
            Mail::send('mail',$data,function($message) use ($to_name,$to_email)
            {
                $message->to($to_email)->subject('Forget Password Link');
            });
            return redirect('login');
        }
        else{
              return redirect()->back()->withErrors(['email' => trans('User does not exist')]);

        }
    }
}

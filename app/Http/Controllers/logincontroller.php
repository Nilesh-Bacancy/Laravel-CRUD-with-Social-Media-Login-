<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Lang;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;


class logincontroller extends Controller
{
    public function redirectTo($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
       $name=$user->getName();
       $email=$user->getEmail();

     
      $existuser= User::where("email",$email)->first();
      if($existuser && $existuser->status == 1 && $existuser->is_admin == 0)
      {
         Auth::login($existuser);
         session()->put('customer',$existuser);
         return redirect('customerhome');
      }
      else if($existuser && $existuser->status == 1 && $existuser->is_admin == 1)
      {
         Auth::login($existuser);
         session()->put('admin',$existuser);
         return redirect('Admin/adminhome');
      }
      else if($existuser && $existuser->status == 0 && $existuser->is_admin == 0)
      {
        return redirect()->back()->withErrors('This User Is Inactived By Admin');
      }
      else {
      
          $newuser = new User();
          $newuser->name = $name;
          $newuser->email = $email;
          $newuser->password = bcrypt('nil123');
          $newuser->phone_no = rand(1000000000,9999999999);
          $newuser->status = 1;
          $newuser->is_admin = 0;
          $newuser->image="n.jpg";
          $newuser->save();

          Auth::login($newuser);
          session()->put('customer',$newuser);
          return redirect('customerhome');
      }
    }

    public function login(Request $req)
    {
      $validated = $req->validate([
        'email' => 'required',
        'password' => 'required',
       
    ]);
  
    if($validated)
    {
       $user = User::where(['email'=>$req->email])->first();
      
       if($user && Hash::check($req->password,$user->password) && $user->status == 1 && $user->is_admin == 1)
       {
         $req->session()->put('admin',$user);
          return redirect('Admin/adminhome');
       }
       else if($user && Hash::check($req->password,$user->password) && $user->status == 1 && $user->is_admin == 0)
       {
           $req->session()->put('customer',$user);
           return redirect('customerhome');
       }
       else{
           return redirect()->back();
       }
    }
    else{
      return "Error";
  }
  
  }
}

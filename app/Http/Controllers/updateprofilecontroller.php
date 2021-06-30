<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class updateprofilecontroller extends Controller
{
    function adminupdateprofile(Request $req)
    {
        $validated = $req->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone_no' => 'required',
            'status' => 'required',
        ]);
        if($validated)
        {
        $user= User::where('id',$req->id)->first();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone_no=$req->phone_no;
        $user->status=$req->status;
        if($req->hasfile('image'))
        {
            $file=$req->file('image');
            $img_name=$req->file('image')->getClientOriginalName();
            $file->move('uploads/profilepicture/',$img_name);
            if($user->image != "n.jpg")
             {
            unlink('uploads/profilepicture/'.$user->image);
            }
            $user->image=$img_name;
       }
     $user->save();
     return redirect('Admin/adminhome');
    }
  
}
function getdata($id)
{
    $data=User::where('id',$id)->first();
    return view('updateprofile',['data'=>$data]);
}
function updateprofile(Request $req)
{
    $validated = $req->validate([
        'email' => 'required|email',
        'name' => 'required',
        'phone_no' => 'required',
        'status' => 'required',
       
    ]);
    if($validated)
    {
    $user= User::where('id',$req->id)->first();
    
    $user->name=$req->name;
    $user->email=$req->email;
    $user->phone_no=$req->phone_no;
    $user->status=$req->status;
    if($req->hasfile('userimage'))
    {
        $file=$req->file('userimage');
        $img_name=$req->file('userimage')->getClientOriginalName();
        $file->move('uploads/profilepicture/',$img_name);
        if($user->image != "n.jpg")
        {
            unlink('uploads/profilepicture/'.$user->image);
        }
        $user->image=$img_name;
   }
    $user->save();
 return redirect('customerhome');
}

}

}

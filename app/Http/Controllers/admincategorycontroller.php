<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class admincategorycontroller extends Controller
{
    //
    function addcategory(Request $req)
    {
      
        $category=new category;
        $category->name=$req->name;
        $category->save();
        return redirect('Admin/admincategory');
    }

    function editcategory(Request $req)
    {
        $category= category::where('id',$req->uid)->first();
        $category->name=$req->uname;
        $category->save();
        return redirect('Admin/admincategory');
    }

    function deletecategory(Request $req)
    {
        $category= category::where('id',$req->did)->first();
        $category->delete();
        return redirect('Admin/admincategory');
    }
}

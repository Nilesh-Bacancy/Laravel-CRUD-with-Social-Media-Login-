<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Storage;

class adminproductcontroller extends Controller
{
    //
    function addproduct(Request $req)
    {
        
        $product=new product;
        $product->name=$req->name;
        $product->model=$req->model;
        $product->quantity=$req->quantity;
        $product->category_id=$req->catid;

        if($req->hasfile('image'))
        {
            $file=$req->file('image');
            $img_name=$req->file('image')->getClientOriginalName();
            $file->move('uploads/productimg/',$img_name);
            $product->image=$img_name;
        }
       
        $product->save();
    
        return redirect('Admin/adminproduct');
    }

    function editproduct(Request $req)
    {
        $product= product::where('id',$req->uid)->first();
        $product->name=$req->uname;
        $product->model=$req->umodel;
        $product->quantity=$req->uquantity;
        $product->category_id=$req->ucatid;
        if($req->hasfile('uimage'))
        {
            $ufile=$req->file('uimage');
            $uimg_name=$req->file('uimage')->getClientOriginalName();
            $ufile->move('uploads/productimg/',$uimg_name);
            unlink('uploads/productimg/'.$product->image);
            $product->image=$uimg_name;
        }
        $product->save();
        return redirect('Admin/adminproduct');
    }

    function deleteproduct(Request $req)
    {
        $product= product::where('id',$req->did)->first();
        unlink('uploads/productimg/'.$product->image);
        $product->delete();
        return redirect('Admin/adminproduct');
    }
}

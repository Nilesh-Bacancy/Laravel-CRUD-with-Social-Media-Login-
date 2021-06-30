<?php
use App\Http\Controllers\productcontroller;
$data=productcontroller::getcomment($product['id']);
?>
@extends('header')

@section('css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<style>
img.detailimg{
    height:200px;
}
.pd{
  margin-top:5px;
 
}

</style>
@endsection
@push('jsfile')
<script>
$(document).ready( function () {
  $('#showcom').on('show.bs.modal',function(event)
    {
      var button=$(event.relatedTarget)
      // var uid=button.data('uid')
      // var pid=button.data('pid')
      var comment=button.data('com')
   
      
      var modal=$(this)

    
      modal.find('.modal-body #ucomment').val(comment);
     
    });
  } );
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


@endpush
@section('content')
<!-- Modal For Add Comment -->
<div class="modal fade" id="addcom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/pd" method="post" id="addcomment">
      <div class="modal-body">
          @csrf  
          <div class="form-group">
            <label for="comment" class="form-label">Add Comment</label>
              <textarea name="comment" id="comment" rows="5" cols="50" ></textarea>           
            </div>
             <input type="hidden" name="uid" id="uid" value=" {{Session::get('customer')['id']}}">
                       
             <input type="hidden" name="pid" id="pid" value=" {{$product['id']}}">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Comment </button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal For Add Comment -->
<div class="modal fade" id="showcom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/pd" method="post" id="addcomment">
      <div class="modal-body">
          @csrf  
          <div class="form-group">
            <label for="ucomment" class="form-label">Add Comment</label>
              <textarea name="ucomment" id="ucomment" rows="5" cols="50" readonly></textarea>    
            </div>
             <input type="hidden" name="uuid" id="uuid" value=" {{Session::get('customer')['id']}}">
             <input type="hidden" name="upid" id="upid" value=" {{$product['id']}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" disabled>Add Comment </button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="container pd">
<div class="row">
<div class="col-sm-6">
<img class="detailimg" src="{{asset('/uploads/productimg/'.$product['image'])}}" alert="{{$product['image']}}">
</div>
<div class="col-sm-6">
<h1>Product Details</h1>
<h2>Name:-{{$product['name']}}</h2>
<h3>Model:-{{$product['model']}}</h3>
<h4>Quantity:-{{$product['quantity']}}</h4>
<a href="/">Go Back</a>
@if($data)
<button type="button" class="button btn-primary" data-toggle="modal" data-com="{{$data['comment_desc']}}" data-target="#showcom">Comment</botton>
@else
<button type="button" class="button btn-primary" data-toggle="modal"  data-target="#addcom">Comment</botton>
@endif

</div>
</div>
</div>

@endsection
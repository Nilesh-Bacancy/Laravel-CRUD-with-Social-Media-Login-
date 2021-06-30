
<?php
use App\Http\Controllers\admincontroller;
$data=admincontroller::getadmin(Session::get('admin')['id']);
?>

@extends('Admin\adminheader')


@push('jsfile')

<script>

function readURL(input) {

	if (input.files && input.files[0]) {
		  var reader = new FileReader();
		  reader.onload = function (e) {
			$('#upload_image').show();	 
			 $('#upload_image').attr('src', e.target.result);
		  }
		  reader.readAsDataURL(input.files[0]);
	}
 }

</script>
@endpush
@section('content')

<div class="container lr-container" style="margin-left:27%;">
            <div class="row">
                <div class="col-md-6 lr-form">
                    <h3>Update Profile</h3>
                    <form action="adminupdateprofile" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <input type="hidden" name="id"  id="id" value="{{$data['id']}}" />
                        <div class="form-group">
                        <img class="rounded-circle" id="upload_image" width="100px" height="100px" src="{{asset('/uploads/profilepicture/'.$data['image'])}}" />
                        <input type="file" name="image"  id="image" class="form-control-file" onchange='readURL(this);'  />
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" id="name" value="{{$data['name']}}" />
                       <span style="color:red">@error('name') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="email_id" class="form-label">Email address</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" id="email_id"  value="{{$data['email']}}" />
                            <span style="color:red">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="phno" class="form-label">Phone No</label>
                            <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Your Phone No" id="phno"  value="{{$data['phone_no']}}" />
                            <span style="color:red">@error('phone_no') {{$message}} @enderror</span>
                        </div>
                      
                        <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Your Status" id="status"  value="{{$data['status']}}" />
                            <span style="color:red">@error('status') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnsubmit" value="Update" />
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
@endsection









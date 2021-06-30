@extends('Admin\adminheader')


@section("content")


<div class="container lr-container" style="margin-left:27%;">
            <div class="row">
                <div class="col-md-6 lr-form">
                    <h3>Change password</h3>
                    <form action="adminchangepassword" method="post">
                        @csrf
                        <input type="hidden" name="uid"  id="uid" value="{{Session::get('admin')['id']}}" />
                        <div class="form-group">
                            <label for="opass" class="form-label">Old Password</label>
                            <input type="password" name="opass" class="form-control" placeholder="Your Old Password" id="opass" />
                            <span style="color:red">@error('opass') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="npass" class="form-label">New Password</label>
                            <input type="password" name="npass" class="form-control" placeholder="Your New Password" id="npass" />
                            <span style="color:red">@error('npass') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="passconf" class="form-label">Conform Password</label>
                            <input type="password" name="passconf" class="form-control" placeholder="Your Conform Password" id="passconf" />
                            <span style="color:red">@error('passconf') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnsubmit" value="Submit" />
                        </div>
                        <div class="form-group">
                          <a href="login" class="olduser">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection
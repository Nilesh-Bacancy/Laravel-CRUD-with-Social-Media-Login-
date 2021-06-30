@extends('master')

@section("content")


<div class="container lr-container" style="margin-left:27%;">
            <div class="row">
                <div class="col-md-6 lr-form">
                    <h3>Registration Form </h3>
                    <form action="register" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" id="name" />
                            <span style="color:red">@error('name') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="email_id" class="form-label">Email address</label>
                            <input type="text" name="email" class="form-control" placeholder="Your Email" id="email_id" />
                            <span style="color:red">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_no" class="form-label">Phone No</label>
                            <input type="text" name="phone_no" class="form-control" placeholder="Your Phone No" id="phone_no" />
                            <span style="color:red">@error('phone_no') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="inputpass" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Your Password" id="inputpass" />
                            <span style="color:red">@error('password') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnsubmit" value="Sign UP" />
                        </div>
                        <div class="form-group">
                          <a href="login" class="olduser">Already have an Account? Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection

@extends('master')

@section("content")


<div class="container lr-container" style="margin-left:27%;">
            <div class="row">
                <div class="col-md-6 lr-form">
                    <h3>Reset password</h3>
                    <form action="/rp" method="post">
                      
                        @csrf
                        <div class="form-group">
                            <label for="email_id" class="form-label">Email address</label>
                            <input type="text" name="email" class="form-control" placeholder="Your Email" id="email_id" value="{{$user['email']}}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="npass" class="form-label">New Password</label>
                            <input type="password" name="npass" class="form-control" placeholder="Enter New Password" id="npass"  />
                        </div>
                        <div class="form-group">
                            <label for="cpass" class="form-label">Confirm Password</label>
                            <input type="password" name="cpass" class="form-control" placeholder="Enter Confirm Password" id="cpass" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnsubmit" value="Submit" />
                        </div>
                        <div class="form-group">
                          <a href="login" class="olduser">Sign In</a>
                        </div>
                        <input type="hidden" name="token" id="token" value="{{$user['token']}}" /> 
                    </form>
                </div>
            </div>
        </div>
        @endsection

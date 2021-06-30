@extends('master')

@section("content")


<div class="container lr-container" style="margin-left:27%;">
            <div class="row">
                <div class="col-md-6 lr-form">
                    <h3>Forgot password</h3>
                    <form action="forgotpassword" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email_id" class="form-label">Email address</label>
                            <input type="text" name="email" class="form-control" placeholder="Your Email" id="email_id" />
                            <span style="color:red">@error('email') {{$message}} @enderror</span>
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

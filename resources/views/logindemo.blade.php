
@extends('master')

@section("content")

 <div class="container lr-container" style="margin-left:27%;">
@if($errors->any())
<span style="color:red">{{$errors->first()}}</span>
@endif
            <div class="row">
           
                <div class="col-md-6 lr-form">
              
                    <h3>Login Form </h3>
                
                    <form action="login" method="post">
                   
                        @csrf
                        <div class="form-group">
                            <label for="email" class="form-label">Email address</label>
                            <input type="text"  name="email" class="form-control " placeholder="Your Email" id="email" />
                          <span style="color:red">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group"> 
                         <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Your Password" id="password" />
                            <span style="color:red">@error('password') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnsubmit" value="Sign In" />
                        </div>
                        </form>
                        <div class="form-group">
                            <a href="forgotpassword" class="ForgetPwd">Forget Password?</a>
                        </div>
                        <div class="form-group">
                          <a href="register" class="NewUser"> New User? Create an Account</a>
                        </div>
                    </form>
                    <div class="social">
                    <button type="button" class="btn btn-danger" style="margin-left:50px;">   <a href="{{ url ('/google') }}" style="text-decoration:none;color:black" ><b>Continue With Google </b></a>   </button> 
                    <button type="button" class="btn btn-success" style="margin-left:50px;">  <a href="{{ url ('/github') }}" style="text-decoration:none;color:black" ><b>Continue With Github</b></a>   </button> 
                    </div>
                </div>
            </div>
        </div>
        @endsection

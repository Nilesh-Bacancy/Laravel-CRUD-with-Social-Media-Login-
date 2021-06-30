

@extends('master')


@section('header')

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
  <div class="container-fluid" >
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01"   >
      
      <ul class="navbar-nav me-auto mb-2 mb-md-0"  >
      <li class="nav-item">
          <a class="nav-link" href="{{ url('customerhome') }}">Home</a>
        </li>
      <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{Session::get('customer')['name']}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/updateprofile/{{Session::get('customer')['id']}}">Update Profile</a></li>
            <li><a class="dropdown-item" href="/changepassword">Change Password</a></li>
            <li><a class="dropdown-item" href="/logoutcustomer">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <form class="form-inline my-2 my-lg-0" action="/productsearch" >
   
    <ul class="navbar-nav me-auto mb-2 mb-md-0"  >
      <li class="nav-item">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
     </li>
     <button class="btn btn-outline-success" type="submit">Search</button>
      <li class="nav-item">
      </ul>
    </form>
  </div>

</nav>
@endsection









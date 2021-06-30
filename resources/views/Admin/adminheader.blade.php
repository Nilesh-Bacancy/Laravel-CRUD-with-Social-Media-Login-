

@extends('Admin\adminmaster')


@section('header')




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('Admin/adminhome') }}">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="{{ url('Admin/admincustomer') }}">Manage Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('Admin/admincategory') }}">Manage Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('Admin/adminproduct') }}">Manage Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('Admin/admincomment') }}">Manage Comments</a>
        </li>
       
       
      </ul>
      
    
      <ul class="navbar-nav ">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{Session::get('admin')['name']}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ url('Admin/adminupdateprofile') }}">Update Profile</a></li>
            <li><a class="dropdown-item" href="{{ url('Admin/adminchangepassword') }}">Change Password</a></li>
            <li><a class="dropdown-item" href="/logoutadmin">Logout</a></li>
          </ul>
        </li>
        </ul>
    </div>
  </div>

</nav>
@endsection









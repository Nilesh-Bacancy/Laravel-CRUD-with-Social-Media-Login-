@extends('Admin\adminheader')

@section('content')
<h1> Body Of Contennt</h1>
<div class="row align-items-start">
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-primary o-hidden h-100  ">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>              
            </div>
            <h5>  Total Customers: {{$customer}} </h5>
        </div>
        <a class="card-footer text-white clearfix small z-1 " href="{{ url('Admin/admincustomer') }}">
            <span class=" float-left" >View Details</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>              
            </span>           
        </a>          
    </div>
</div>

<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-warning o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>              
            </div>
            <h5> Total Categories: {{$category}} </h5>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{ url('Admin/admincategory') }}">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>              
            </span>           
        </a>          
    </div>
</div>

<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-success o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>              
            </div>
            <h5> Total Products: {{$product}} </h5>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{ url('Admin/adminproduct') }}">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>              
            </span>           
        </a>          
    </div>
</div>

<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-danger o-hidden h-100">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>              
            </div>
            <h5> Total Comments: {{$comment}} </h5>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{ url('Admin/admincomment') }}">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>              
            </span>           
        </a>          
    </div>
</div>

@endsection



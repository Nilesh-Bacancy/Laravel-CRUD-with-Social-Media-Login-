
@extends('header')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
img.sliderimg{
    height:300px !important;
}
.custome-product{
    height:300px;
}
.trandingimg{
  height:100px;
}
.trandingitem{
  float:left;
  width:20%;
}
</style>
@endsection
@push('jsfile')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush
@section('content')
<div class=" custome-product">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
<div class="carousel-inner">
  @foreach($data as $product)
  <div class="item {{$product['id']==28?'active':''}}">
  <a href="productdetail/{{$product['id']}}">
  <img style="width:40%;" class="sliderimg" src="{{asset('/uploads/productimg/'.$product['image'])}}" alt="{{$product['image']}}">
  <div class="carousel-caption" style="background-color:rgb(128,128,128,0.6);width:60%;">
    <h5>{{$product['name']}}</h5>
    <p>{{$product['model']}}</p>
  </div>
  </a>
  </div>
  @endforeach
</div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
<div class="tranding-product">
<h3>All Products</h3>
@foreach($data as $product)
  <div class="trandingitem">
  <a href="productdetail/{{$product['id']}}">
  <img class="trandingimg"  src="{{asset('/uploads/productimg/'.$product['image'])}}" alt="{{$product['image']}}">
  <div class="" >
    <h5>{{$product['name']}}</h5>
    <p>{{$product['model']}}</p>
  </div>
  </a>
  </div>
  @endforeach
</div>

@endsection

@extends('header')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>

.searchimg{
  height:100px;
  
}
.searchitem{
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

<div class="search-product">
<h3>Reasult Of Searching Products</h3>
@foreach($data as $product)
  <div class="searchitem">
  <a href="productdetail/{{$product['id']}}">
  <img class="searchimg"  src="{{asset('/uploads/productimg/'.$product['image'])}}" alt="{{$product['image']}}">
  <div class="" >
    <h5>{{$product['name']}}</h5>
    <p>{{$product['model']}}</p>
  </div>
  </a>
  </div>
  @endforeach
</div>

@endsection
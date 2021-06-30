@extends('Admin\adminheader')
@section('css')
<link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet"> 
@endsection
@push('jsfile')
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
<script>
$(document).ready( function () {
  $('#add').validate({ 
        rules: {
            name: {
                required: true
            },
            model: {
                required: true
            },
            image: {
                required: true,  
            },
            quantity: {
                required: true,
            },
        },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
    });
     $('#tb1').DataTable();
    
    $('#editpro').on('show.bs.modal',function(event)
    {
      var button=$(event.relatedTarget)
      var id=button.data('idus')
      var name=button.data('nameus')
      var quantity=button.data('qunus')
      var model=button.data('modelus')
      var cat=button.data('catus')
      var img=button.data('imageus')
      
      var modal=$(this)

      modal.find('.modal-body #uid').val(id);
      modal.find('.modal-body #uname').val(name);
      modal.find('.modal-body #umodel').val(model);
      modal.find('.modal-body #uquantity').val(quantity);
      modal.find('.modal-body #ucatid').val(cat);
      
      modal.find('.modal-body #uprevimg').attr('src',img);
    });

    $('#deletepro').on('show.bs.modal',function(event)
    {
      var button1=$(event.relatedTarget)
      var id=button1.data('idd')
     
      var modal=$(this)

      modal.find('.modal-body #did').val(id);
    
    });
    
 } );

function readURL(input) {
	if (input.files && input.files[0]) {
		  var reader = new FileReader();

		  reader.onload = function (e) {
			$('#uprevimg').show();	 
     
			 $('#uprevimg').attr('srcset', e.target.result);
		  }
     

		  reader.readAsDataURL(input.files[0]);

	}
 }
 function readURL1(input) {
	if (input.files && input.files[0]) {
		  var reader = new FileReader();

		  reader.onload = function (e) {
		 
      $('#previmg').show();
		
  $('#previmg').attr('src', e.target.result);
		  }

		  reader.readAsDataURL(input.files[0]);
	}
 }
</script>
@endpush
@section('content')
    
    <div class="container">
    <h3> Product Details </h3>
   
<div class="col-xl-3">
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addpro">
  Add Products
</button>
</div>
</div>

</div>

<!-- Modal For Add Product -->
<div class="modal fade" id="addpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="adminproductadd" method="post" enctype="multipart/form-data" id="add">
        <div class="modal-body">
            <div class="container">
                   @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Product Name" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" name="model" class="form-control" placeholder="Product Model" id="model" />
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Product Quantity" id="quantity" />
                        </div>
                        <div class="form-group">
                          <label for="dropdowncategory">Select Category</label>
                          <select class="form-control" name="catid" id="dropdowncategory">
                            @foreach($cat as $category)
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                          </select>
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Select Product Image</label>
                          <input type="file" name="image" id="image" class="form-control-file" id="exampleFormControlFile1" onchange='readURL1(this);' />
                          <img id="previmg" width="100px" height="100px" />
                        </div>

                       
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal For Update Category -->
<div class="modal fade" id="editpro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="adminproductedit" method="post" id="update"  enctype="multipart/form-data">
      <div class="modal-body">
            
            
             <div class="container">
               
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="uname" id="uname" class="form-control" placeholder="Product Name" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" name="umodel" id="umodel" class="form-control" placeholder="Product Model" id="model" />
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="uquantity" id="uquantity" class="form-control" placeholder="Product Quantity" id="quantity" />
                        </div>
                        <div class="form-group">
                          <label for="dropdowncategory">Select Category</label>
                          <select class="form-control" name="ucatid" id="ucatid">
                            @foreach($cat as $category)
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                          </select>
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Select Product Image</label>
                          <input type="file" name="uimage" id="uimage" class="form-control-file" id="exampleFormControlFile1" onchange='readURL(this);' />
                          <img id="uprevimg" width="100px" height="100px" />
                        </div>

                        <input type="hidden" name="uid" id="uid">
                   
                </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal For Delete Product -->
<div class="modal fade" id="deletepro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="adminproductdelete" method="post" id="delete">
      <div class="modal-body">
          @csrf  
            <p>Are You Sure? You Want To Delete This Product...</p>
           
                        <input type="hidden" name="did" id="did">
                       
               
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete Data</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="container">
<table class="table" id="tb1">
  <caption>List of Categories</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Model</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category Name</th>
      <th scope="col">Image</th>
      <th scope="col">Actions</th>
     
    </tr>
  </thead>
  <tbody>

  @foreach($pro as $product)
    <tr>
      <th scope="row">{{$product['id']}}</th>
      <td>{{$product['name']}}</td>
      <td>{{$product['model']}}</td>
      <td>{{$product['quantity']}}</td>
      <td>{{$product->category->name}}</td>
      <td><image src="{{asset('/uploads/productimg/'.$product['image'])}}" width="100px" height="100px"></img></td>
      <td>
      <button type="button" class="btn btn-success" data-toggle="modal" data-idus="{{$product['id']}}"  data-nameus="{{$product['name']}}" data-modelus="{{$product['model']}}" data-qunus="{{$product['quantity']}}" data-catus="{{$product['category_id']}}" data-imageus="{{asset('/uploads/productimg/'.$product['image'])}}"    data-target="#editpro">Edit</button> 
      <button type="button" class="btn btn-danger" data-toggle="modal" data-idd="{{$product['id']}}"  data-target="#deletepro">Delete</button> 
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

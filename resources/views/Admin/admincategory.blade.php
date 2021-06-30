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
    // $('#tb').change(function(){
    //     alert('Are you sure to Deactive This Customer?');
    // });
    $('#editcat').on('show.bs.modal',function(event)
    {
      var button=$(event.relatedTarget)
      var id=button.data('idus')
      var name=button.data('nameus')
      
      var modal=$(this)

      modal.find('.modal-body #uid').val(id);
      modal.find('.modal-body #uname').val(name);
      
    });

    $('#deletecat').on('show.bs.modal',function(event)
    {
      var button1=$(event.relatedTarget)
      var id=button1.data('idd')
     
      var modal=$(this)

      modal.find('.modal-body #did').val(id);
    
    });
} );

</script>
@endpush
@section('content')
    
    <div class="container">
    <h3> Category Details </h3>
   
<div class="col-xl-3">
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcat">
  Add Categories
</button>
</div>
</div>

</div>

<!-- Modal For Add Category -->
<div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admincategoryadd" method="post" id="add">
        <div class="modal-body">
            <div class="container">
                   @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Category Name" id="name" />
                            <!-- <span style="color:red">@error('name') {{$message}} @enderror</span> -->
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
<div class="modal fade" id="editcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admincategoryedit" method="post" id="update">
      <div class="modal-body">
            
            
             <div class="container">
               
                        @csrf
                        <div class="form-group">
                            <label for="uname" class="form-label">Name</label>
                            <input type="text" name="uname" id="uname" class="form-control" placeholder="Category Name" id="uname" />
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

<!-- Modal For Delete Category -->
<div class="modal fade" id="deletecat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admincategorydelete" method="post" id="delete">
      <div class="modal-body">
          @csrf  
            <p>Are You Sure? You Want To Delete This Category...</p>
           
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
      <th scope="col">Actions</th>
     
    </tr>
  </thead>
  <tbody>

  @foreach($cat as $category)
    <tr>
      <th scope="row">{{$category['id']}}</th>
      <td>{{$category['name']}}</td>
      <td>
      <button type="button" class="btn btn-success" data-toggle="modal" data-idus="{{$category['id']}}" data-nameus="{{$category['name']}}" data-target="#editcat">Edit</button> 
      <button type="button" class="btn btn-danger" data-toggle="modal" data-idd="{{$category['id']}}"  data-target="#deletecat">Delete</button> 
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

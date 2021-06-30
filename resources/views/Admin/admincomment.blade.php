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
 
     $('#tb1').DataTable();
     $('#deletecom').on('show.bs.modal',function(event)
    {
      var button1=$(event.relatedTarget)
      var id=button1.data('idd')
      var modal=$(this)
      modal.find('.modal-body #did').val(id);
    
    });
});

</script>
@endpush
@section('content')
    
  <!-- Modal For Delete Comment -->
<div class="modal fade" id="deletecom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admincommentdelete" method="post" id="delete">
      <div class="modal-body">
          @csrf  
            <p>Are You Sure? You Want To Delete This Comment...</p>
           
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
<h3> Comment Details </h3>
<table class="table" id="tb1">
  <caption>List of Comments</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">User Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Comment</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>

  @foreach($comment as $com)
    <tr>
      <th scope="row">{{$com->id}}</th>
      <td>{{$com->name}}</td>
      <td>{{$com->pname}}</td>
      <td>{{$com->comment_desc}}</td>
      <td>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-idd="{{$com->id}}"  data-target="#deletecom">Delete</button> 
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>


@endsection
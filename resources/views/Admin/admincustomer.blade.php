@extends('Admin\adminheader')
@section('css')
<link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet"> 
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@push('jsfile')
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  
<script>
$(document).ready( function () {

  $('#add').validate({ 
        rules: {
            name: {
                required: true
            },
            password: {
                required: true
            },
            email: {
                required: true,
                email:true,
                
            },
            phno: {
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
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var customer_id = $(this).data('id'); 
      
          
            $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'customer_id': customer_id},
            success: function(data){
              console.log(data.success)
              location.reload();
            }
        });
         
        
    
        
    });
    $('#editcust').on('show.bs.modal',function(event)
    {
      var button=$(event.relatedTarget)
      var id=button.data('idus')
      var name=button.data('nameus')
      var email=button.data('emailus')
      var phno=button.data('phnous')
      var status=button.data('statusus')
     
     
      var modal=$(this)

      modal.find('.modal-body #uid').val(id);
      modal.find('.modal-body #uname').val(name);
      modal.find('.modal-body #uemail').val(email);
      modal.find('.modal-body #uphno').val(phno);
      modal.find('.modal-body #status').val(status);
    });

    $('#deletecust').on('show.bs.modal',function(event)
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
    <h3> Customers Details </h3>
    <div class="row align-items-center">
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-primary o-hidden h-100  ">
        <div class="card-body">
            <div class="card-body-icon">
                <i class="fa fa-fw fa-star"></i>              
            </div>
            <h5>  Active Customers: {{$active}} </h5>
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
            <h5> Inactive Customers: {{$inactive}} </h5>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="{{ url('Admin/admincustomer') }}">
            <span class="float-left">View Details</span>
            <span class="float-right">
                <i class="fa fa-angle-right"></i>              
            </span>           
        </a>          
    </div> 
</div>

<div class="col-xl-3">
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcust">
  Add Customers
</button>
</div>
</div>

</div>

<!-- Modal For Add Customer -->
<div class="modal fade" id="addcust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admincustomeradd" method="post" id="add">
        <div class="modal-body">
            <div class="container">
                   @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Your Name" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="email_id" class="form-label">Email address</label>
                            <input type="text" name="email" class="form-control" placeholder="Your Email" id="email_id" />
                        </div>
                        <div class="form-group">
                            <label for="phno" class="form-label">Phone No</label>
                            <input type="number" name="phno" class="form-control" placeholder="Your Phone No" id="phno" />
                        </div>
                        <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Your Password" id="password" />
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

<!-- Modal For Update Customer -->
<div class="modal fade" id="editcust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Customers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admincustomeredit" method="post" id="update">
      <div class="modal-body">
            
            
             <div class="container">
               
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="uname" id="uname" class="form-control" placeholder="Your Name" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="email_id" class="form-label">Email address</label>
                            <input type="text" name="uemail" id="uemail" class="form-control" placeholder="Your Email" id="email_id" />
                        </div>
                        <div class="form-group">
                            <label for="phno" class="form-label">Phone No</label>
                            <input type="text" name="uphno" id="uphno" class="form-control" placeholder="Your Phone No" id="phno" />
                        </div>
                      
                        <div class="form-group">
                        <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Your Status" id="status" />
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

<!-- Modal For Delete Customer -->
<div class="modal fade" id="deletecust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Customers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admincustomerdelete" method="post" id="delete">
      <div class="modal-body">
          @csrf  
            <p>Are You Sure? You Want To Delete This Customer...</p>
           
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
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone_no</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
     
    </tr>
  </thead>
  <tbody>

  @foreach($alluser as $customer)
    <tr>
      <th scope="row">{{$customer['id']}}</th>
      <td>{{$customer['name']}}</td>
      <td>{{$customer['email']}}</td>
      <td>{{$customer['phone_no']}}</td>
      
      <td>
      <input data-id="{{$customer['id']}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $customer['status'] ? 'checked' : '' }}>
                    
      </td>
      <td>
      <button type="button" class="btn btn-success" data-toggle="modal" data-idus="{{$customer['id']}}" data-nameus="{{$customer['name']}}" data-emailus="{{$customer['email']}}" data-phnous="{{$customer['phone_no']}}"   data-statusus="{{$customer['status']}}" data-target="#editcust">Edit</button> 
      <button type="button" class="btn btn-danger" data-toggle="modal" data-idd="{{$customer['id']}}"  data-target="#deletecust">Delete</button> 
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
</div>
@endsection

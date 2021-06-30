<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin </title>
    <style>
.lr-container{
    margin-top: 5%;
    margin-bottom: 5%;
  
}
.lr-form{
    padding: 5%;
    
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.lr-form h3{
    text-align: center;
    color: #333;
}

.lr-container form{
    padding: 10%;
}

.lr-form .btnsubmit{
    font-weight: 600;
    margin-top:5px;
    margin-left:25%;
    width: 60%;
    border-radius: 1rem;
    padding: 1%;
     border: none;
    cursor: pointer;
    background-color: #0062cc;
} 

.lr-form .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    margin-left:40%;
    text-decoration: none;
  
}
.lr-form .NewUser{
    color: #0062cc;
    font-weight: 600;
    margin-left:30%;
    text-decoration: none;
  
}
.lr-form .olduser{
    color: #0062cc;
    font-weight: 600;
    margin-left:27%;
    text-decoration: none;
  
}


      </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@yield('css')
@stack('jsfile')
</head>
<body>
    @yield('header')
    @yield('content')
</body>

</html>
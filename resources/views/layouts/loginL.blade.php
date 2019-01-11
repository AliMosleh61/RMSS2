<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Laravel css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('app.css')}}" />
    <!-- BootStrap css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}" />
    <!-- BootStrap theme css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap-theme.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap-theme.min.css')}}" />
    <!-- BootStrap rtl css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap-rtl.min.css')}}" />
    <!-- Custome css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/Custome.css')}}" />
   

    
</head>


<body>
<nav class="navbar navbar-default navbar-static-top ">
      <div class="container">
      
        <div class="navbar-header ">   
        <a href="/"  class="navbar-brand ">نظام ادارة المتاجر </a>       
        </div>

      </div> <!-- /nav-contener End -->
     </nav>

@yield('content')



 <script src="{{asset('js/app.js')}}"></script> 
 <script src="{{asset('js/bootstrap.min.js')}}"></script> 
 <script src="{{asset('js/jquery.min.js')}}"></script> 
</body>
</html>
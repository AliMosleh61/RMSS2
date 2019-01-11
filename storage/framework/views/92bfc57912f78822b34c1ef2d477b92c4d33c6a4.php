<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(config('app.name')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Laravel css -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('app.css')); ?>" />
    <!-- BootStrap css -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
    <!-- BootStrap theme css -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('css/bootstrap-theme.css')); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('css/bootstrap-theme.min.css')); ?>" />
    <!-- BootStrap rtl css -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('css/bootstrap-rtl.min.css')); ?>" />
    <!-- Custome css -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('css/Custome.css')); ?>" />
   

    
</head>


<body>
<nav class="navbar navbar-default navbar-static-top ">
      <div class="container">
      
        <div class="navbar-header ">   
        <a href="/"  class="navbar-brand ">نظام ادارة المتاجر </a>       
        </div>

      </div> <!-- /nav-contener End -->
     </nav>

<?php echo $__env->yieldContent('content'); ?>



 <script src="<?php echo e(asset('js/app.js')); ?>"></script> 
 <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> 
 <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script> 
</body>
</html>
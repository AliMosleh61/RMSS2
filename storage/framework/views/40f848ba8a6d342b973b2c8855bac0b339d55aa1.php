<?php $__env->startSection('content'); ?>


<div class="container">
  <div class="row vertical">
   <div class="col-md-12  ">
    <!--panel-heading-->
        <div class="jumbotron" style="text-align: center;">
            <h1>نظام ادارة المتاجر</h1>
            <?php echo csrf_field(); ?>
         <p><a class="btn btn-info btn-lg" href="/login" role="button"><i class="glyphicon glyphicon-log-in"></i> الدخول الى النظام</a></p>
        </div>
   </div>
   <!-- col-ms-5 -->
  </div>
  <!-- /row-->
 </div>
 <!-- /container -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.loginL', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
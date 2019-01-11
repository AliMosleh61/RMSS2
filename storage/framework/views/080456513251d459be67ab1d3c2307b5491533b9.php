<?php $__env->startSection('content'); ?>


<div class="container">
  <div class="row vertical">
   <div class="col-md-5  col-md-offset-3">
    <div class="panel panel-default">
     <div class="panel-heading">
      <h3 class="panel-title"> تسجيل الدخول </h3>
     </div>
     <!--panel-heading-->
     <div class="panel-body">
		   
		  <?php if($message = Session::get('error')): ?>
			<div class="alert alert-danger alert-block" role="alert">
		  		<button type="button" class="close" data-dismiss="alert">x</button>
				<strong> <?php echo e($message); ?> </strong>
		  	</div>
		  <?php endif; ?>

	         <div class="messages">
     			 <?php if(count($errors) > 0): ?>
					 <div class="alert alert-danger" role="alert">					
						 <ul>
						   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>							
							<li> <?php echo e($error); ?> </li>
						   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </ul>					
					 </div>
				 <?php endif; ?>
     		 </div>
	      <form class="form-horizontal" action="<?php echo e(url('/login/check')); ?>" method="POST" id="LoginForm" auto-compelet="off" >
		   <?php echo e(csrf_field()); ?>

	       <div class="form-group">
	        <label for="username" class="col-sm-3 control-label "> اسم المستخدم </label>
	        <div class="col-sm-9">
	         <div  class="" role="alert" id="nameDiv" ><i id="namemsg"> </i> </div> <!-- validation msg -->
	         <input type="text" name="username" id="username"  class="form-control" placeholder="اسم المستخدم "  maxlength="25">
	        </div>
	       </div>
	       <div class="form-group">
	        <label for="password" class="col-sm-3 control-label "> كلمة المرور :</label>
	        <div class="col-sm-9">
	          <div  class="" role="alert" id="nameDiv" ><i id="pasMsg"> </i> </div> <!-- validation msg -->
	         <input type="password" class="form-control" name="password" id="password"  placeholder="كلمة المرور "  maxlength="25" >
	        </div>
	       </div>
	       <div class="form-group">
	        <div class="col-sm-offset-1 col-sm-8">
	         <button type="submit" id="submitid"  class="btn btn-info"> <i class="glyphicon glyphicon-log-in"></i>    تسجيل الدخول</button>
	        </div>
	       </div>
	      </form>
     </div>
     <!-- /panel-body -->
     <div class="panel-footer" style="text-align: center;">
     	<h4>نظام ادارة المتاجر </h4>
   	 </div>

	


    </div>
    <!-- /panel-info -->
   </div>
   <!-- col-ms-5 -->
  </div>
  <!-- /row-->
 </div>
 <!-- /container -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.loginL', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
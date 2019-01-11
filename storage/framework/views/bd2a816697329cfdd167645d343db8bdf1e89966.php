<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li class="active"><a href="<?php echo e(url('/home')); ?>">الشاشة الرئيسية </a></li>
			     </ol>
			    <div class="panel panel-info">
				    <div class="panel-heading">
				    	<h5 class="panel-title" style="text-align: center;"><i  class="glyphicon glyphicon-list-alt"></i> الشاشة الرئيسية  </h5>
				     </div>
			            <div class="panel-body">
			  
                         </div><!-- /panel-body -->
                        
                        <div class="panel-footer" >
     	                    <div class="row">
                                <div class="col-md-4">
                                    <span> المستخدم الحالي :   <?php echo e(Session::get('username')); ?>  </span>
                                 </div>
                                 <div class="col-md-2">
                                    <span>| نوع المستخدم:   <?php echo e(Session::get('UserType')); ?></span>
                                 </div>
                                 
                                  
                             </div>
   	                    </div><!-- /panel-footer -->

                 </div><!-- /panel-info -->
         </div><!-- /col-md-12 -->

    </div><!-- /row -->

</div><!-- /continer -->





<?php $__env->stopSection(); ?>












<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
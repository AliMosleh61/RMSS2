<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li ><a href="<?php echo e(url('/home')); ?>">الشاشة الرئيسية </a></li>
				 <li ><a href="<?php echo e(url('/userConfiguration')); ?>">ادارة المستخدمين </a></li>
				 <li class="active"> تعديل نوع  </li>
			     </ol>
			    <div class="panel panel-info">
				    <div class="panel-heading">
				    	<h5 class="panel-title"><i class="fas fa-users-cog"></i> </h5>
				     </div>
			            <div class="panel-body">
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

		

                               <form class="form-horizontal" action="<?php echo e(url('/editUserType/edit')); ?>" method="POST" id="submitUserForm" auto-compelet="off" >
									<?php echo e(csrf_field()); ?>

							      	<div class="modal-body">
							      		<div id="createUserMessages" ></div>

								       <div class="form-group">
								        <label for="empname" class="col-sm-3 control-label "> اسم النوع :</label>
								        <div class="col-sm-6">
                                        <input name="invisible" type="hidden" value="<?php if(isset($userType)){echo $userType->id;} else{echo old('invisible');} ?>">
								         <input type="text" name="typeName" id="typeName" class="form-control"   placeholder=" اسم النوع " value="<?php if(isset($userType)){echo $userType->Detail;} else{echo old('typeName');} ?>" >
								        </div>
								       </div>
							       <div class="form-group">
							        <label for="userstatus" class="col-sm-3 control-label "> حالة النوع :</label>
							        <div class="col-sm-6">
							         <select class="form-control" id="typeStatus" name="typeStatus">
							         	
										 <option value="1" <?php if((isset($userType) && $userType->State == 1 ) || old('typeStatus') == 1 ): ?>  selected="selected" <?php endif; ?>> مفعل </option>
                                         <option value="2" <?php if((isset($userType) && $userType->State == 2) || old('typeStatus') == 2): ?> selected="selected" <?php endif; ?> >ملغي </option>

							         </select>
 										
							        </div>
							       </div>
							      </div><!-- /modal-body-->
							      <div class="modal-footer">
							        <a href="<?php echo e(url('/userConfiguration')); ?>" class="btn btn-default" ><i class="glyphicon glyphicon-remove-sign"></i> إلغاء </a>

							        <button type="submit" class="btn btn-success" id="addUserBtn" data-loading-test="يرجى الانتضار ..."><i class="glyphicon glyphicon-plus-sign"></i> تعديل النوع </button>
							      </div>
	    					  </form>
                         </div><!-- /panel-body -->
                        
                        <div class="panel-footer" >
     	                    <div class="row">
                                <div class="col-md-4">
                                    <span> المستخدم الحالي :   <?php echo e(Session::get('username')); ?>  </span>
                                 </div>
                                 <div class="col-md-2">
                                    <span>| نوع المستخدم:   <?php echo e(Session::get('UserType')); ?> </span>
                                 </div> 
                             </div>
   	                    </div><!-- /panel-footer -->

                 </div><!-- /panel-info -->
         </div><!-- /col-md-12 -->

    </div><!-- /row -->

</div><!-- /continer -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
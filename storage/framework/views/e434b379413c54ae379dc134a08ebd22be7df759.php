<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li ><a href="<?php echo e(url('/home')); ?>">الشاشة الرئيسية </a></li>
				 <li ><a href="<?php echo e(url('/usersManagement')); ?>">ادارة المستخدمين </a></li>
				 <li class="active"> تعديل مستخدم  </li>
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

		

                               <form class="form-horizontal" action="<?php echo e(url('/editUser/edit')); ?>" method="POST" id="submitUserForm" auto-compelet="off" >
									<?php echo e(csrf_field()); ?>

							      	<div class="modal-body">
							      		<div id="createUserMessages" ></div>

								       <div class="form-group">
								        <label for="empname" class="col-sm-3 control-label "> اسم الموظف :</label>
								        <div class="col-sm-6">
                                        <input name="invisible" type="hidden" value="<?php if(isset($user)){echo $user->id;} else{echo old('invisible');} ?>">
								         <input type="text" name="empname" id="empname" class="form-control"   placeholder=" اسم الموظف " value="<?php if(isset($user)){echo $user->fullName;} else{echo old('empname');} ?>" >
								        </div>
								       </div>

								       <div class="form-group">
								        <label for="username" class="col-sm-3 control-label ">اسم المستخدم :</label>
								        <div class="col-sm-6">
								         <input type="text" name="username" id="username" class="form-control" placeholder="اسم المستخدم " value="<?php if(isset($user)){echo $user->userName;} else{echo old('username');} ?>" >
								        </div>
			      					    </div>

								       <div class="form-group">
								        <label for="password" class="col-sm-3 control-label "> كلمة المرور :</label>
								        <div class="col-sm-6">
								        	<div class="input-group">
									         <input type="password" class="form-control pwd" name="password" id="password" placeholder="كلمة المرور " value="<?php if(isset($user)){echo $user->Password;} else{echo old('password');} ?>" >
								          </div>
								        </div>
							       </div>

							       <div class="form-group">
							        <label for="password_confirmation" class="col-sm-3 control-label "> تأكيد كلمة المرور :</label>
							        <div class="col-sm-6">
							         <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="تأكيد كلمة المرور " value="<?php if(isset($user)){echo $user->Password;} else{echo old('password');} ?>">
							        </div>
							       </div>


									<div class="form-group">
							        <label for="UserType" class="col-sm-3 control-label "> نوع المستخدم :</label>
							        <div class="col-sm-6">
							         <select class="form-control" id="UserType" name="UserType">
										 <?php if($usersTypes != null): ?>
										   <?php $__currentLoopData = $usersTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                    <option value="<?php echo e($type->id); ?>" <?php if((isset($user) && $type->id == $user->Roll ) || old('UserType') == $type->id  ): ?>  selected="selected" <?php endif; ?>> <?php echo e($type->Detail); ?> </option>
                                                
											   
										   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
							         </select>
							        </div>
							       </div>


							       <div class="form-group">
							        <label for="userstatus" class="col-sm-3 control-label "> حالة المستخدم :</label>
							        <div class="col-sm-6">
							         <select class="form-control" id="userstatus" name="userstatus">
							         	
										 <option value="1" <?php if((isset($user) && $user->userState == 1 ) || old('userstatus') == 1 ): ?>  selected="selected" <?php endif; ?>> مفعل </option>
                                         <option value="2" <?php if((isset($user) && $user->userState == 2) || old('userstatus') == 2): ?> selected="selected" <?php endif; ?> >ملغي </option>

							         </select>
 										
							        </div>
							       </div>
							      </div><!-- /modal-body-->
							      <div class="modal-footer">
							        <a href="<?php echo e(url('/usersManagement')); ?>" class="btn btn-default" ><i class="glyphicon glyphicon-remove-sign"></i> إلغاء </a>

							        <button type="submit" class="btn btn-success" id="addUserBtn" data-loading-test="يرجى الانتضار ..."><i class="glyphicon glyphicon-plus-sign"></i> تعديل المستخدم </button>
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
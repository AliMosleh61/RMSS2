<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li ><a href="<?php echo e(url('/home')); ?>">الشاشة الرئيسية </a></li>
           <li class="active">ادارة المستخدمين </li>
			     </ol>
			    <div class="panel panel-info">
				    <div class="panel-heading">
				    	<h5 class="panel-title" style="text-align: center;"><i class="fas fa-users-cog"></i> ادارة المستخدمين </h5>
				     </div>
			            <div class="panel-body">

                      <div class="messages">

                        <?php if($message = Session::get('success')): ?>	
                        <div class="alert alert-success alert-block" role="alert">
		  	              	<button type="button" class="close" data-dismiss="alert">x</button>
				                <strong> <?php echo e($message); ?> </strong>
		                     <?php endif; ?>
                        
                        <?php if($message = Session::get('error')): ?>
                            <div class="alert alert-danger alert-block" role="alert">
		  	              	    <button type="button" class="close" data-dismiss="alert">x</button>
				                    <strong> <?php echo e($message); ?> </strong>
		                  	    </div>
                        <?php endif; ?>
                      </div><!-- messages -->
			                <div class="div-action pull pull-left" style="padding-bottom: 20px;">
			  		            <a class="btn btn-primary" href="<?php echo e(url('/AddUser')); ?>"  > <i class="glyphicon glyphicon-plus-sign"></i><b> إضافة مستخدم </b></a>
			  	             </div><!-- /div-action -->
                            <div class="table-responsive">
                                <table class="display responsive nowrap" style="width:100%" id="UsersTB">
                                    <?php echo csrf_field(); ?>
                                      <thead>
                                          <tr>
                                                <th>رقم المستخدم</th>
                                                <th>الاسم</th>
                                                <th>اسم المستخدم</th>
                                                <th>كلمة المرور</th>
                                                <th>نوع المستخدم</th>
                                                <th>حالة المستخدم </th>
                                                <th>بواسطة</th>
                                                <th>تم إلاضافة في</th>
                                                <th>تم التعديل في</th>
                                                <th>العمليات</th>
                                            </tr>
                                         </thead>
                                        <tbody>
                                         </tbody>
                                 </table>
                             </div>
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






<script type="text/javascript">
  $(function(){
    $('#UsersTB').DataTable({
      
      "language": {
			            "lengthMenu": "عرض   _MENU_ صف في كل صفحة ",
			            "zeroRecords": "لايوجد بيانات ليتم عرضها  ",
			            "info": " الصفحات المعروضه   _PAGE_ من  _PAGES_",
			            "infoEmpty": "لايوجد بيانات ليتم عرضها ",
			            "infoFiltered": "(filtered from _MAX_ total records)",
			            "sSearch" : " بـــحـــث ",
			            "oPaginate": {
						        "sNext": "التالي ",
						         "sPrevious": "السابق "
						      }
			        	},
      processing: true,
      serverSide: false,
      ajax: {
        "url" :'<?php echo route('get.UsersData'); ?>',
         "type": "get"},
      columns : [
        { data: 'id', name: 'id' },
        { data: 'fullName', name: 'fullName' },
        { data: 'userName', name: 'userName' },
        { data: 'Password', name: 'Password' },
        { data: 'Type', name: 'Type' },
        { data: 'userState', name: 'userState' },
        { data: 'dataEntry', name: 'dataEntry' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at'  },
        {data: 'action', name: 'action', orderable: false, searchable: false}
        
      ]

    });
  });
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
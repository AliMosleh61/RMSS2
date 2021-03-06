@extends('layouts.app')

@section('content')
<div class="container">

 
    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li ><a href="{{url('/home')}}">الشاشة الرئيسية </a></li>
				 <li ><a href="{{url('/usersManagement')}}">ادارة المستخدمين </a></li>
				 <li class="active"> إضافة مستخدم  </li>
			     </ol>
			    <div class="panel panel-info">
				    <div class="panel-heading">
				    	<h5 class="panel-title"><i class="fas fa-users-cog"></i> </h5>
				     </div>
			            <div class="panel-body">
						 <div class="messages">
     						 @if(count($errors) > 0)
								 <div class="alert alert-danger" role="alert">					
									 <ul>
									   @foreach ($errors->all()  as $error )							
										<li> {{$error}} </li>
									   @endforeach
									 </ul>					
								 </div>
							 @endif
						 </div>
                               <form class="form-horizontal" action="{{url('/AddUser/add')}}" method="POST" id="submitUserForm" auto-compelet="off" >
									{{csrf_field()}}
							      	<div class="modal-body">
							      		<div id="createUserMessages" ></div>

								       <div class="form-group">
								        <label for="empname" class="col-sm-3 control-label "> اسم الموظف :</label>
								        <div class="col-sm-6">
								         <input type="text" name="empname" id="empname" class="form-control"   placeholder=" اسم الموظف " value="{{	old('empname')}}" >
								        </div>
								       </div>

								       <div class="form-group">
								        <label for="username" class="col-sm-3 control-label ">اسم المستخدم :</label>
								        <div class="col-sm-6">
								         <input type="text" name="username" id="username" class="form-control" placeholder="اسم المستخدم " value="{{old('username')}}" >
								        </div>
			      					    </div>

								       <div class="form-group">
								        <label for="password" class="col-sm-3 control-label "> كلمة المرور :</label>
								        <div class="col-sm-6">
								        	<div class="input-group">
									         <input type="password" class="form-control pwd" name="password" id="password" placeholder="كلمة المرور " >
								          </div>
								        </div>
							       </div>

							       <div class="form-group">
							        <label for="password_confirmation" class="col-sm-3 control-label "> تأكيد كلمة المرور :</label>
							        <div class="col-sm-6">
							         <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="تأكيد كلمة المرور " >
							        </div>
							       </div>


									<div class="form-group">
							        <label for="UserType" class="col-sm-3 control-label "> نوع المستخدم :</label>
							        <div class="col-sm-6">
							         <select class="form-control" id="UserType" name="UserType">
										 @if($usersTypes != null)
										   @foreach ($usersTypes as $type )
											   <option value="{{$type->id}}"> {{$type->Detail}} </option>
										   @endforeach
										@endif
							         </select>
							        </div>
							       </div>


							       <div class="form-group">
							        <label for="userstatus" class="col-sm-3 control-label "> حالة المستخدم :</label>
							        <div class="col-sm-6">
							         <select class="form-control" id="userstatus" name="userstatus">
							         	<option value="1"> مفعل </option>
							         	<option value="2">ملغي </option>
							         </select>
							        </div>
							       </div>
							      </div><!-- /modal-body-->
							      <div class="modal-footer">
							        <a href="{{url('/usersManagement')}}" class="btn btn-default" ><i class="glyphicon glyphicon-remove-sign"></i> إلغاء </a>

							        <button type="submit" class="btn btn-primary" id="addUserBtn" data-loading-test="يرجى الانتضار ..."><i class="glyphicon glyphicon-plus-sign"></i> إضافة المستخدم </button>
							      </div>
	    					  </form>
                         </div><!-- /panel-body -->
                        
                        <div class="panel-footer" >
     	                    <div class="row">
                                <div class="col-md-4">
                                    <span> المستخدم الحالي :   {{Session::get('username')}}  </span>
                                 </div>
                                 <div class="col-md-2">
                                    <span>| نوع المستخدم:   {{Session::get('UserType')}}</span>
                                 </div> 
                             </div>
   	                    </div><!-- /panel-footer -->

                 </div><!-- /panel-info -->
         </div><!-- /col-md-12 -->

    </div><!-- /row -->

</div><!-- /continer -->




@endsection

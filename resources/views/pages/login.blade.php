@extends('layouts.loginL')

@section('content')


<div class="container">
  <div class="row vertical">
   <div class="col-md-5  col-md-offset-3">
    <div class="panel panel-default">
     <div class="panel-heading">
      <h3 class="panel-title"> تسجيل الدخول </h3>
     </div>
     <!--panel-heading-->
     <div class="panel-body">
		   
		  @if($message = Session::get('error'))
			<div class="alert alert-danger alert-block" role="alert">
		  		<button type="button" class="close" data-dismiss="alert">x</button>
				<strong> {{$message}} </strong>
		  	</div>
		  @endif

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
	      <form class="form-horizontal" action="{{url('/login/check')}}" method="POST" id="LoginForm" auto-compelet="off" >
		   {{csrf_field()}}
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



@endsection
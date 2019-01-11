@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li><a href="{{url('/home')}}">الشاشة الرئيسية </a></li>
                 <li class="active"> متغيرات المستخدمين </li>
			     </ol>
			    <div class="panel panel-info">
				    <div class="panel-heading">
				    	<h5 class="panel-title" style="text-align: center;"><i class="fas fa-cogs"></i> متغيرات المستخدمين</h5>
				     </div>
			            <div class="panel-body">

                        <div class="messages">

                                          @if($message = Session::get('success'))	
                                          <div class="alert alert-success alert-block" role="alert">
		  	                                	<button type="button" class="close" data-dismiss="alert">x</button>
				                                  <strong> {{$message}} </strong>
		                                       @endif
                                          
                                          @if ($message = Session::get('error'))
                                              <div class="alert alert-danger alert-block" role="alert">
		  	                                	    <button type="button" class="close" data-dismiss="alert">x</button>
				                                      <strong> {{$message}} </strong>
		                                    	    </div>
                                          @endif
                                         </div><!-- messages -->
                                     
                             <div class="vertical-tabs">
                             <!--  Tabs Headers -->
                               <ul class="nav nav-tabs" role="tablist">
                                  <li class="nav-item">
                                     <a class="nav-link active" data-toggle="tab" href="#home-v" role="tab" aria-controls="home">انواع المستخدمين</a>
                                  </li>
                                  <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#profile-v" role="tab" aria-controls="profile">Profile</a>
                                  </li>
                                  <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#messages-v" role="tab" aria-controls="messages">Messages</a>
                                  </li>
                                  <li class="nav-item">
                                     <a class="nav-link" data-toggle="tab" href="#settings-v" role="tab" aria-controls="settings">Settings</a>
                                  </li>
                               </ul><!-- /End Tabs Headers -->
                               <!--  Content -->
                               <div class="tab-content"> 
                               {{-- UserType tap --}}
                                  <div class="tab-pane active" id="home-v" role="tabpanel">
                                     <div class="sv-tab-panel"> 
                                          

                            <div class="col-md-12">

                                


                                         

                                 <form class="form-horizontal" action="{{url('/AddUserType')}}" method="POST" id="submitUserForm" auto-compelet="off" >
									{{csrf_field()}}
							      	<div class="modal-body">
                                            <div class="panel panel-default">
                                                 <div class="panel-heading">
                                                   <h3 class="panel-title">اضافة نوع</h3>
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
                                    
                                       
								        <div class="form-group">
								        <label for="typeName" class="col-sm-1 control-label ">اسم النوع :</label>
								        <div class="col-sm-11">
								         <input type="text" name="typeName" id="typeName" class="form-control" placeholder="اسم النوع " value="{{old('typeName')}}" >
								        </div>
			      					    </div>

								      
							       <div class="form-group">
							        <label for="typeStatus" class="col-sm-1 control-label "> حالة النوع :</label>
							        <div class="col-sm-11">
							         <select class="form-control" id="typeStatus" name="typeStatus">
							         	<option value="1"> مفعل </option>
							         	<option value="2">ملغي </option>
							         </select>
							        </div>
							       </div>
                                   <button type="submit" class="btn btn-primary" id="addUserBtn" data-loading-test="يرجى الانتضار ..."><i class="glyphicon glyphicon-plus-sign"></i> إضافة نوع </button>
							      </div><!-- /modal-body-->
							    
                                   </div>
                                 </div> 
                                 {{-- Panel body End --}}

							        
							    
	    					  </form> 
                            
                             </div>


			                 <div class="col-md-12">
                                <div class="panel panel-default">
                                     <div class="panel-heading">
                                          <h3 class="panel-title">معلومات الانواع</h3>
                                        </div>
                                        <div class="panel-body">
                             
                            <div class="table-responsive">
                                <table class="display responsive nowrap" style="width:100%" id="UserTypeTB">
                                    @csrf
                                      <thead>
                                          <tr>
                                                <th>رقم نوع</th>
                                                <th>النوع</th>
                                                <th>حالة النوع </th>
                                                <th>العمليات</th>
                                            </tr>
                                         </thead>
                                        <tbody>
                                         </tbody>
                                 </table>
                                  </div>
                                  </div>{{-- panel-body End  --}}
                                  
                                </div>
                                </div>
                                </div> 
                                  </div>
                                     {{-- /UserType tap End --}}
                                  <div class="tab-pane" id="profile-v" role="tabpanel">
                                     <div class="sv-tab-panel">Profile Panel</div>
                                  </div>
                                  <div class="tab-pane" id="messages-v" role="tabpanel">
                                     <div class="sv-tab-panel">Messages  Panel</div>
                                  </div>
                                  <div class="tab-pane" id="settings-v" role="tabpanel">
                                     <div class="sv-tab-panel">Settings Panel</div>
                                  </div>
                               </div><!-- /End Content -->
                            </div>

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



<script type="text/javascript">
  $(function(){
    $('#UserTypeTB').DataTable({
      
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
        "url" :'{!! route('get.UserTypeData') !!}',
         "type": "get"},
      columns : [
        { data: 'id', name: 'id' },
        { data: 'Detail', name: 'Detail' },
        { data: 'State', name: 'State' },
         {data: 'action', name: 'action', orderable: false, searchable: false}
      ]

    });
  });
</script>
@stack('scripts')


@endsection

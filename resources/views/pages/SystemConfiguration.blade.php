@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li><a href="{{url('/home')}}">الشاشة الرئيسية </a></li>
                 <li class="active"> متغيرات النظام </li>
			     </ol>
			    <div class="panel panel-info">
				    <div class="panel-heading">
				    	<h5 class="panel-title" style="text-align: center;"><i class="fas fa-cogs"></i> متغيرات النظام</h5>
				     </div>
			            <div class="panel-body">
                             <div class="vertical-tabs">
                             <!--  Tabs Headers -->
                               <ul class="nav nav-tabs" role="tablist">
                                  <li class="nav-item">
                                     <a class="nav-link active" data-toggle="tab" href="#home-v" role="tab" aria-controls="home">Home</a>
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
                                  <div class="tab-pane active" id="home-v" role="tabpanel">
                                     <div class="sv-tab-panel"> home </div>
                                  </div>
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





@endsection

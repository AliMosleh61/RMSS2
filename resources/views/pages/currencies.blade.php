@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
		<div class="col-md-12">
			   <ol class="breadcrumb">
			     <li><a href="{{url('/home')}}">الشاشة الرئيسية </a></li>
                 <li class="active"> اعدادات النظام </li>
                 <li class="active"> العملات </li>

           </ol>
           
			    <div class="panel panel-info">
				    <div class="panel-heading">
				    	<h5 class="panel-title" style="text-align: center;"><i class="fas fa-dollar-sign"></i> العملات</h5>
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
                                     


                                         <div class="col-md-12">

                                


                                         

                                          <form class="form-horizontal" action="{{url('/AddCurrency')}}" method="POST" id="submitCurrencyForm" auto-compelet="off" >
                           {{csrf_field()}}
                               <div class="modal-body">
                                                     <div class="panel panel-default">
                                                          <div class="panel-heading">
                                                            <h3 class="panel-title">اضافة عملة جديدة</h3>
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
                                 <label for="CurrencyName" class="col-sm-2 control-label ">اسم العملة :</label>
                                  <div class="col-sm-10">
                                  <input type="text" name="CurrencyName" id="CurrencyName" class="form-control" placeholder="اسم العملة " value="{{old('CurrencyName')}}" >
                                  </div>
                                </div>
                                   <div class="form-group">
                                    <label for="CurrencySign" class="col-sm-2 control-label ">علامة العملة:</label>
                                    <div class="col-sm-10">
                                     <input type="text" name="CurrencySign" id="CurrencySign" class="form-control" placeholder="اشارة العملة " >
                                    </div>
                                   </div>
                                   <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                      <label  class="col-sm-2 control-label ">عملة النظام:</label>
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" name="CurrencyType" value="1"> محلي
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="CurrencyExchange" class="col-sm-2 control-label ">سعر الصرف:</label>
                                      <div class="col-sm-10">
                                       <input type="text" name="CurrencyExchange" id="CurrencyExchange" class="form-control" placeholder="سعر الصرف" >
                                      </div>
                                   </div>
                                   <div class="form-group">
                                      <label for="Currencystatus" class="col-sm-2 control-label "> حالة العملة :</label>
                                      <div class="col-sm-10">
                                       <select class="form-control" id="Currencystatus" name="Currencystatus">
                                         <option value="1"> مفعل </option>
                                         <option value="2">ملغي </option>
                                       </select>
                                      </div>
                                     </div>
                                <button type="submit" class="btn btn-primary" id="addCurrencyBtn" data-loading-test="يرجى الانتضار ..."><i class="glyphicon glyphicon-plus-sign"></i> إضافة عملة </button>
                             </div><!-- /modal-body-->
                           
                                            </div>
                                          </div> 
                                          {{-- Panel body End --}}
         
                               
                           
                           </form> 
                                     
                                      </div>
         
         
                                <div class="col-md-12">
                                         <div class="panel panel-default">
                                              <div class="panel-heading">
                                                   <h3 class="panel-title">معلومات العملات</h3>
                                                 </div>
                                                 <div class="panel-body">
                                      
                                     <div class="table-responsive">
                                         <table class="display responsive nowrap" style="width:100%" id="CurrencyTB">
                                             @csrf
                                               <thead>
                                                   <tr>
                                                         <th>رقم العملة</th>
                                                         <th>اسم العملة</th>
                                                         <th>علامة العملة </th>
                                                         <th>نوع العملة </th>
                                                         <th>سعر الصرف</th>
                                                         <th>حالة العملة </th>
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
                                           </div>{{-- panel-body End  --}}
                                           
                                         </div>
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
             $('#CurrencyTB').DataTable({
               
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
                 "url" :'{!! route('get.currencies') !!}',
                  "type": "get"},
               columns : [
                { data: 'id', name: 'id' },
                { data: 'Name', name: 'Name' },
                { data: 'sign', name: 'sign' },
                { data: 'Type', name: 'Type' },
                { data: 'Exchange', name: 'Exchange' },
                { data: 'State', name: 'State' },
                { data: 'DataEntry', name: 'DataEntry' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at'  },
                {data: 'action', name: 'action', orderable: false, searchable: false}
        
               ]
         
             });
           });
         </script>
         @stack('scripts')
         
         
         @endsection
         
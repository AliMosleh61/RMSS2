@extends('layouts.loginL')

@section('content')


<div class="container">
  <div class="row vertical">
   <div class="col-md-12  ">
    <!--panel-heading-->
        <div class="jumbotron" style="text-align: center;">
            <h1>نظام ادارة المتاجر</h1>
            @CSRF
         <p><a class="btn btn-info btn-lg" href="/login" role="button"><i class="glyphicon glyphicon-log-in"></i> الدخول الى النظام</a></p>
        </div>
   </div>
   <!-- col-ms-5 -->
  </div>
  <!-- /row-->
 </div>
 <!-- /container -->



@endsection
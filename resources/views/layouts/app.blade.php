<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BootStrap css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('font_awesome/web-fonts-with-css/css/fontawesome-all.min.css')}}" />
    <!-- BootStrap theme css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap-theme.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap-theme.min.css')}}" />
    <!-- BootStrap rtl css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap-rtl.min.css')}}" />
    <!-- datatables  css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/dataTables/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/dataTables/responsive.dataTables.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/dataTables/buttons.dataTables.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/dataTables/select.dataTables.min.css')}}" />
    <link rel="stylesheet" href="//editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css">
    <!-- Custome css -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/Custome.css')}}" />
    <script src="{{asset('js/jquery.min.js')}}"></script>
    
    
   

    
</head>


<body>
<nav class="navbar navbar-default navbar-static-top ">
      <div class="container">
      
        <div class="navbar-header ">                       <!-- this div will contain all the sub-component of the header of the navbar -->
          
                                  
          <button class="navbar-toggle collapsed "  data-toggle="collapse" data-target="#navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a href="#"  class="navbar-brand ">نظام ادارة المتاجر </a>        <!-- to add the website brand(name) -->
        </div>
        <!-- navbar elements creation -->
        <div id="navbar" class="navbar-collapse collapse " >            <!-- when we will minimize the window the nav will minimize -->
          <!-- list of elements for the main links in the left  -->
          <ul class="nav navbar-nav" >                      <!-- to make the elements be in the same line togather -->
            <li  id="navDashboard"><a href="{{url('/home')}}"><i  class="glyphicon glyphicon-list-alt"></i> الشاشة الرئيسيه </a></li>

            <li class="dropdown">                      <!-- to identify this element contain another list  -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span> <i class="fas fa-cogs"></i> اعدادات النظام </a>               <!-- (class="caret") to add an arrow to this link as assign for this like  has sub-elements  -->
              <ul class="dropdown-menu" >                  <!-- to hide the element of the list and make it as dropdown menu -->
                <li class="dropdown-header"> تهيئة النظام </li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="{{url('/SystemConfiguration')}}"><i class="fas fa-cogs"></i> متغيرات النظام </a></li>
                <li><a href="{{url('/currencies')}}"><i class="fas fa-dollar-sign"></i> العملات </a></li>
              
              </ul>
            </li>

            <li class="dropdown">                      <!-- to identify this element contain another list  -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span> <i class="fas fa-shopping-cart"></i> المبيعات </a>               <!-- (class="caret") to add an arrow to this link as assign for this like  has sub-elements  -->
              <ul class="dropdown-menu" >                  <!-- to hide the element of the list and make it as dropdown menu -->
                <li class="dropdown-header"> عمليات المبيعات</li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="#"><i class="fas fa-cart-plus"></i> إضافة مبيعه</a></li>
                <li><a href="#">إدارة المبيعات</a></li>
                <li><a href="#"><i class="fas fa-cart-plus"></i> متغيرات المبيعات</a></li>{{--  انواع الدفع ,انواع البيع جملة او تجزائه, حالة الفواتير  --}}
                <li class="divider"></li>
                <li class="dropdown-header">عمليات العملاء</li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="#">إضافة عميل</a></li>
                <li><a href="#">ادارة العملاء</a></li>
                <li><a href="#">حسابات العملاء</a></li>
                <li><a href="#">مقبوضات العملاء</a></li>
                <li><a href="#">ادارة مقبوضات العملاء</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">نقاط البيع</li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="#">إضافة نقطة بيع</a></li>
                <li><a href="#">ادارة نقاط البيع</a></li>
              </ul>
            </li>
            
            <li class="dropdown">                      <!-- to identify this element contain another list  -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span> <i  class="fas fa-cart-arrow-down "></i> المشتريات 
              </a>               <!-- (class="caret") to add an arrow to this link as assign for this like  has sub-elements  -->
              <ul class="dropdown-menu" >                  <!-- to hide the element of the list and make it as dropdown menu -->
                <li class="dropdown-header">عمليات المشتريات </li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="#">اضافة فاتورة مشتريات </a></li>
                <li><a href="#">ادارة فواتير المشتريات </a></li>
                <li><a href="#">متغيرات المشتريات </a></li>
                  <li class="divider"></li>
                <li class="dropdown-header">الموردين</li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="#">اضافة مورد</a></li>
                <li><a href="#">ادارة الموردين </a></li>
                <li><a href="#">حسابات الموردين</a></li>
                <li><a href="#">مدفوعات الموردين</a></li>
                <li><a href="#">ادارة مدفوعات الموردين</a></li>
                 <li><a href="#">متغيرات الموردين </a></li>
              </ul>
            </li>

            <li class="dropdown">                      <!-- to identify this element contain another list  -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span> <i class="fas fa-store-alt"></i> المخازن 
              </a>               <!-- (class="caret") to add an arrow to this link as assign for this like  has sub-elements  -->
              <ul class="dropdown-menu" >                  <!-- to hide the element of the list and make it as dropdown menu -->
                <li class="dropdown-header"> عمليات المخازن</li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="#">اضافة مخزن</a></li>
                <li><a href="#">ادارة المخازن  </a></li>
                <li><a href="#">معلومات المخازن </a></li>
                 <li><a href="#">امر توريد مخزني </a></li>
                  <li><a href="#">اداراة اوامر التوريد</a></li>
                <li><a href="#">تسعير الاصناف</a></li>
                <li><a href="#">اضافة رصيد افتتاحي </a></li>
                  <li class="divider"></li>
                <li class="dropdown-header">عمليات الاصناف</li> <!-- (class="dropdown-header") to add an header(title) for list elements -->
                <li><a href="#">اضافة صنف</a></li>
                <li><a href="#">اداراة الاصناف </a></li>
                <li><a href="#">متغيرات الاصناف </a></li>{{--  مجموعات الاصناف ,الوحدات   --}}
                  <li class="divider"></li>
                <li class="dropdown-header">تهيئة المخازن</li> 
                <li><a href="#">متغيرات المخازن </a></li>{{--  انواع اوامر التوريد  --}}
              
              </ul>
            </li>

            <li class="dropdown" id="MainUsersManagement">                      <!-- to identify this element contain another list  -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="caret"></span> <i class="fas fa-users"></i>  المستخدمين </a>               
              <ul class="dropdown-menu" >                  <!-- to hide the element of the list and make it as dropdown menu -->
                <li id="navUsersManagement"><a  href="{{url('/usersManagement')}}"><i class="fas fa-users-cog"></i> إدارة المستخدمين </a></li>
                <li><a href="{{url('/userConfiguration')}}">متغيرات المستخدمين</a></li>
                <li class="divider"></li>
              </ul>
            </li>
          </ul>
          
          <!-- list of elements for the other links in the right  -->
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">                      <!-- to identify this element contain another list  -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span> <i class="glyphicon glyphicon-user"></i></a>               <!-- (class="caret") to add an arrow to this link as assign for this like  has sub-elements  -->
              <ul class="dropdown-menu" >                  <!-- to hide the element of the list and make it as dropdown menu -->
                <li class="dropdown-header">اعدادات المستخدم </li>
                <li><a href="#"> <i class="fas fa-cog"> </i>  الاعدادات </a></li>
                <li><a href="{{url('/logout')}}"> <i class="glyphicon glyphicon-log-out"></i> تسجيل الخروج</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
     </nav>

@yield('content')








<script src="{{asset('js/app.js')}}"></script> 
<script src="{{asset('js/bootstrap.min.js')}}"></script>




<!-- datatables  js -->
<script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('js/datatables/dataTables.responsive.min.js')}}"></script> 
<script src="{{asset('js/datatables/dataTables.buttons.min.js')}}"></script> 
<script src="{{asset('js/datatables/dataTables.select.min.js')}}"></script> 









 

 
 
</body>
</html>
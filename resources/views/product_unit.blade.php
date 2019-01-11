<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{__('genral.title')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/style.css')}}" />
    <script src="{{asset('js/script.js')}}"></script>
</head>


<body>
    



 @foreach ( $products as $key => $product )
 <ul>
   <li> {{ $product->id }}  </li> 
   <li> {{ $product->pcode }} </li> 
   <li> {{ $product->previous_product_unit }} </li> 
   <li> {{ $product->current_unit_id }} </li> 
   <li> {{ $product->package }} </li> 
</ul> 

 @endforeach

 {{$products->links()}}



</body>
</html>
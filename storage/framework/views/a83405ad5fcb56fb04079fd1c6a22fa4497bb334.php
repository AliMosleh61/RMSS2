<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e(__('genral.title')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo e(asset('css/style.css')); ?>" />
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</head>


<body>
    



 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <ul>
   <li> <?php echo e($product->id); ?>  </li> 
   <li> <?php echo e($product->pcode); ?> </li> 
   <li> <?php echo e($product->previous_product_unit); ?> </li> 
   <li> <?php echo e($product->current_unit_id); ?> </li> 
   <li> <?php echo e($product->package); ?> </li> 
</ul> 
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php echo e($products->links()); ?>




</body>
</html>
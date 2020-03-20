<!DOCTYPE html>
<html lang="en">
<head>

<?php echo $__env->make('partialsMainTable.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</head>

<body class="body-wrapper">


<?php echo $__env->make('partialsMainTable.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('partialsMainTable.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>




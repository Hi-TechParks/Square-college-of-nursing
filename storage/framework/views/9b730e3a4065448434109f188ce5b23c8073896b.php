<?php if(Session::has('success')): ?>
<div class="alert alert-success" role="alert">
  <?php echo e(Session::get('success')); ?>

</div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
<div class="alert alert-danger" role="alert">
  <?php echo e(Session::get('error')); ?>

</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/admin/inc/message.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <!--== Details Page Start ==-->
    <section class="section mt-50" id="details-page">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <h1><?php echo e($notice->NOTICE_TITLE); ?></h1>
            <div class="blog-box-meta">
              <span class="date"><i class="far fa-calendar-alt"></i> : <?php echo e(date('d F', strtotime($notice->PUBLISH_START_DATE))); ?></span>
            </div>
            <!-- <?php if(!empty($notice->NOTICE_FILE_PATH)): ?>
              <a href="/uploads/images/notice/<?php echo e($notice->NOTICE_FILE_PATH); ?>" class="download" download>Download Notice</a>
            <?php endif; ?> -->
            <p><?php echo $notice->NOTICE_DESC; ?></p>
          </div>

        </div>
      </div>
    </section>
    <!--== Details Page End ==-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Running Project\SCN\resources\views/notice-details.blade.php ENDPATH**/ ?>
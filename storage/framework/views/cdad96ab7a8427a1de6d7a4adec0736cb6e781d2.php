<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $calendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--== Details Page Start ==-->
    <section class="section" id="details-page">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <h1><?php echo e($calendar->TYPE_NAME); ?></h1>

            Class : 
            <?php if( $calendar->CLASS_OFF == '1' ): ?>
              <span class="active_status">On</span>
            <?php else: ?>
              <span class="inactive_status">Off</span>
            <?php endif; ?>

            <div class="blog-box-meta">
              <h4 class="date"><i class="far fa-calendar-alt"></i> : <?php echo e(date('d M Y', strtotime($calendar->EVENT_DATE))); ?></h4>
            </div>
            <p><?php echo $calendar->EVENT_DESC; ?></p>

          </div>

        </div>
      </div>
    </section>
    <!--== Details Page End ==-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Running Project\SCN\resources\views/calendar_event.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!--== Page Header Start ==-->
    <section class="section mt-50" id="page-header" style="background-image:url('/uploads/images/event/<?php echo e($event->IMAGE_PATH); ?>')">
      
    </section>
    <!--== Page Header End ==-->


    <!--== Details Page Start ==-->
    <section class="section" id="details-page">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12">
            <h1><?php echo e($event->EVENT_TITLE); ?></h1>
            <div class="blog-box-meta">
              <span class="date"><i class="far fa-calendar-alt"></i> : <?php echo e(date('d M', strtotime($event->EVENT_DATE))); ?></span>

              <?php if(!empty($event->EVENT_TIME)): ?>
              <span class="time"><i class="far fa-clock"></i> : <?php echo e(date('h:i A', strtotime($event->EVENT_TIME))); ?></span>
              <?php endif; ?>

              <?php if(!empty($event->EVENT_LOCATION)): ?>
              <span class="location"><i class="fas fa-map-marked-alt"></i> : <?php echo e($event->EVENT_LOCATION); ?></span>
              <?php endif; ?>
            </div>
            <p><?php echo $event->EVENT_DESC; ?></p>

          </div>

        </div>
      </div>
    </section>
    <!--== Details Page End ==-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Running Project\SCN\resources\views/event-details.blade.php ENDPATH**/ ?>
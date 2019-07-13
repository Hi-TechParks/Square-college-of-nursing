<?php $__env->startSection('content'); ?>

    <!--== Event Area Start ==-->
    <section class="section mg-tp">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <h1 class="text-center"><span>Our All Event</span></h1>
          </div>
        </div>
        <div class="row">

          <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!--== Single Event ==-->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="event-page-single-box">
              <div class="event-page-single-box-left">
                <div class="event-page-single-box-image">
                  <img src="<?php echo e(asset('/uploads/images/event/'.$event->IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block" alt="campus tour" />
                </div>
              </div>
              <div class="event-page-single-box-right">
                <div class="event-page-single-box-header">
                  <div class="single-notice-right">
                    <p><?php echo e($event->EVENT_TITLE); ?></p>
                    <div class="meta-box">
                      <span><i class="far fa-calendar-alt"></i></span>
                      <?php echo e(date('d-M-y', strtotime($event->EVENT_DATE))); ?>

                    </div>
                    <div class="meta-box">
                      <span><i class="far fa-clock"></i></span> <?php echo e(date('h:i A', strtotime($event->EVENT_TIME))); ?>

                    </div>
                  </div>
                </div>
                <div class="event-page-single-box-footer">
                  <a href="<?php echo e(url('/event/single/'.$event->EVENT_ID)); ?>" class="read_more">View Details</a>
                </div>
              </div>
            </div>
          </div>
          <!--== Single Event ==-->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <!--== Pagination Area Start ==-->
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="mx-auto d-block d-flex">
                <nav aria-label="..." class="mx-auto d-block">
                  <?php echo e($events->links()); ?>

                </nav>
              </div>
          </div>
        </div>
        <!--== Pagination Area End ==-->

      </div>
    </section>
    <!--== Event Area End ==-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/event.blade.php ENDPATH**/ ?>
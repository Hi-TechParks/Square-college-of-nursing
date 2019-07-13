<?php $__env->startSection('content'); ?>

  	<!--== Chairman Area Start ==-->
    <section class="section pd-btm mg-tp" id="about-page">
      <div class="container">

        <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="about-page-image">
              <img src="<?php echo e(asset('/uploads/images/reviewer/'.$testimonial->IMAGE_PATH)); ?>" class="img-fluid mx-auto d-block" alt="profile">
              <p class="about-page-name"><?php echo e($testimonial->TESTIMONIAL_BY_NAME); ?></p>
              <p class="about-page-degination"><?php echo e($testimonial->TESTIMONIAL_BY_DESC); ?></p>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 offset-lg-1">
            <div class="about-page-details">
              <h1><span>Testimonial</span></h1>
              <br/>
              <?php echo $testimonial->TESTIMONIAL_CONTENT; ?>

            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </section>
    <!--== Chairman Area End ==-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/testimonial.blade.php ENDPATH**/ ?>
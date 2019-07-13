    
    <?php $__env->startSection('content'); ?>
    <!--== About us Area Start ==-->
    <section class="section mg-tp" id="about-us">
      <div class="container">

        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <div class="section-title-icon"><i class="fas fa-user-injured"></i></div>
              <h2 class="section-title">About Us</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="about-us">
              <div class="about-us-image">
                <img src="<?php echo e(asset('/uploads/images/'.$about->IMAGE_FILE_PATH)); ?>" class="img-fluid mx-auto d-block" alt="About Us" />
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="about-us">
              <div class="about-us-details">
                <?php echo $about->ABOUT_US_CONTENT; ?>

              </div>
            </div>
          </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </section>
    <!--== About us Area End ==-->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/about.blade.php ENDPATH**/ ?>
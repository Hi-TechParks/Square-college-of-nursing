    
    <?php $__env->startSection('content'); ?>
    <!--== Contact us Area Start ==-->
    <section class="section mg-tp">
      <div class="container">
    
      <!-- ==========================  Start Contact Section  =============================  -->
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <!-- ===  Contact Form  ====  -->
              <div class="contact_form">
                  <div class="contact-header">
                    <h4>Your feedback is valuable to us</h4>
                  </div>

                  <?php echo $__env->make('admin.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <form  action="<?php echo e(url('/admin/email/store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">

                      <?php if($errors->has('subject')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('subject')); ?>

                          </span>
                      <?php endif; ?>
                    </div>

                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Youremail@mail.com">

                      <?php if($errors->has('email')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('email')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                      <textarea class="form-control" name="content" placeholder="Write Somthing..."></textarea>

                      <?php if($errors->has('content')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('content')); ?>

                          </span>
                      <?php endif; ?>
                    </div>

                      <input type="submit" class="btn btn-default" value="Send">
                  </form>
              </div>
              <!-- ===  Contact Form  ====  -->
            </div>

            <div class="col-md-6 col-sm-12">
              <!-- ===  Contact Info  ====  -->
              <div class="contact_info_table">
                <div class="contact-header">
                  <h4>Find us here</h4>
                </div>

                <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="con_infos">
                    <div class="con_content">
                        <span><i class="fas fa-map-marker-alt"></i></span> <?php echo e($address->CONTACT_ADDRESS); ?>

                    </div>
                </div>
                <div class="con_infos">
                    <div class="con_content">
                        <span><i class="fas fa-phone"></i> </span> Contact : <?php echo e($address->CONTACT_PHONE); ?>

                    </div>
                </div>
                <div class="con_infos">
                    <div class="con_content">
                        <span><i class="fas fa-envelope"></i></span> Email : <?php echo e($address->CONTACT_EMAIL); ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
              <!-- ===  Contact Info  ====  -->
            </div>
          </div>
          <!-- ==========================  End Contact Section  =============================  -->
        
      </div>
    </section>
    <!--== Contact us Area End ==-->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/contact.blade.php ENDPATH**/ ?>
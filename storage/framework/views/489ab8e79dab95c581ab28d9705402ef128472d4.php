<?php $__env->startSection('content'); ?>

  	<!--== Notice Area Start ==-->
    <section class="section mg-tp" id="about-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="about-page-details">
              <h1 class="text-center"><span>All Notice</span></h1>
              <br/>
              
              <div class="table-responsive">
              <table class="table table-bordered notice-table">
                <thead>
                  
                </thead>
                <tbody>

                  <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <div class="single-notice-date-box">
                        <span><?php echo e(date('d', strtotime($notice->PUBLISH_START_DATE))); ?></span>
                        <?php echo e(date('M', strtotime($notice->PUBLISH_START_DATE))); ?>

                      </div>
                    </td>
                    <td>
                      <div class="single-notice-details">
                        <p><?php echo e($notice->NOTICE_TITLE); ?></p>
                        <a href="<?php echo e(url('/notice/single/'.$notice->NOTICE_ID)); ?>">View More</a>
                      </div>
                    </td>
                    <td>
                      <!-- <?php if(!empty($notice->NOTICE_FILE_PATH)): ?>
                        <a href="/uploads/images/notice/<?php echo e($notice->NOTICE_FILE_PATH); ?>" class="research-download" download>Download pdf</a>
                      <?php endif; ?> -->
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <!-- <tr>
                    <td>
                      <div class="single-notice-date-box">
                        <span>26</span>
                        Jan
                      </div>
                    </td>
                    <td>
                      <div class="single-notice-details">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting </p>
                        <button data-toggle="modal" data-target="#20181200009">Read More</button>
                      </div>
                    </td>
                    <td>
                      <a href="#" class="research-download" download>Download pdf</a>
                    </td>
                  </tr> -->
                  
                </tbody>
              </table>
              </div>

              <!--== Pagination Area Start ==-->
              <div class="mx-auto d-block d-flex">
                <nav aria-label="..." class="mx-auto d-block">
                  <?php echo e($notices->links()); ?>

                </nav>
              </div>
              <!--== Pagination Area End ==-->

            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== Notice Area End ==-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/notice.blade.php ENDPATH**/ ?>
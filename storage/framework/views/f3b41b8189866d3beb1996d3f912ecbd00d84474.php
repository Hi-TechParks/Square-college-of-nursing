<?php $__env->startSection('content'); ?>


    <!--== Dashboard Area Start ==-->
    <section class="section mt-50" id="deshboard">
      <div class="container">
        <!--== Dashboard Breadcrumb Start ==-->
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Gallery</a></li>
                <li class="breadcrumb-item active" aria-current="page">View</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--== Dashboard Breadcrumb End ==-->

        <div class="row">
          <!--== Dashboard Sidebar Start ==-->
          <aside class="col-md-3">
            <?php echo $__env->make('admin.inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          </aside>
          <!--== Dashboard Sidebar End ==-->

          <!--== Dashboard Main Start ==-->
          <main class="col-md-9">

            <!--== Data View Card Start ==-->
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
              <img src="<?php echo e(asset('/uploads/images/gallery/'.$image->IMAGE_FILE_PATH)); ?>" class="card-img-top" alt="Event">
              <div class="card-body">
                <h5 class="card-title"><?php echo e($image->IMAGE_TITLE); ?></h5>
                <p class="card-text"><?php echo $image->IMAGE_DESC; ?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Home Show: 
                  <?php if( $image->HOME_PAGE_SHOW_FLAG == '1' ): ?>
                    Yes
                  <?php else: ?>
                    No
                  <?php endif; ?>
                </li>
                <li class="list-group-item">Serial No: <?php echo e($image->SL_NO); ?></li>
                <li class="list-group-item">
                  <?php if( $image->ACTIVE_STATUS == '1' ): ?>
                    <p class="active_status">Active</p>
                  <?php else: ?>
                    <p class="inactive_status">Inactive</p>
                  <?php endif; ?>
                </li>
              </ul>
              <div class="card-body">
                <a href="<?php echo e(url('/admin/gallery/edit/'.$image->IMAGE_ID)); ?>" class="btn btn-primary">Edit</a>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--== Data View Card End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/admin/gallery/gallery_view.blade.php ENDPATH**/ ?>
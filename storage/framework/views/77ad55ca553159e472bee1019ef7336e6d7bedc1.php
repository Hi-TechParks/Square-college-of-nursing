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
                <li class="breadcrumb-item"><a href="#">Member</a></li>
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
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
              <img src="/uploads/images/profile/<?php echo e($member->PROFILE_IMAGE_PATH); ?>" class="card-img-top" alt="Event">
              <div class="card-body">
                <h5 class="card-title"><?php echo e($member->name); ?></h5>
                <p class="card-text"><?php echo $member->PROFILE; ?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Designation: <?php echo e($member->DESIGNATION_NAME); ?></li>
                <li class="list-group-item">Qualification: <?php echo e($member->QUALIFICATION); ?></li>
                <li class="list-group-item">Email Address: <?php echo e($member->email); ?></li>
                <li class="list-group-item">Contact Phone: <?php echo e($member->CONTACT_PHONE); ?></li>
                <li class="list-group-item">Date Of Birth: <?php echo e($member->DOB); ?></li>
                <li class="list-group-item">Gender: 
                  <?php if($member->GENDER == '1'): ?>
                    Male
                  <?php elseif($member->GENDER == '2'): ?>
                    Female
                  <?php endif; ?>
                </li>
                <li class="list-group-item">User Type: 
                  <?php if($member->USER_TYPE_ID == '1'): ?>
                    Faculty
                  <?php elseif($member->USER_TYPE_ID == '2'): ?>
                    Staff
                  <?php endif; ?>
                </li>
                <li class="list-group-item">
                  <?php if( $member->ACTIVE_STATUS == '1' ): ?>
                    <p class="active_status">Active</p>
                  <?php else: ?>
                    <p class="inactive_status">Inactive</p>
                  <?php endif; ?>
                </li>
              </ul>
              <div class="card-body">
                <a href="/admin/member/edit/<?php echo e($member->id); ?>" class="btn btn-primary">Edit</a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Running Project\SCN\resources\views/admin/member/member_view.blade.php ENDPATH**/ ?>
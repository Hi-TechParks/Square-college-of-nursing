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
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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

            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    <?php echo $__env->make('admin.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                  </div>
                  <div class="col-md-2">
                    <a href="/admin/member/edit/<?php echo e($member->id); ?>" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="/admin/member/update/<?php echo e($member->id); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Full Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="full_name" value="<?php echo e($member->name); ?>" placeholder="Full Name">

                      <?php if($errors->has('full_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('full_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Academic Designation</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="academic_designation">
                        <option value="">Select Academic Designation</option>
                        <?php $__currentLoopData = $aca_designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aca_designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($aca_designation->DESIGNATION_ID); ?>"  <?php if( $aca_designation->DESIGNATION_ID == $member->DESIGNATION_ACADEMIC ): ?> selected <?php endif; ?>>
                          <?php echo e($aca_designation->DESIGNATION_NAME); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                      <?php if($errors->has('academic_designation')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('academic_designation')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Admin Designation</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="admin_designation">
                        <option value="">Select Admin Designation</option>
                        <?php $__currentLoopData = $adm_designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adm_designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($adm_designation->DESIGNATION_ID); ?>"  <?php if( $adm_designation->DESIGNATION_ID == $member->DESIGNATION_ADMIN ): ?> selected <?php endif; ?>>
                          <?php echo e($adm_designation->DESIGNATION_NAME); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                      <?php if($errors->has('admin_designation')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('admin_designation')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Qualification</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="qualification" value="<?php echo e($member->QUALIFICATION); ?>" placeholder="Qualification">

                      <?php if($errors->has('qualification')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('qualification')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Profile Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Profile Content" rows="15"><?php echo e($member->PROFILE); ?></textarea>

                      <?php if($errors->has('content')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('content')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email Address</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="email" value="<?php echo e($member->email); ?>" placeholder="Email Address">

                      <?php if($errors->has('email')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('email')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact Phone</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="phone" value="<?php echo e($member->CONTACT_PHONE); ?>" placeholder="Phone Number">

                      <?php if($errors->has('phone')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('phone')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date of Birth</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="birth_date" value="<?php echo e($member->DOB); ?>" placeholder="Date of Birth">

                      <?php if($errors->has('birth_date')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('birth_date')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Gender</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="gender">
                        <option value="1" <?php if( $member->GENDER == '1' ): ?> selected <?php endif; ?>>Male</option>
                        <option value="2"  <?php if( $member->GENDER == '2' ): ?> selected <?php endif; ?>>Female</option>
                      </select>

                      <?php if($errors->has('gender')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('gender')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Profile Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="profile_image" placeholder="Profile Image">

                      <?php if($errors->has('profile_image')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('profile_image')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Member Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="member_type">
                        <option value="">Select Type</option>
                        <option value="1" <?php if( $member->USER_TYPE_ID == '1' ): ?> selected <?php endif; ?>>Faculty</option>
                        <option value="2" <?php if( $member->USER_TYPE_ID == '2' ): ?> selected <?php endif; ?>>Staff</option>
                      </select>

                      <?php if($errors->has('member_type')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('member_type')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
                <!--== Data Form End ==-->
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Running Project\SCN\resources\views/admin/member/member_edit.blade.php ENDPATH**/ ?>
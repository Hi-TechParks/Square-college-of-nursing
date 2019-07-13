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
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
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

            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    <?php echo $__env->make('admin.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                  </div>
                  <div class="col-md-2">
                    <a href="<?php echo e(URL('/admin/application/create')); ?>" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="<?php echo e(url('/admin/application/store')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="program_name">
                        <option value="">Select Program</option>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($program->PROGRAM_ID); ?>"><?php echo e($program->PROGRAM_NAME); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                      <?php if($errors->has('program_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('program_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Session Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="session_name">
                        <option value="">Select Session</option>
                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($session->SESSION_ID); ?>"><?php echo e($session->SESSION_NAME); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                      <?php if($errors->has('session_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('session_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Applicant Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="applicant_name" placeholder="Applicant Name">

                      <?php if($errors->has('applicant_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('applicant_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_name" placeholder="Father Name">

                      <?php if($errors->has('father_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('father_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Profession</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_profession" placeholder="Father Profession">

                      <?php if($errors->has('father_profession')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('father_profession')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_name" placeholder="Mother Name">

                      <?php if($errors->has('mother_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('mother_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Profession</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_profession" placeholder="Mother Profession">

                      <?php if($errors->has('mother_profession')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('mother_profession')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date Of Birth</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="birth_date" placeholder="Birth Date">

                      <?php if($errors->has('birth_date')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('birth_date')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Applicant Photo</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="photo" placeholder="Applicant Photo">

                      <?php if($errors->has('photo')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('photo')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Birth Place</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="birth_place" placeholder="Birth Place">

                      <?php if($errors->has('birth_place')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('birth_place')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Marital Status</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="marital_status">
                        <option value="">Select</option>
                        <option value="S">Single</option>
                        <option value="M">Married</option>
                        <option value="W">Widowed</option>
                        <option value="T">Separated</option>
                        <option value="D">Divorced</option>
                      </select>

                      <?php if($errors->has('marital_status')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('marital_status')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nationality</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nationality" placeholder="Nationality">

                      <?php if($errors->has('nationality')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('nationality')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">National Id</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="national_id" placeholder="National Id">

                      <?php if($errors->has('national_id')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('national_id')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Religion</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="religion" placeholder="Religion">

                      <?php if($errors->has('religion')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('religion')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Country Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="country_name">
                        <option value="">Select Country</option>
                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->COUNTRY_ID); ?>"><?php echo e($country->COUNTRY_NAME); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                      <?php if($errors->has('country_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('country_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="permanent_address" placeholder="Permanent Address" rows="5"></textarea>

                      <?php if($errors->has('permanent_address')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('permanent_address')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent Upazila</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="upazila" placeholder="Permanent Upazila">

                      <?php if($errors->has('upazila')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('upazila')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent District</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="district" placeholder="Permanent District">

                      <?php if($errors->has('district')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('district')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="contact_address" placeholder="Contact Address" rows="5"></textarea>

                      <?php if($errors->has('contact_address')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('contact_address')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact No</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="contact_no" placeholder="Contact No">

                      <?php if($errors->has('contact_no')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('contact_no')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" placeholder="Email Address">

                      <?php if($errors->has('email')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('email')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>



                  <fieldset>
                  <legend>Guardian 1:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_name_1" placeholder="Guardian Name">

                      <?php if($errors->has('guardian_name_1')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_name_1')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="guardian_address_1" placeholder="Guardian Address"></textarea>

                      <?php if($errors->has('guardian_address_1')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_address_1')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Phone</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_phone_1" placeholder="Guardian Phone">

                      <?php if($errors->has('guardian_phone_1')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_phone_1')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Relation</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_relation_1" placeholder="Guardian Relation">

                      <?php if($errors->has('guardian_relation_1')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_relation_1')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </fieldset>


                  <fieldset>
                  <legend>Guardian 2:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_name_2" placeholder="Guardian Name">

                      <?php if($errors->has('guardian_name_2')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_name_2')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Address</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="guardian_address_2" placeholder="Guardian Address"></textarea>

                      <?php if($errors->has('guardian_address_2')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_address_2')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Phone</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_phone_2" placeholder="Guardian Phone">

                      <?php if($errors->has('guardian_phone_2')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_phone_2')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Guardian Relation</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="guardian_relation_2" placeholder="Guardian Relation">

                      <?php if($errors->has('guardian_relation_2')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('guardian_relation_2')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </fieldset>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Declaration</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="declaration_title">
                        <option value="">Select Declaration</option>
                        <?php $__currentLoopData = $declarations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $declaration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($declaration->ADMISSION_APP_FORM_DECLARATION_ID); ?>"><?php echo e($declaration->DECLARATION_TITLE); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                      <?php if($errors->has('declaration_title')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('declaration_title')); ?>

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

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Running Project\SCN\resources\views/admin/application/application_create.blade.php ENDPATH**/ ?>
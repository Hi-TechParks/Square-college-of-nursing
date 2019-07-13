<?php $__env->startSection('content'); ?>

  	<!--== Chairman Area Start ==-->
    <section class="section pd-btm" id="about-page">
      <div class="container">

            <div class="contact-header">
              <h4>Submit Your Application</h4>
            </div>

            <?php if(Session::has('success')): ?>
            <div class="alert alert-success" role="alert">
              <?php echo e(Session::get('success')); ?>

            </div>
            <?php endif; ?>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="<?php echo e(url('/admission/store')); ?>" method="post" enctype="multipart/form-data" class="admission_form">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Applicant Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="applicant_name" placeholder="Applicant Name">

                      <?php if($errors->has('applicant_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('applicant_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                <div class="form-row">
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name <span>*</span></label>
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
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Session Name <span>*</span></label>
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
                  </div>
                </div>


                <fieldset class="form-row">
                  <legend>Parents Information:</legend>
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_name" placeholder="Father Name">

                      <?php if($errors->has('father_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('father_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Father Profession <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="father_profession" placeholder="Father Profession">

                      <?php if($errors->has('father_profession')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('father_profession')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>


                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_name" placeholder="Mother Name">

                      <?php if($errors->has('mother_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('mother_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Mother Profession <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="mother_profession" placeholder="Mother Profession">

                      <?php if($errors->has('mother_profession')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('mother_profession')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>
                </fieldset>

                <div class="">
                  <fieldset class="form-row">
                  <legend>Personal Information:</legend>
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Date Of Birth <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="birth_date" placeholder="Birth Date">

                      <?php if($errors->has('birth_date')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('birth_date')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Applicant Photo <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="photo" placeholder="Applicant Photo">

                      <?php if($errors->has('photo')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('photo')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Birth Place <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="birth_place" placeholder="Birth Place">

                      <?php if($errors->has('birth_place')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('birth_place')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Marital Status <span>*</span></label>
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
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nationality <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nationality" placeholder="Nationality">

                      <?php if($errors->has('nationality')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('nationality')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">National ID</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="national_id" placeholder="National Id">

                      <?php if($errors->has('national_id')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('national_id')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Religion <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="religion" placeholder="Religion">

                      <?php if($errors->has('religion')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('religion')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-6">
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
                  </div>
                  </fieldset>
                </div>


                <div class="form-row">
                <div class="col-md-6">
                  <fieldset>
                  <legend>Permanent Detals:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Permanent Address <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">Upazila Name <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">District Name <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="district" placeholder="Permanent District">

                      <?php if($errors->has('district')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('district')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </fieldset>
                </div>
                <div class="col-md-6">
                  <fieldset>
                  <legend>Contact Details:</legend>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Contact Address <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">Contact No <span>*</span></label>
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
                    <label class="col-sm-4 col-form-label">Email <span>*</span></label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" placeholder="Email Address">

                      <?php if($errors->has('email')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('email')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>
                  </fieldset>
                </div>
                </div>


                <div class="form-row">
                  <div class="col-md-6">
                  <fieldset>
                  <legend>Guardian 1 Information:</legend>
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
                  </div>


                  <div class="col-md-6">
                  <fieldset>
                  <legend>Guardian 2 Information:</legend>
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
                  </div>
                </div>


                <fieldset class="form-row">
                  <legend>Educational Qualifications:</legend>
                  <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Name Of Exam</th>
                        <th scope="col">Group</th>
                        <th scope="col">Passing Year</th>
                        <th scope="col">Roll No.</th>
                        <th scope="col">Reg. No.</th>
                        <th scope="col">Board Name</th>
                        <th scope="col">Total GPA</th>
                        <th scope="col">Biology Mark</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div name="ssc" value="SSC">SSC</div>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_group" required="">

                          <?php if($errors->has('ssc_group')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('ssc_group')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_year" required="">

                          <?php if($errors->has('ssc_year')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('ssc_year')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_roll" required="">

                          <?php if($errors->has('ssc_roll')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('ssc_roll')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_reg" required="">

                          <?php if($errors->has('ssc_reg')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('ssc_reg')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_board" required="">

                          <?php if($errors->has('ssc_board')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('ssc_board')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_gpa" required="">

                          <?php if($errors->has('ssc_gpa')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('ssc_gpa')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="ssc_biology" required="">

                          <?php if($errors->has('ssc_biology')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('ssc_biology')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div name="hsc" value="HSC">HSC</div>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_group" required="">

                          <?php if($errors->has('hsc_group')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('hsc_group')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_year" required="">

                          <?php if($errors->has('hsc_year')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('hsc_year')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_roll" required="">

                          <?php if($errors->has('hsc_roll')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('hsc_roll')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_reg" required="">

                          <?php if($errors->has('hsc_reg')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('hsc_reg')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_board" required="">

                          <?php if($errors->has('hsc_board')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('hsc_board')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_gpa" required="">

                          <?php if($errors->has('hsc_gpa')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('hsc_gpa')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <input type="text" class="form-control" name="hsc_biology" required="">

                          <?php if($errors->has('hsc_biology')): ?>
                              <span class="error_msg">
                                <?php echo e($errors->first('hsc_biology')); ?>

                              </span>
                          <?php endif; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </div>

                </fieldset>

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <div class="card">
                        <?php $__currentLoopData = $declarations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $declaration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-header contact-header">
                          <h4>Application Declaration</h4>
                          <input type="hidden" name="declaration_title" value="<?php echo e($declaration->ADMISSION_APP_FORM_DECLARATION_ID); ?>">
                        </div>
                        <div class="card-body">
                          <h5 class="card-title"><?php echo e($declaration->DECLARATION_TITLE); ?></h5>
                          <?php echo $declaration->DECLARATION; ?>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-defoult">Submit</button>
                    </div>
                  </div>
                </form>
                <!--== Data Form End ==-->
              </div>
            </div>

      </div>
    </section>
    <!--== Chairman Area End ==-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Running Project\SCN\resources\views/admission.blade.php ENDPATH**/ ?>
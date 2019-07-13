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
            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
              <img src="<?php echo e(asset('/uploads/images/applicant/'.$application->APPLICANT_PHOTO_PATH)); ?>" class="card-img-top" alt="Applicant">
              <div class="card-body">
                <h5 class="card-title"><?php echo e($application->APPLICANT_NAME); ?></h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Program Name: <?php echo e($application->PROGRAM_NAME); ?></li>
                <li class="list-group-item">Session Name: <?php echo e($application->SESSION_NAME); ?></li>


                <li class="list-group-item">Father Name: <?php echo e($application->FATHER_NAME); ?></li>
                <li class="list-group-item">Father Profession: <?php echo e($application->FATHER_PROFESSION); ?></li>
                <li class="list-group-item">Mother Name: <?php echo e($application->MOTHER_NAME); ?></li>
                <li class="list-group-item">Mother Profession: <?php echo e($application->MOTHER_PROFESSION); ?></li>
                <li class="list-group-item">Date Of Birth: <?php echo e($application->DOB); ?></li>
                <li class="list-group-item">Birth Place: <?php echo e($application->BIRTH_PLACE); ?></li>
                <li class="list-group-item">
                  Marital Status: 
                  <?php if( $application->MARITAL_STATUS == 'S' ): ?>
                    Single
                  <?php elseif( $application->MARITAL_STATUS == 'M' ): ?>
                    Married
                  <?php elseif( $application->MARITAL_STATUS == 'W' ): ?>
                    Widowed
                  <?php elseif( $application->MARITAL_STATUS == 'T' ): ?>
                    Separated
                  <?php elseif( $application->MARITAL_STATUS == 'D' ): ?>
                    Divorced
                  <?php endif; ?>
                </li>
                <li class="list-group-item">Nationality: <?php echo e($application->NATIONALITY); ?></li>
                <li class="list-group-item">National ID: <?php echo e($application->NATIONAL_ID); ?></li>
                <li class="list-group-item">Religion: <?php echo e($application->RELIGION); ?></li>
                <li class="list-group-item">Country: <?php echo e($application->COUNTRY_NAME); ?></li>
                <li class="list-group-item">Permanent Address: <?php echo e($application->PERMANENT_ADDRESS); ?></li>
                <li class="list-group-item">Permanent Upazilla: <?php echo e($application->PERMANENT_UPAZILLA); ?></li>
                <li class="list-group-item">Permanent Distrct: <?php echo e($application->PERMANENT_DISTRICT); ?></li>
                <li class="list-group-item">Contact Address: <?php echo e($application->CONTACT_ADDRESS); ?></li>
                <li class="list-group-item">Phone No: <?php echo e($application->CONTACT_NO); ?></li>
                <li class="list-group-item">Email ID: <?php echo e($application->EMAIL_ID); ?></li>

                <div class="row">
                  <div class="col-sm-6">
                    <fieldset>
                      <legend>Guardian 1:</legend>
                    <li class="list-group-item">Guardian Name: <?php echo e($application->LEGAL_GUARDIAN_NAME1); ?></li>
                    <li class="list-group-item">Guardian Address: <?php echo e($application->LEGAL_GUARDIAN_CONTACT_ADDRESS1); ?></li>
                    <li class="list-group-item">Guardian Phone: <?php echo e($application->LEGAL_GUARDIAN_CONTACT_NO1); ?></li>
                    <li class="list-group-item">Guardian Relation: <?php echo e($application->LEGAL_GUARDIAN_RELATION1); ?></li>
                    </fieldset>
                  </div>
                  <div class="col-sm-6">
                    <fieldset>
                      <legend>Guardian 1:</legend>
                    <li class="list-group-item">Guardian Name: <?php echo e($application->LEGAL_GUARDIAN_NAME2); ?></li>
                    <li class="list-group-item">Guardian Address: <?php echo e($application->LEGAL_GUARDIAN_CONTACT_ADDRESS2); ?></li>
                    <li class="list-group-item">Guardian Phone: <?php echo e($application->LEGAL_GUARDIAN_CONTACT_NO2); ?></li>
                    <li class="list-group-item">Guardian Relation: <?php echo e($application->LEGAL_GUARDIAN_RELATION2); ?></li>
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
                      <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <?php echo e($education->EXAM_NAME); ?>

                        </td>
                        <td>
                          <?php echo e($education->GROUP_NAME); ?>

                        </td>
                        <td>
                          <?php echo e($education->YEAR_PASSED); ?>

                        </td>
                        <td>
                          <?php echo e($education->ROLL_NO); ?>

                        </td>
                        <td>
                          <?php echo e($education->REG_NO); ?>

                        </td>
                        <td>
                          <?php echo e($education->BOARD_NAME); ?>

                        </td>
                        <td>
                          <?php echo e($education->GPA_WITH_OPTIONAL_SUBJECT); ?>

                        </td>
                        <td>
                          <?php echo e($education->MARKS_BIOLOGY); ?>

                        </td>
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                  </div>

                </fieldset>

                <li class="list-group-item">Declaration: <?php echo e($application->DECLARATION_TITLE); ?></li>

                <li class="list-group-item">
                  <?php if( $application->ACTIVE_STATUS == '1' ): ?>
                    <p class="active_status">Active</p>
                  <?php else: ?>
                    <p class="inactive_status">Inactive</p>
                  <?php endif; ?>
                </li>
              </ul>
              <div class="card-body">
                <a href="<?php echo e(url('/admin/application/edit/'.$application->ADMISSION_APPLICATION_FORM_ID)); ?>" class="btn btn-primary">Edit</a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/admin/application/application_view.blade.php ENDPATH**/ ?>
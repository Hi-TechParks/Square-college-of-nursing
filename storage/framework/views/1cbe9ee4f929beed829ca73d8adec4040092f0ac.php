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
                <li class="breadcrumb-item"><a href="#">Result</a></li>
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

            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    <?php echo $__env->make('admin.inc.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                  </div>
                  <div class="col-md-2">
                    <a href="<?php echo e(url('/admin/result/edit/'.$result->EXAM_RESULT_ID)); ?>" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="<?php echo e(url('/admin/result/update/'.$result->EXAM_RESULT_ID)); ?>"" method="post" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Exam Type</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="exam_type" required>
                        <option value="">Select</option>
                        <option value="0" <?php if( $result->EXAM_TYPE == '0' ): ?> selected <?php endif; ?>>In-course</option>
                        <option value="1" <?php if( $result->EXAM_TYPE == '1' ): ?> selected <?php endif; ?>>Final</option>
                      </select>

                      <?php if($errors->has('exam_type')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('exam_type')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Program Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="program_name" required>
                        <option value="">Select Program</option>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($program->PROGRAM_ID); ?>" <?php if( $result->PROGRAM_ID == $program->PROGRAM_ID ): ?> selected <?php endif; ?>>
                          <?php echo e($program->PROGRAM_NAME); ?>

                        </option>
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
                    <label class="col-sm-4 col-form-label">Session</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="session_name" required>
                        <option value="">Select Session</option>
                        <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($session->SESSION_ID); ?>" <?php if( $result->SESSION_ID == $session->SESSION_ID ): ?> selected <?php endif; ?>>
                          <?php echo e($session->SESSION_NAME); ?>

                        </option>
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
                    <label class="col-sm-4 col-form-label">Year</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="year_name" required>
                        <option value="">Select Year</option>
                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($year->YEAR_ID); ?>" <?php if( $result->YEAR_ID == $year->YEAR_ID ): ?> selected <?php endif; ?>>
                          <?php echo e($year->YEAR_NAME); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>

                      <?php if($errors->has('year_name')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('year_name')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Upload File</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="file" placeholder="Upload File">

                      <?php if($errors->has('file')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('file')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Publish Start</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="publish_start" value="<?php echo e($result->SHOW_FROM_DATE); ?>" placeholder="Publish Start">

                      <?php if($errors->has('publish_start')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('publish_start')); ?>

                          </span>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Publish End</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="publish_end" value="<?php echo e($result->SHOW_END_DATE); ?>" placeholder="Publish End">

                      <?php if($errors->has('publish_end')): ?>
                          <span class="error_msg">
                            <?php echo e($errors->first('publish_end')); ?>

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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/admin/result/result_edit.blade.php ENDPATH**/ ?>
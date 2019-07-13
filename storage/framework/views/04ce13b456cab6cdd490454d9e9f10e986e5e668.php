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
                <li class="breadcrumb-item"><a href="#">Program</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
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
                <!--== Search Form Start ==-->
                <form action="<?php echo e(url('/admin/program')); ?>" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="program_name" placeholder="Program Name">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="category_name" placeholder="Program Type">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-success">Search</button>
                    </div>
                  </div>
                </form>
                <!--== Search Form End ==-->
              </div>
            </div>

            <!--== Data table Start ==-->
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped">
                <caption>List of Programs</caption>
                <thead>
                  <tr>
                    <th scope="col">Program Name</th>
                    <th scope="col">Program Type</th>
                    <th scope="col">Program Period</th>
                    <th scope="col">Period Unit</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($program->PROGRAM_NAME); ?></td>
                    <td><?php echo e($program->TYPE_NAME); ?></td>
                    <td><?php echo e($program->PROGRAM_PERIOD); ?></td>
                    <td><?php echo e($program->PERIOD_UNIT); ?></td>
                    <td>
                      <?php if( $program->ACTIVE_STATUS == '1' ): ?>
                        <a href="<?php echo e(url('/admin/program/status/'.$program->PROGRAM_ID)); ?>" class="active_status">Active</a>
                      <?php else: ?>
                        <a href="<?php echo e(url('/admin/program/status/'.$program->PROGRAM_ID)); ?>" class="inactive_status">Inactive</a>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="<?php echo e(url('/admin/program/show/'.$program->PROGRAM_ID)); ?>" class="btn btn-success">View</a>
                      <a href="<?php echo e(url('/admin/program/edit/'.$program->PROGRAM_ID)); ?>" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>

            <?php echo e($programs->links()); ?>

            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/admin/program/program_list.blade.php ENDPATH**/ ?>
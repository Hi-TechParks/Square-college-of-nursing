<?php $__env->startSection('content'); ?>

    <!--== Event Area Start ==-->
    <section class="section mg-tp">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <h1 class="text-center"><span>Events </span>Calendar</h1>
          </div>
        </div>
        <div class="row">

          <!-- Calender plugin -->
          <div id='calendar'></div>

          <?php echo $__env->make('calender_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="event_indicator">
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #DB6600;"></div> <span>Exam</span>
            </div>
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #5D3AEE;"></div> <span>Class off</span>
            </div>
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #EB1B1B;"></div> <span>Holiday</span>
            </div>
            <div class="single_indicator">
              <div class="indicator_circle" style="background: #01D162;"></div> <span>Others</span>
            </div>
          </div>
          <!-- Calender plugin -->

        </div>

      </div>
    </section>
    <!--== Event Area End ==-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/calendar.blade.php ENDPATH**/ ?>
<!-- <script type="text/javascript">
$(function() {
  $("#calendarFull").fullCalendar({
    themeSystem: "bootstrap4",
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,listMonth" //,agendaWeek,agendaDay
    },
    //weekNumbers: true,
    eventLimit: true, // allow "more" link when too many events
    eventSources: [

    <?php $__currentLoopData = $calendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      {
        events: [
          {
            title: "<?php echo e($calendar->TYPE_NAME); ?>",
            start: "<?php echo e($calendar->EVENT_DATE); ?>",
            //start: "2019-05-09T12:30:00",
            url: '/event/single/<?php echo e($calendar->CALENDAR_ID); ?>'
          }
        ],
        color: "<?php echo e($calendar->COLOR_CODE); ?>", // an option!
        textColor: "#ffffff" // an option!
      },
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    ],

    events: [
      {
        title: "All Day Event",
        start: "2019-03-18",
        end: "2019-03-18",
      },
      {
        title: "All Day Event",
        start: "2019-03-03",
        end: "2019-03-03",
       // allDay: false // will make the time show
      },
      {
        title: "All Day Event",
        start: "2019-03-07",
        end: "2019-03-07",
        //allDay: false // will make the time show
      },
      {
        title: "All Day Event",
        start: "2019-03-12",
        end: "2019-03-12",
        //allDay: false // will make the time show
      },
      {
        title: "All Day Event",
        start: "2019-04-15T12:30:00",
        end: "2019-04-29T11:30:00",
        //allDay: false // will make the time show
      },
      {
        title: "All Day Event",
        start: "2019-03-05",
        end: "2019-03-05",
        //allDay: false // will make the time show
      },
      {
        title: "All Day Event",
        start: "2019-03-05",
        end: "2019-03-05",
        allDay: false // will make the time show
      }
    ]
    
  });
});
</script> -->



<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      //defaultDate: '2019-04-12',
      editable: false, //dragable
      eventLimit: true, // allow "more" link when too many events
      events: [
        /*{
          title: 'All Day Event',
          start: '2019-04-01'
        },
        {
          title: 'Long Event',
          start: '2019-04-07',
          end: '2019-04-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2019-04-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2019-04-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2019-04-11',
          end: '2019-04-13'
        },
        {
          title: 'Meeting',
          start: '2019-04-12T10:30:00',
          end: '2019-04-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2019-04-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2019-04-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2019-04-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2019-04-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2019-04-13T07:00:00'
        },*/

        <?php $__currentLoopData = $calendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
          title: "<?php echo e($calendar->TYPE_NAME); ?>",
          start: "<?php echo e($calendar->EVENT_DATE); ?>",
          url: "/calendar/<?php echo e($calendar->CALENDAR_ID); ?>",
		  color: "<?php echo e($calendar->COLOR_CODE); ?>", // an option!
		  textColor: "#ffffff" // an option!
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      ]
    });

    calendar.render();
  });
</script><?php /**PATH C:\xampp\htdocs\SCN-15-06-19\SCN\resources\views/calender_data.blade.php ENDPATH**/ ?>
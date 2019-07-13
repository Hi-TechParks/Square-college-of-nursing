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
      {
        events: [
          {
            title: "event3",
            start: "2019-03-09T12:30:00",
            url: 'http://google.com/'
          }
        ],
        color: "black", // an option!
        textColor: "yellow" // an option!
      }
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
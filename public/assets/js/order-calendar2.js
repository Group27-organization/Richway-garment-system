document.addEventListener('DOMContentLoaded', function() {






    let calendarEl = document.getElementById('calendar');


    let calendar = new FullCalendar.Calendar(calendarEl, {

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listYear'
        },

        displayEventTime: false, // don't show the time column in list view

        // THIS KEY WON'T WORK IN PRODUCTION!!!
        // To make your own Google API key, follow the directions here:
        // http://fullcalendar.io/docs/google_calendar/
        googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

        // US Holidays
        // events: 'en.usa#holiday@group.v.calendar.google.com',

        events :  function (fetchInfo, successCallback, failureCallback) {
        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/eventCalenderController/orderEvent",
            data: { key: "orderEventCalender"},
            dataType: 'json',

            success: function (data) {


                successCallback(data);


            },
            error: function () {

            }


        });
    },


loading: function(bool) {
            document.getElementById('loading').style.display =
                bool ? 'block' : 'none';
        }

    });

    calendar.render();
});

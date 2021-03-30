
document.addEventListener('DOMContentLoaded', function() {



        $.ajax({
            type: 'POST',
            url: "http://localhost/Richway-garment-system/eventCalenderController/orderEvent",
            data: { key: "orderEventCalender"},
            dataType: 'json',

            success: function (data) {
                function getRandomColor() {
                    let letters = '0123456789ABCDEF';
                    let color = '#';
                    for (let i = 0; i < 6; i++) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }
                // console.log("data calender this :"+JSON.stringify(data));
                for (let i=0; i<data.length; i++) {

                        data[i].color = getRandomColor();


                }

                // let calendarEl  = document.getElementsByClassName("calendar");
                var calendarEl = document.getElementById('calendar1');

                var calendar = new FullCalendar.Calendar(calendarEl, {

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
                    events: data,
                    eventColor: '#378006',



                    eventClick: function(arg) {
                        // opens events in a popup window
                        window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

                        arg.jsEvent.preventDefault() // don't navigate in main tab
                    },

                    loading: function(bool) {
                        document.getElementById('loading1').style.display =
                            bool ? 'block' : 'none';
                    }

                });

                calendar.render();



            },
            error: function () {

            }


        });

    $.ajax({
        type: 'POST',
        url: "http://localhost/Richway-garment-system/eventCalenderController/orderEvent",
        data: { key: "orderEventCalender"},
        dataType: 'json',

        success: function (data) {
            function getRandomColor() {
                let letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
            // console.log("data calender this :"+JSON.stringify(data));
            for (let i=0; i<data.length; i++) {

                data[i].color = getRandomColor();


            }

            // let calendarEl  = document.getElementsByClassName("calendar");
            let calendarEl = document.getElementById('calendar2');

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
                events: data,
                eventColor: '#378006',



                eventClick: function(arg) {
                    // opens events in a popup window
                    window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

                    arg.jsEvent.preventDefault() // don't navigate in main tab
                },

                loading: function(bool) {
                    document.getElementById('loading2').style.display =
                        bool ? 'block' : 'none';
                }

            });

            calendar.render();



        },
        error: function () {

        }


    });




});

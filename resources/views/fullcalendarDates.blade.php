<html>
<head>
    <title>Calendar Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
</head>
<body>
    <div class="container">
        <div class="response alert alert-success mt-2" style="display: none;"></div>
        <div id='calendar'></div>  
    </div>
</body>

<script>
    $(document).ready(function () {
        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        var calendar = $('#calendar').fullCalendar({
            //test ล็อกการจองคิว
            defaultView: 'month',
            selectable: true,
            defaultTimedEventDuration: '00:15:00',
            minTime: "08:00:00",
            maxTime: "17:00:00",
            slotDuration: '00:15:00',
            slotLabelInterval: 15,
            slotLabelFormat: 'h(:mm)a',
            header: {
            left: 'prev,next today',
            center: 'title',
            // right: 'agendaDay,agendaWeek,listDay'
            right: 'agendaDay,agendaWeek,agendaMonth'
            },
            businessHours: [{
            dow: [1, 2, 3, 4, 5], // Monday - Friday
            start: '08:00',
            end: '12:00',
            }, {
            dow: [1, 2, 3, 4, 5], // Monday - Friday (if adding lunch hours)
            start: '13:00',
            end: '17:00',
            }],
            selectConstraint: "businessHours",
            select: function(start, end, jsEvent, view) {
            if (start.isAfter(moment())) {

                var eventTitle = prompt("Provide Event Title");
                if (eventTitle) {
                $("#calendar").fullCalendar('renderEvent', {
                    title: eventTitle,
                    start: start,
                    end: end,
                    stick: true
                });
                alert('Appointment booked at: ' + start.format("h(:mm)a"));
                }
            } else {
                alert('Cannot book an appointment in the past');
            }
            },
            eventClick: function(calEvent, jsEvent, view) {
            alert('Event: ' + calEvent.title);
            },
            //test ล็อกการจองคิว
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
                },
            editable: true,
            // defaultView: 'month',
            events: SITEURL + "/fullcalendareventmaster",
            displayEventTime: true,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');
 
                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
 
                    $.ajax({
                        url: SITEURL + "/fullcalendareventmaster/create",
                        data: 'title=' + title + '&start=' + start + '&end=' + end,
                        type: "POST",
                        success: function (data) {
                            displayMessage("ยืนยันวันปิดทำการของคลินิกเรียบร้อยแล้ว");
                            $('#calendar').fullCalendar('removeEvents');
                            $('#calendar').fullCalendar('refetchEvents' );
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                    true
                            );
                }
                calendar.fullCalendar('unselect');
            },
             
            eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + '/fullcalendareventmaster/update',
                            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function (response) {
                                displayMessage("เลื่อนวันปิดทำการของคลินิกเรียบร้อยแล้ว");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("ยืนยันยกเลิกวันหยุด");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalendareventmaster/delete',
                        data: "&id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("ยกเลิกวันปิดทำการของคลินิกเรียบร้อยแล้ว");
                            }
                        }
                    });
                }
            }
        });
    });
 
    function displayMessage(message) {
        $(".response").css('display','block');
        $(".response").html(""+message+"");
        setInterval(function() { $(".response").fadeOut(); }, 4000);
    }
</script>

</html>
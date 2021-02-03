<html>
<head>
    <title>Calendar Userve</title>
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
            // height: 650,
            showNonCurrentDates: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            // editable: true,
            // defaultView: 'month',
            events: SITEURL + "/FullCalendarAppointment",
            displayEventTime: false, 
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
                var username = prompt('Name:');
 
                if (username) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
 
                    $.ajax({
                        url: SITEURL + "/FullCalendarAppointment/create",
                        data: 'username=' + username + '&start=' + start + '&end=' + end,
                        type: "POST",
                        success: function (data) {
                            displayMessage("ท่านได้ทำการจองสำเร็จแล้ว");
                            $('#calendar').fullCalendar('removeEvents');
                            $('#calendar').fullCalendar('refetchEvents' );
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                            {
                                title: username,
                                start: start,
                                end: end,
                                allDay: true
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
                            url: SITEURL + '/FullCalendarAppointment/update',
                            data: 'username=' + event.username + '&start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function (response) {
                                displayMessage("ท่านได้ทำการเลื่อนวันนัดเรียบร้อยแล้ว");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("ท่านต้องการยกเลิกวันนัดหรือไม่?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/FullCalendarAppointment/delete',
                        data: "&id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("ยกเลิกวันนัดเรียบร้อยแล้ว");
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
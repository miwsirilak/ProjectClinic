@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <html>

    <head>
        <title>Calendar Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
            integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    </head>

    <body style="background-color:#ffffff;">

        <div class="container mt-2">
            <div class="card" style="width: 68rem;">
                <div class="card-body">
                    <h5 class="card-title text-info">ข้อมูลการนัดหมายแพทย์</h5>
                    <div class="container">
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <a class="btn btn-success" href="/">กลับสู่หน้าหลัก</a>
                        </div> --}}
                        <br>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="response alert alert-success mt-2" style="display: none;"></div>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <script>
        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                // height: 650,
                height: 550,
                eventColor: 'pink',
                eventTextColor: 'black',
                showNonCurrentDates: false,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    // right: 'month,agendaWeek,agendaDay'
                    right: 'month,listYear'
                },
                // editable: true,
                // defaultView: 'month',
                events: SITEURL + "/fullcalendareventmaster",
                displayEventTime: false,
                editable: true,

                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },

                selectable: true,
                selectHelper: true,

                // select: function(start, end, allDay) {
                //     var title = prompt('Title:');

                //     if (title) {
                //         var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                //         var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                //         console.log(start);
                //         console.log(end);
                //         $.ajax({
                //             url: SITEURL + "/events",
                //             data: 'title=' + title + '&username=' + 'aa' + '&start=' + start +
                //                 '&end=' + end,
                //             type: "POST",
                //             // success: function(data) {
                //             //     displayMessage(
                //             //         "ยืนยันวันปิดทำการของคลินิกเรียบร้อยแล้ว");
                //             //     $('#calendar').fullCalendar('removeEvents');
                //             //     $('#calendar').fullCalendar('refetchEvents');
                //             // }
                //         });
                //         calendar.fullCalendar('renderEvent', {
                //                 title: title,
                //                 start: start,
                //                 end: end,
                //                 allDay: allDay
                //             },
                //             true
                //         );
                //     }
                //     calendar.fullCalendar('unselect');
                // },

                // eventDrop: function(event, delta) {
                //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                //     $.ajax({
                //         url: SITEURL + '/fullcalendareventmaster/update',
                //         data: 'title=' + event.title + '&start=' + start + '&end=' + end +
                //             '&id=' + event.id,
                //         type: "POST",
                //         success: function(response) {
                //             displayMessage("เลื่อนวันปิดทำการของคลินิกเรียบร้อยแล้ว");
                //         }
                //     });
                // },

                // eventClick: function(event) {
                //     var deleteMsg = confirm("ยืนยันยกเลิกวันหยุด");
                //     if (deleteMsg) {
                //         $.ajax({
                //             type: "POST",
                //             url: SITEURL + '/fullcalendareventmaster/delete',
                //             data: "&id=" + event.id,
                //             success: function(response) {
                //                 if (parseInt(response) > 0) {
                //                     $('#calendar').fullCalendar('removeEvents', event
                //                         .id);
                //                     displayMessage(
                //                         "ยกเลิกวันปิดทำการของคลินิกเรียบร้อยแล้ว");
                //                 }
                //             }
                //         });
                //     }
                // }
            });
        });

        // function displayMessage(message) {
        //     $(".response").css('display', 'block');
        //     $(".response").html("" + message + "");
        //     setInterval(function() {
        //         $(".response").fadeOut();
        //     }, 4000);
        // }

    </script>

    </html>

@endsection

@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <html>

    <head>
        <title>ปฏิทินวันหยุดของคลินิก</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
            integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    </head>



    <body>
        <div class="container mt-2">
            <div class="card" style="width: 68rem;">
                <div class="card-body">
                    <h5 class="card-title text-info">ตารางการทำงานของแพทย์</h5>
                    @if (Auth::user())
                        @if (Auth::user()->role === 'admin')
                            <div class="pull-right">
                                <a class="btn btn-warning" href="{{ route('workingdays.create') }}">เพิ่มวันหยุด</a>
                                {{-- <a class="btn btn-warning" href="{{ route('fullcalendarDates') }}">ปฎิทินการนัดหมายแพทย์</a> --}}
                            </div>
                        @endif
                    @endif

                    <br>
                    <div class="container">
                        <div class="response alert alert-success mt-2" style="display: none;"></div>
                        <div id='calendar'></div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="response alert alert-success mt-2" style="display: none;"></div>
            <div id='calendar'></div>
        </div> --}}

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
                height: 550,
                eventColor: 'red',
                eventTextColor: 'white',
                showNonCurrentDates: false,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                editable: true,
                events: SITEURL + "/fullcalendarworkingday",
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
                select: function(start, end, allDay) {
                    var title = prompt('เพิ่มวันหยุดการทำงาน');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                        $.ajax({
                            url: SITEURL + "/fullcalendarworkingday/create",
                            data: 'title=' + title + '&start=' + start + '&end=' + end,
                            type: "POST",
                            success: function(data) {
                                displayMessage("เพิ่มวันหยุดเรียบร้อยแล้ว");
                                $('#calendar').fullCalendar('removeEvents');
                                $('#calendar').fullCalendar('refetchEvents');
                            }
                        });
                        calendar.fullCalendar('renderEvent', {
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

                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + '/fullcalendarworkingday/update',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end +
                            '&id=' + event.id,
                        type: "POST",
                        success: function(response) {
                            displayMessage("เลื่อนวันหยุดเรียบร้อยแล้ว");
                        }
                    });
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("ท่านต้องการลบวันหยุดหรือไม่?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/fullcalendarworkingday/delete',
                            data: "&id=" + event.id,
                            success: function(response) {
                                if (parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    displayMessage("ลบวันหยุดเรียบร้อยแล้ว");
                                }
                            }
                        });
                    }
                }
            });
        });

        function displayMessage(message) {
            $(".response").css('display', 'block');
            $(".response").html("" + message + "");
            setInterval(function() {
                $(".response").fadeOut();
            }, 4000);
        }

    </script>

    </html>

@endsection

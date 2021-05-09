@extends('templete.templateadmin')

@section('title', 'Base page')
<title>Clinic</title>

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
                    right: 'month,listYear'
                },
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

            });
        });

    </script>

    </html>

@endsection

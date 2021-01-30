{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Start Date</title>
    <link href="http://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="jquery.datetimepicker.min.css" rel="stylesheet"/>
</head>
<body>

    <div class="container mt-5 mb-5" style="width: 400px">
        <h3>Date Picker</h3>
        <input type="text" id="picker" class="form-control">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="jquery.datetimepicker.full.min.js"></script>
    <script>
        $('#picker').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'Y-m-d', // formaDate
            value: '2021-23-1', // defauleDate
            weeks: true
        })
    </script>
    
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>How to Use Bootstrap Datetimepicker in Laravel - NiceSnippets.com</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="row" style="margin-top: 100px;">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>How to Use Bootstrap Datetimepicker in Laravel - NiceSnippets.com</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Bootstrap DateTimePicker</label>
                                <input type="text" class="form-control datetimepicker" name="Appointment_time"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $(function () {
            $('.datetimepicker').datetimepicker();
        });
    </script>
</body>
</html>
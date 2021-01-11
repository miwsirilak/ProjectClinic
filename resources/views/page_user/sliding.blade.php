@extends('templete.template')

@section('title', 'Base page')

@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #ececec;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<div class="container">
  <form action="/action_page.php">
    <h2>เลื่อนวันนัด</h2>
    <p>นาย ทัตเทพ  เดชาธร</p>
    <p>วันนัดเดิม : 19/09/2020</p>
    <p>ช่วงเวลานัดเดิม : ตรวจรักษาเวลา 15:00 - 16:00</p>
    <div class="row">
      <div class="col-25">
        <label for="fname">วันที่เลื่อน</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
      </div>
    </div>
    {{-- <div class="row">
      <div class="col-25">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
      </div>
    </div> --}}
    <div class="row">
      <div class="col-25">
        <label for="country">ช่วงเวลาที่เลื่อน</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
          <option value="ตรวจรักษาเวลา">ตรวจรักษาเวลา</option>
          <option value="ตรวจรักษาเวลา1">ตรวจรักษาเวลา 10:00 - 11:00</option>
          <option value="ตรวจรักษาเวลา2">ตรวจรักษาเวลา 11:00 - 12:00</option>
          <option value="ตรวจรักษาเวลา3">ตรวจรักษาเวลา 13:00 - 14:00</option>
          <option value="ตรวจรักษาเวลา4">ตรวจรักษาเวลา 14:00 - 15:00</option>
          <option value="ตรวจรักษาเวลา5">ตรวจรักษาเวลา 15:00 - 16:00</option>
        </select>
      </div>
    </div> <br><br>
    <div class="row">
      <div class="col-25">
        <label for="subject">หมายเหตุ</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="ระบุหมายเหตุ.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="บันทึก">
      {{-- <input type="submit" value="ยกเลิก"> --}}
      <a href="#" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">ยกเลิก</a>
    </div>
  </form>
</div>

</body>
</html>
@endsection
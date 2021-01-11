@extends('templete.template')

@section('title', 'Base page')

@section('content')

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #FFCCBC;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="/action_page.php">
  <div class="container">
    <h1>ลงทะเบียน</h1>
    <p style="color:red">สำหรับผู้ป่วยรายใหม่ที่ยังไม่ได้ทำการลงทะเบียน</p>
    <hr>
   
    <label for="email"><b>คำนำหน้าชื่อ</b></label>
    <input type="text" placeholder="คำนำหน้าชื่อ" name="email" id="email" required>

    {{-- <div class="form-group">
      <label for="disabledSelect">คำนำหน้าชื่อ</label>
      <select class="custom-select custom-select-lg mb-3">
        <option selected>เลือกคำนำหน้าชื่อ</option>
        <option value="1">เด็กชาย</option>
        <option value="1">เด็กหญิง</option>
        <option value="1">นาย</option>
        <option value="2">นาง</option>
        <option value="3">นางสาว</option>
      </select>
    </div> --}}

    <label for="email"><b>ชื่อ</b></label>
    <input type="text" placeholder="ชื่อ" name="email" id="email" required>

    <label for="psw"><b>นามสกุล</b></label>
    <input type="password" placeholder="นามสกุล" name="psw" id="psw" required>

    <label for="psw"><b>เลขบัตรประชาชน</b></label>
    <input type="password" placeholder="เลขบัตรประชาชน" name="psw" id="psw" required>

    <label for="psw"><b>เบอร์โทรศัพท์</b></label>
    <input type="password" placeholder="เบอร์โทรศัพท์" name="psw" id="psw" required>

    <label for="email"><b>E-mail</b></label>
    <input type="text" placeholder="E-mail" name="email" id="email" required>

    <hr>

    <button type="submit" class="registerbtn">ลงทะเบียน</button>
    <button type="button" class="btn btn-danger btn-lg btn-block">ยกเลิก</button>
  </div>
  
 
</form>

</body>
</html>


@endsection
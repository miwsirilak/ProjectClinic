@extends('templete.template')

@section('title', 'Base page')

@section('content')



      <div class="text-center">
        <form>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">วันที่นัด</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" id="inputPassword" placeholder="เลือกวันที่นัด">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">ช่วงเวลาที่นัด</label>
            <div class="col-sm-6">
            <select class="form-control" id="exampleFormControlSelect1">
              <option>ตรวจรักษาเวลา </option>
              <option>ตรวจรักษาเวลา 10:00 - 11:00 </option>
              <option>ตรวจรักษาเวลา 11:00 - 12:00 </option>
              <option>ตรวจรักษาเวลา 13:00 - 14:00 </option>
              <option>ตรวจรักษาเวลา 14:00 - 15:00 </option>
              <option>ตรวจรักษาเวลา 15:00 - 16:00 </option>
            </select>
            </div>
          </div>
          <br><br>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">อาการที่มาพบแพทย์</label>
            <div class="col-sm-6">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </div>
          <br><br>
          <div class="form-group row">
            <div class="col-sm-6">
              <button type="submit" class="btn btn-primary">บันทึก</button>
              <button type="submit" class="btn btn-primary">ยกเลิก</button>
            </div>
          </div>
        </form>
      </div> 
      
@endsection



             
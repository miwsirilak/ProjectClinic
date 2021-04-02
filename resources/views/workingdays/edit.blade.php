@extends('workingdays.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>แก้ไขวันหยุด</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('workingdays.index') }}"> กลับ</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>คำเตือน!</strong>มีปัญหาบางอย่างเกี่ยวกับข้อมูลที่คุณป้อน<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('workingdays.update',$workingday->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>หัวข้อ:</strong>
                    <input type="text" name="title" value="{{ $workingday->title }}" class="form-control" placeholder="หัวข้อ">
                </div>
            </div>
            <form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="party"><strong>วันที่:</strong>
                        <input type="date" value="{{ $workingday->date }}" name="date" class="form-control">
                    </label>
                </div>
            </form>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>รายละเอียด:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $workingday->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
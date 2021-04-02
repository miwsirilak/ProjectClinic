@extends('appointments.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>เลื่อนการนัดหมาย</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('appointments.index') }}"> Back</a>
            </div> --}}
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>คำเตือน!</strong> มีปัญหาบางอย่างเกี่ยวกับข้อมูลที่คุณป้อน<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('appointments.update',$event->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ชื่อ:</strong>
                    <input type="text" name="username" value="{{ $event->username }}" class="form-control" placeholder="ชื่อ">
                </div>
            </div>
            {{-- Time  --}}
            <form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="party"><strong>วันที่:</strong>
                        <input type="date" value="{{ $event->date }}" name="date" class="form-control">
                    </label>
                </div>
            </form>

            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>เวลา:</strong>
                <input type="time" id="inputMDEx1" value="{{ $event->time }}" name="time" class="form-control">
                <label for="form1" class=""></label> 
            </div> --}}
            {{-- Time  --}}
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>อาการที่มาพบแพทย์:</strong>
                    <textarea class="form-control" style="height:150px" name="sympotm" placeholder="อาการที่มาพบแพทย์">{{ $event->sympotm }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-danger" href="{{ route('appointments.index') }}"> Back</a>
            </div>
        </div>
   
    </form>
@endsection
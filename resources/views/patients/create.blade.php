@extends('patients.layout')

@section('title', 'Page Title')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>เพิ่มข้อมูลผู้ป่วย</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('patients.index') }}"> กลับ</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('patients.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชื่อ:</strong>
                <input type="text" name="fristname" class="form-control" placeholder="fristname">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>นามสกุล:</strong>
                    <input type="text" name="lastname" class="form-control" placeholder="lastname">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>เลขบัตรประชาชน:</strong>
                        <input type="text" name="idcard" class="form-control" placeholder="idcard">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>เบอร์โทร:</strong>
                            <input type="text" name="phone" class="form-control" placeholder="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>email:</strong>
                                <input type="text" name="email" class="form-control" placeholder="email">
                            </div>
                        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection
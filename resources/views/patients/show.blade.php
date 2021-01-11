@extends('patients.layout')

@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> แสดงข้อมูลผู้ป่วย</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('patients.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชื่อ:</strong>
                {{ $patient->fristname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>นามสกุล:</strong>
                {{ $patient->lastname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เลขบัตรประชาชน:</strong>
                {{ $patient->idcard }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เบอร์โทร:</strong>
                {{ $patient->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>email:</strong>
                {{ $patient->email }}
            </div>
        </div>
    </div>
@endsection
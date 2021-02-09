@extends('appointments.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show appointment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('appointments.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ชื่อ:</strong>
                {{ $event->username }}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>วันที่:</strong>
                    {{ $event->date }}
                </div>
            </div>
        {{-- <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>เวลา:</strong>
                    {{ $event->time }}
                </div>
            </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>อาการที่มาพบแพทย์:</strong>
                {{ $event->sympotm }}
            </div>
        </div>
    </div>
@endsection
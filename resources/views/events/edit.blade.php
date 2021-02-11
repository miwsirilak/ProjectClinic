@extends('events.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Event</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
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

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ชื่อ:</strong>
                    <input type="text" name="title" value="{{ $event->title }}" class="form-control" placeholder="Title">
                </div>
            </div>

            <form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="party"><strong>วันที่:</strong>
                        <input type="date" value="{{ $event->date }}" name="date" class="form-control">
                    </label>
                </div>
            </form>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>อาการ:</strong>
                    <textarea class="form-control" style="height:150px" name="sympotm"
                        placeholder="Sympotm">{{ $event->sympotm }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

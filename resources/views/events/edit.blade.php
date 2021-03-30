@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="container mt-2">

        {{-- <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>เลื่อนวันนัดหมาย</h2>
                </div>
            </div>
        </div> --}}

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
        
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>

        {{-- <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ชื่อ:</strong>
                        <input type="text" name="title" value="{{ $event->title }}" class="form-control"
                            placeholder="Title">
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
                    <button type="submit" class="btn btn-success">ยืนยันเลื่อนวันนัด</button>
                    <a class="btn btn-danger" href="{{ route('events.index') }}">กลับ</a>
                </div>
            </div>

        </form> --}}

        <div class="card">
            <h5 class="card-header text-white" style="background-color:#46a7a2;">เลื่อนวันนัดหมาย</h5>
            <div class="card-body" style="background-color:#e8ecec;">
                <form action="{{ route('events.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ชื่อ:</strong>
                                <input type="text" name="title" value="{{ $event->title }}" class="form-control"
                                    placeholder="Title">
                            </div>
                        </div>

                        <form>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="party"><strong>วันที่:</strong>
                                    <input type="date" value="{{ $event->date }}" name="date" class="form-control">
                                </label>

                                {{-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="booked" id="inlineRadio1" value="{{ $event->date }}">
                                    <label class="form-check-label" for="inlineRadio1">จองคิว</label>
                                </div> --}}

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="booked" id="booked"
                                        value="จองแล้ว" checked>
                                    <label class="form-check-label" for="booked">
                                        จองคิว
                                    </label>
                                </div>
                            </div>
                        </form>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>อาการ</strong>
                                <select class="form-control" id="exampleFormControlSelect1" name="sympotm">
                                    <option>{{ $event->sympotm }}<option>
                                    <option value="ไม่ระบุอาการ">ไม่ระบุอาการ</option>
                                    <option value="ผิวหนัง">ผิวหนัง</option>
                                    <option value="ผม">ผม</option>
                                    <option value="เล็บ">เล็บ</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>อาการ:</strong>
                                <textarea class="form-control" style="height:150px" name="sympotm"
                                    placeholder="Sympotm">{{ $event->sympotm }}</textarea>
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">ยืนยันเลื่อนวันนัด</button>
                            <a class="btn btn-danger" href="{{ route('events.index') }}">กลับ</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    @endsection

</div>

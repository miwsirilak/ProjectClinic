@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>กำหนดวันหยุด</h2>
            </div>
            {{-- <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('workingdays.index') }}">กลับ</a>
        </div> --}}
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


    <div class="container mt-2">

        <form action="{{ route('workingdays.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>หัวข้อ</strong>
                        <input type="text" name="title" class="form-control" placeholder="หัวข้อ">
                    </div>
                </div>
                <form>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="party"><strong>Date:</strong>
                            <input type="date" value="" name="date" class="form-control">
                        </label>
                    </div>
                </form>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>รายละเอียด:</strong>
                        <textarea class="form-control" style="height:150px" name="detail"
                            placeholder="รายละเอียด"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">ตกลง</button>
                    <a class="btn btn-danger" href="{{ route('workingdays.index') }}">กลับ</a>
                </div>
            </div>

        </form>
    @endsection

</div>

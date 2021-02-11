@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="container mt-2">

        {{-- <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>นัดหมายแพทย์</h2>
                </div>
            </div>
        </div> --}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>ดูเหมือนว่า!</strong> คุณมีปัญหาบางอย่างกับข้อมูลที่คุณป้อน<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ชื่อ:</strong>
                        <input type="text" name="title" class="form-control" placeholder="ชื่อ">
                    </div>
                </div>

                <form>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="party"><strong>วันที่:</strong>
                            <input type="date" value=" " name="date" class="form-control">
                        </label>
                    </div>
                </form>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>อาการ:</strong>
                        <textarea class="form-control" style="height:150px" name="sympotm" placeholder="อาการ"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                    <a class="btn btn-danger" href="{{ route('events.index') }}">กลับ</a>
                </div>
            </div>

        </form> --}}

        <div class="card">
            <h5 class="card-header text-white" style="background-color:#46a7a2;">นัดหมายแพทย์</h5>
            <div class="card-body" style="background-color:#e8ecec;">
                <form action="{{ route('events.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>ชื่อ:</strong>
                                <input type="text" name="title" class="form-control" placeholder="ชื่อ">
                            </div>
                        </div>

                        <form>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="party"><strong>วันที่:</strong>
                                    {{-- <input type="date" value="2021-01-01" name="date" class="form-control"> --}}
                                    <input type="date" value=" " name="date" class="form-control">
                                </label>
                            </div>
                        </form>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>อาการ:</strong>
                                <textarea class="form-control" style="height:150px" name="sympotm"
                                    placeholder="อาการ"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                            <a class="btn btn-danger" href="{{ route('events.index') }}">กลับ</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

    @endsection

</div>

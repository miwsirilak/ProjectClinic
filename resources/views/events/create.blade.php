@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="container mt-2">

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
        <br>
        
        @if (Auth::user())
            <div class="card">
                <h5 class="card-header text-white" style="background-color:#46a7a2;">นัดหมายแพทย์</h5>
                <div class="card-body" style="background-color:#e8ecec;">
                    <form action="{{ route('events.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ชื่อ:</strong>
                                    <input type="text" name="title" class="form-control" placeholder="ชื่อ"
                                        value="{{ Auth::user()->name }}">
                                </div>
                            </div>

                            <form>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <label for="party"><strong>วันที่:</strong>
                                        {{-- <input type="date" value="2021-01-01" name="date" class="form-control"> --}}
                                        <input type="date" value="" name="date" class="form-control" required>
                                        @error('date')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </label>

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
        @endif
       

    @endsection

</div>

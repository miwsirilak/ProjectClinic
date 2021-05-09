@extends('templete.templateadmin')

@section('title', 'Base page')
<title>Clinic</title>

@section('content')

    <div class="container mt-2">

        <div class="card text-info mb-3" style="max-width: 80rem; background-color:#d1dddc;">
            <div class="card-header bg-white">
                <h5>แก้ไขข้อมูล ({{ $user->role }})</h5>
            </div>
            <div class="card-body">

                <div class="card mb-3" style="max-width: 1100px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            {{-- @if (Auth::user()->name === $user->name) --}}
                            @if (Auth::user()->role === 'admin')
                                @if (Auth::user()->name === $user->name)
                                    <img src="{{ asset('img/doctors.PNG') }}" class="rounded mx-auto d-block" width="200"
                                        height="200">
                                @endif
                            @endif

                            @if (Auth::user()->role === 'user')
                                @if (Auth::user()->name === $user->name)
                                    <img src="{{ asset('img/Users.PNG') }}" class="rounded mx-auto d-block" width="200"
                                        height="200">
                                @endif
                            @endif
                        </div>
                        <div class="col-md-8">

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

                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-11">
                                        <div class="form-group">
                                            <strong>ชื่อ:</strong>
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                                placeholder="ชื่อ">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-11">
                                        <div class="form-group">
                                            <strong>อีเมล:</strong>
                                            <input type="email" name="email" value="{{ $user->email }}"
                                                class="form-control" placeholder="อีเมล">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-11">
                                        <div class="form-group">
                                            <strong>เบอร์โทรศัพท์:</strong>
                                            <input type="text" name="users_phone" value="{{ $user->users_phone }}"
                                                class="form-control" placeholder="เบอร์โทรศัพท์">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-11">
                                        <div class="form-group">
                                            <strong>เลขบัตรประชาชน:</strong>
                                            <input type="text" name="users_idcard" value="{{ $user->users_idcard }}"
                                                class="form-control" placeholder="เลขบัตรประชาชน">
                                        </div>
                                    </div>

                                    @if (Auth::user())
                                        @if (Auth::user()->role === 'admin')
                                            <div class="col-xs-12 col-sm-12 col-md-11">
                                                <div class="form-group">
                                                    <strong>สถานะ</strong>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                        {{ $user->role }}
                                                        <option value="user">user</option>
                                                        <option value="admin">admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    @if (Auth::user())
                                        @if (Auth::user()->role === 'user')
                                            <div class="col-xs-12 col-sm-12 col-md-11">
                                                <div class="form-group">
                                                    <strong>สถานะ</strong>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                        {{ $user->role }}
                                                        <option value="user">user</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    <div class="col-xs-12 col-sm-12 col-md-11 text-center">
                                        <button type="submit" class="btn btn-primary">บันทึก</button>
                                        <a class="btn btn-danger" href="{{ route('users.index') }}"> ย้อนกลับ</a>
                                    </div>
                                </div>

                            </form>
                            {{-- form --}}

                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

</div>

@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="container mt-2">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if (Auth::user())
            @if (Auth::user()->role === 'admin')

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h4>รายชื่อผู้ใช้งาน</h4>
                        </div>
                        {{-- <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New user</a>
                </div> --}}
                    </div>
                </div>

                <table class="table table-bordered">
                    <tr class="text-white" style="background-color:#46a7a2;">
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>อีเมล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>เลขบัตรประชาชน</th>
                        <th>สถานะ</th>
                        <th>แก้ไข | ลบ</th>
                        {{-- <th width="280px">แก้ไข | ลบ</th> --}}
                    </tr>
                    @foreach ($users as $user)
                        <tr style="background-color:#ffffff;">
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->users_phone }}</td>
                            <td>{{ $user->users_idcard }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                    {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}

                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">แก้ไข</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('ต้องการลบข้อมูลลบข้อมูลคนไข้หรือไม่ ?')" >ลบ</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $users->links() !!}
            @endif
        @endif

        {{-- โปรไฟล์คนไข้ --}}
        @foreach ($users as $user)
            @if (Auth::user()->role === 'user')
                @if (Auth::user()->name === $user->name)
                    <div class="card text-info mb-3" style="max-width: 80rem; background-color:#d1dddc;">
                        <div class="card-header bg-white">
                            <h5>ข้อมูลส่วนตัว</h5>
                        </div>
                        <div class="card-body">

                            <div class="card mb-3" style="max-width: 1100px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ asset('img/Users.PNG') }}" class="rounded mx-auto d-block"
                                            width="200" height="200">
                                        {{-- class="card-img" alt="..." --}}
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ Auth::user()->name }} ({{ $user->role }})</h5>
                                            <p class="card-text">อีเมล : {{ $user->email }}</p>
                                            <p class="card-text">โทร : {{ $user->users_phone }}</p>
                                            <p class="card-text">เลขบัตรประชาชน : {{ $user->users_idcard }}</p>
                                            <br><br>
                                            <div>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                                    {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}

                                                    <a class="btn btn-warning"
                                                        href="{{ route('users.edit', $user->id) }}">แก้ไข</a>

                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach

        {{-- โปรไฟล์คนไข้ --}}

    @endsection

</div>
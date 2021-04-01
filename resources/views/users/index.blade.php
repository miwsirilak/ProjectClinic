@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>รายชื่อผู้ป่วย</h4>
                </div>
                {{-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New user</a>
            </div> --}}
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr class="text-white" style="background-color:#46a7a2;">
                <th>ลำดับ</th>
                <th>ชื่อ-นามสกุล</th>
                <th>อีเมล</th>
                <th>เบอร์โทรศัพท์</th>
                <th>เลขบัตรประชาชน</th>
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
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                            {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}

                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">แก้ไข</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $users->links() !!}

    @endsection
</div>

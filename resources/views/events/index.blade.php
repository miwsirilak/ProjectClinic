@extends('templete.templateadmin')

@section('title', 'Base page')
<title>Clinic</title>

@section('content')

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left text-info">
                    <h3>ประวัติการนัดหมายแพทย์</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-Warning" href="{{ route('events.create') }}">นัดหมายแพทย์</a>

                    @if (Auth::user())
                        @if (Auth::user()->role === 'admin')
                            <a class="btn btn-info" href="{{ route('fullcalendarDates') }}">ปฎิทินการนัดหมายแพทย์</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <br>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {{-- การนัดหมายแพทย์ (สำหรับ Admin) --}}
        @if (Auth::user())
            @if (Auth::user()->role === 'admin')
                <table class="table table-bordered">
                    <tr class="text-white" style="background-color:#435D7D;">
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>อาการ</th>
                        <th>สถานะการจอง</th>
                        <th>วันที่</th>
                        <th width="280px">เลื่อนวันนัด | ยกเลิกวันนัด</th>
                    </tr>
                    @foreach ($events as $event)
                        <tr style="background-color:#ffffff;">
                            <td>{{ ++$i }}</td>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->sympotm }}</td>
                            <td>{{ $event->booked }}</td>
                            <td>{{ $event->date }}</td>
                            <td>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST">

                                    {{-- <a class="btn btn-info" href="{{ route('events.show', $event->id) }}">Show</a> --}}

                                    <a class="btn btn-primary"
                                        href="{{ route('events.edit', $event->id) }}">เลื่อนวันนัด</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('ท่านต้องการยกเลิกวันนัดใช่หรือไม่ ?')">ยกเลิกวันนัด</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        @endif
        {{-- การนัดหมายแพทย์ (สำหรับ Admin) --}}

        <br>
        {!! $events->links() !!}
        <br>

        {{-- ประวัติการนัดหมายแพทย์ (สำหรับผู้จอง) --}}
        @foreach ($events as $event)
            @if (Auth::user())
                @if (Auth::user()->name === $event->username)
                    <div class="card text-center" style="background-color:#ffffff;">
                        <div class="card-header text-white" style="background-color:#e99292;">
                            ประวัติการนัดหมายแพทย์
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-success">จองแล้ว</h5>
                            <h5 class="card-title">ชื่อ : {{ $event->title }}</h5>
                            <p class="card-text">อาการ : {{ $event->sympotm }}</p>
                            <p class="card-text">วันที่จอง : {{ $event->date }}</p>
                        </div>
                        <div class="card-footer text-muted" style="background-color:#e5e9e9;">
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}">เลื่อนวันนัด</a>

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('ท่านต้องการยกเลิกวันนัดใช่หรือไม่ ?')">ยกเลิกวันนัด</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endif
            <br>
        @endforeach
        {{-- ประวัติการนัดหมายแพทย์ (สำหรับผู้จอง) --}}

    @endsection

</div>

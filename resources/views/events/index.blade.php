@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="container mt-2">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>การนัดหมายแพทย์</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('events.create') }}">นัดหมายแพทย์</a>
                    <a class="btn btn-warning" href="{{ route('fullcalendarDates') }}">ปฎิทินการนัดหมายแพทย์</a>
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
        @if (Auth::user()) {{-- ถ้าไม่ login ก็จะไม่เห็น --}}
            @if (Auth::user()->role === 'admin') {{-- ถ้าตัวเองเป็นคนจอง ก็จะเห็นประวัติจองของทุกคน --}}
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

                                    <button type="submit" class="btn btn-danger">ยกเลิกวันนัด</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        @endif

        {!! $events->links() !!}
        {{-- การนัดหมายแพทย์ (สำหรับ Admin) --}}


        {{-- ประวัติการนัดหมายแพทย์ (สำหรับผู้จอง) --}}
        @foreach ($events as $event)
            @if (Auth::user()) {{-- ถ้าไม่ login ก็จะไม่เห็น --}}
                @if (Auth::user()->name === $event->username) {{-- ถ้าตัวเองเป็นคนจอง ก็จะเห็นประวัติตัวเองจอง --}}
                    <div class="card text-center" style="background-color:#fffbdb;">
                        <div class="card-header text-white" style="background-color:#eca3a3;">
                            ประวัติการนัดหมายแพทย์
                            {{-- {{ $event->username }} {{ Auth::user()->name }} --}}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-success">จองแล้ว</h5>
                            <h5 class="card-title">ชื่อ : {{ $event->title }}</h5>
                            <p class="card-text">อาการ : {{ $event->sympotm }}</p>
                            <p class="card-text">วันที่จอง : {{ $event->date }}</p>
                        </div>
                        <div class="card-footer text-muted" style="background-color:#eca3a3;">
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}">เลื่อนวันนัด</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">ยกเลิกวันนัด</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endif
            <br>
        @endforeach
        {{-- ประวัติการนัดหมายแพทย์ (สำหรับผู้จอง) --}}


        {{-- ประวัติการนัดหมายแพทย์ (สำหรับผู้ที่ไม่ได้จอง) --}}
        {{-- @if (Auth::user()) 
            @if (Auth::user()->role !== 'admin')
                @if (Auth::user()->name !== $event->username) 
                    <div class="card text-center" style="width: 67rem; height: 20rem;">
                        <div class="card-body">
                            <br><br><br><br><br>
                            <h5 class="card-title text-danger">ไม่มีประวัติการนัดหมายแพทย์</h5>
                        </div>
                    </div>
                    <br>
                @endif
            @endif
        @endif --}}
        {{-- ประวัติการนัดหมายแพทย์ (สำหรับผู้ที่ไม่ได้จอง) --}}

    @endsection

</div>

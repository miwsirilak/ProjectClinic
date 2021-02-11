@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ตารางนัดหมายแพทย์</h2>
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
   
    <table class="table table-bordered">
        <tr  class="text-white" style="background-color:#435D7D;">
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>อาการ</th>
            <th>วันที่</th>
            <th width="280px">เลื่อนวันนัด | ยกเลิกวันนัด</th>
        </tr>
        @foreach ($events as $event)
        <tr style="background-color:#ffffff;">
            <td>{{ ++$i }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->sympotm }}</td>
            <td>{{ $event->date }}</td>
            <td>
                <form action="{{ route('events.destroy',$event->id) }}" method="POST">
   
                    {{-- <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Show</a> --}}
    
                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">เลื่อนวันนัด</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">ยกเลิกวันนัด</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $events->links() !!}
      
@endsection

</div>
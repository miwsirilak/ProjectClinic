@extends('events.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ตารางนัดหมายแพทย์</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('events.create') }}">นัดหมายแพทย์</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>อาการ</th>
            <th>วันที่</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->sympotm }}</td>
            <td>{{ $event->date }}</td>
            <td>
                <form action="{{ route('events.destroy',$event->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('fullcalendarDates') }}">ปฎิทินการนัดหมายแพทย์</a>
    </div>
  
    {!! $events->links() !!}
      
@endsection
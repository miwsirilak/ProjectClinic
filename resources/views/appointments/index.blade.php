@extends('appointments.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>นัดหมายแพทย์</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('appointments.create') }}"> นัดหมายแพทย์</a>
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
            <th>ลำดับที่</th>
            <th>ชื่อ</th>
            <th>วันที่</th>
            <th>เวลา</th>
            <th>อาการที่มาพบแพทย์</th>
            <th width="280px">เลื่อนวันนัด | ยกเลิกวันนัด</th>
        </tr>
        @foreach ($appointments as $appointment)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $appointment->name }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>
            <td>{{ $appointment->sympotm }}</td>
            <td>
                <form action="{{ route('appointments.destroy',$appointment->id) }}" method="POST">
   
                    {{-- <a class="btn btn-info" href="{{ route('appointments.show',$appointment->id) }}">Show</a> --}}
    
                    <a class="btn btn-primary" href="{{ route('appointments.edit',$appointment->id) }}">เลื่อนวันนัด</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">ยกเลิกวันนัด</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $appointments->links() !!}
      
@endsection
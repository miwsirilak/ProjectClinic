@extends('patients.layout')
 
@section('title', 'Page Title')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>เพิ่มข้อมูลผู้ป่วย</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('patients.create') }}"> เพิ่มข้อมูล</a>
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
            <th>นามสกุล</th>
            <th>เลขบัตรประชาชน</th>
            <th>เบอร์โทร</th>
            <th>email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($patients as $patient)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $patient->fristname }}</td>
            <td>{{ $patient->lastname }}</td>
            <td>{{ $patient->idcard }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->email }}</td>
            <td>
                <form action="{{ route('patients.destroy',$patient->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('patients.show',$patient->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('patients.edit',$patient->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $patients->links() !!}
      
@endsection
@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4>กำหนดวันหยุด</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('workingdays.create') }}">เพิ่มวันหยุด</a>
                    <a class="btn btn-warning" href="{{ route('fullcalendarDates') }}">ปฎิทินการนัดหมายแพทย์</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <br>
        <table class="table table-bordered">
            <tr class="text-white" style="background-color:#e99292;">
                {{-- <th>ลำดับ</th> --}}
                <th>วันที่</th>
                <th>หัวข้อ</th>
                {{-- <th>รายละเอียด</th> --}}
                <th width="280px">ลบวันหยุด</th>
            </tr>
            @foreach ($workingdays as $workingday)
                <tr style="background-color:#ffffff;">
                    {{-- <td>{{ ++$i }}</td> --}}
                    <td>{{ $workingday->date }}</td>
                    <td>{{ $workingday->title }}</td>
                    {{-- <td>{{ $workingday->detail }}</td> --}}
                    <td>
                        <form action="{{ route('workingdays.destroy', $workingday->id) }}" method="POST">

                            {{-- <a class="btn btn-info" href="{{ route('workingdays.show',$workingday->id) }}">Show</a> --}}

                            {{-- <a class="btn btn-primary"
                                href="{{ route('workingdays.edit', $workingday->id) }}">แก้ไขวันหยุด</a> --}}


                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">ยกเลิกวันหยุด</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $workingdays->links() !!}

    @endsection

</div>

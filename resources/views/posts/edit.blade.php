@extends('templete.templateadmin')

@section('title', 'Base page')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-2">

    <div class="card border-info bg-light mb-3 " style="max-width: 120rem;">
        <div class="card-header text-info bg-muted" ><h4>แก้ไขโพสต์</h4></div>
        <div class="card-body text-info" >
            {{-- <h5 class="card-title">Success card title</h5> --}}
            @if (session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>หัวเรื่อง:</strong>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                                placeholder="หัวเรื่อง...">
                            @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>เนื้อเรื่อง:</strong>
                            <textarea class="form-control" style="height:150px" name="description"
                                placeholder="เนื้อเรื่อง...">{{ $post->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>รูปภาพ:</strong>
                            <input type="file" name="image" class="form-control" placeholder="Post Title">
                            @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ Storage::url($post->image) }}" height="200" width="200" alt="" />
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary ml-3">ตกลง</button>
                        <a class="btn btn-danger" href="{{ route('posts.index') }}" enctype="multipart/form-data">
                            กลับ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>

@endsection

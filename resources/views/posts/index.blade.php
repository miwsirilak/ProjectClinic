<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    {{-- test --}}
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
    {{-- test --}}
</head>
<body>

    <div class="container mt-2">
    
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Post</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> เพิ่มความรู้หรือข่าวสาร</a>
                </div>
            </div>
        </div>
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
       
        {{-- <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td><img src="{{ Storage::url($post->image) }}" height="75" width="75" alt="" /></td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
        
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table> --}}

        {{-- test --}}
        <div class="container">
            @foreach ($posts as $post)
            <div class="well">
                <div class="media">
                    <a class="pull-left" href="#">
                      <img class="media-object" src="{{ Storage::url($post->image) }}" height="168" width="300">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">{{ $post->title }}</h4>
                    <p class="text-right"><a href="https://www.w3schools.com/">เพิ่มเติม...</a></p>
                    <p>{{ $post->description }}</p>
                    <ul class="list-inline list-unstyled">
                        <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                      <li>|</li>
                      <span><i class="glyphicon glyphicon-time"></i> 2 hours</span>
                      <li>|</li>
                      </ul>
                      
                      <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
        
                        <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
       
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                 </div>
              </div>
            </div>
            @endforeach
          </div>
          
        {{-- test --}}
      
        {!! $posts->links() !!}
    
    </body>
</html>
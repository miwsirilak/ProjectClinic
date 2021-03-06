{{-- post --}}
<div class="container mt-2">
    <div class="row">
        @if (Auth::user())
            @if (Auth::user()->role === 'admin')
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        {{-- <h2>Post</h2> --}}
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('posts.create') }}">
                            เพิ่มความรู้หรือข่าวสาร</a>
                    </div>
                </div>
            @endif
        @endif
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="card border-success">
            <h5 class="card-header ">ความรู้ข่าวสาร</h5>
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ Storage::url($post->image) }}" class="card-img" alt="..." height="200"
                            width="300">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
                            @if (Auth::user())
                                @if (Auth::user()->role === 'admin')
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        <a class="btn btn-primary"
                                            href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('ท่านต้องการลบความรู้ข่าวสารใช่หรือไม่ ?')">ยกเลิกวันนัด</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endforeach
    {{-- {!!  $posts->links() !!} --}}
    {{-- post --}}

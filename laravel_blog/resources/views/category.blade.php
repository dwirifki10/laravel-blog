@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <a href="{{route('public')}}">
                <button type="button" class="btn btn-primary btn-sm mr-2"><i class="fa fa-exchange mr-1" aria-hidden="true"></i> Filter</button>
            </a>
            @foreach ( $categories as $category )
                <a href="{{route('category', $category->id)}}"><button type="button" class="btn btn-light text-secondary btn-sm">{{ $category->tag }}</button></a>
            @endforeach
        </div>
    </div>
     @if ($posts->isEmpty())
        <div class="alert alert-info col-lg-12 text-center mt-3" role="alert">
            Belum ada post yang dibuat. Post tidak ditemukan
        </div>
    @endif
    @if ($posts->isNotEmpty())
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="card-group">
                    @foreach ( $posts as $post )
                    <div class="col-lg-4">
                        <a href="{{ route('detail', $post->id) }}" class="text-decoration-none text-dark">
                        <div class="card mb-3">
                            <img src="{{asset('storage/' . $post->photo)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($post->slug), 100, '...') !!}</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small>
                        </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <span class="d-flex justify-content-center">{{ $posts->links() }}</span>
        </div>
        <div class="col-lg-2">
            <div class="card" style="width: 18rem;">
            <div class="card-header text-secondary font-weight-bold">
                Popular Post
            </div>
            <ul class="list-group list-group-flush">
                @foreach ( $posts as $post )
                    <a href="{{ route('detail', $post->id)  }}" style="cursor: pointer; text-decoration: none;" class="text-secondary"><li class="list-group-item">{{ $post->title }}</li></a>
                @endforeach
            </ul>
            </div>
        </div>
    </div>
</div>
@endif
@endsection


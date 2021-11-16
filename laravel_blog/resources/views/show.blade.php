@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <img class="card-img-top" width="700" height="500" src="{{asset('storage/' . $post->photo)}}" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title"><strong>{{ $post->title }}</strong></h4>
                        <i class="fa fa-star mb-3 text-warning" aria-hidden="true"></i><span class="text-secondary">    {{ ($post->starPost->avg('value') === null ) ? 0 : $post->starPost->avg('value')  }}</span>
                        <i class="fa fa-street-view ml-3" aria-hidden="true"></i><span class="text-secondary ml-1">{{ $post->views }}</span>
                        <i class="fa fa-user ml-3" aria-hidden="true"></i><span class="text-secondary ml-1">{{ $post->userPost->name }}</span>
                        @if(!is_null(Auth::user()))
                            <a class="ml-3" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Berikan Penilaian</span></a>
                        @endif
                        <p class="card-text">
                            {!! $post->slug !!}
                        </p>
                        <p class="card-text"><small class="text-muted">Last updated {{$post->updated_at->diffForHumans()}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 mb-4">
            <div class="card" style="width: 18rem;">
            <div class="card-header text-secondary font-weight-bold">
                Popular Post
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($popular as $pop)
                    <a href="{{ route('detail', $pop->id) }}" style="cursor: pointer; text-decoration: none;" class="text-secondary"><li class="list-group-item">{{ $pop->title }}</li></a>
                @endforeach
            </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        @if ($post->commentPost->isNotEmpty())
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                <div class="col-lg-12">
                    @foreach ($post->commentPost as $data)
                    <blockquote class="mb-3">
                        <h6><strong>{{ $data->userComment->name }}</strong></h6>
                        <p class="mb-0">{{ $data->comment }}</p>
                        <button class="btn btn-link text-decoration-none" onclick="myFunction({{$data->id}}, '{{$data->userComment->name}}')">Reply</button>
                    </blockquote>
                    @foreach ( $data->child as $row)
                    <blockquote class="ml-3">
                        <h6><strong>{{ $row->userComment->name }}</strong></h6>
                        <p class="mb-0">{{ $row->comment }}</p>
                        <button class="btn btn-link text-decoration-none" onclick="myFunction({{$row->id}}, '{{$row->userComment->name}}')">Reply</button>
                    </blockquote>
                    @endforeach
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($post->commentPost->isEmpty())
            <div class="alert alert-info col-lg-12 text-center mt-3" role="alert">
                Belum ada komentar. Komentar tidak ditemukan
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error )
                <p class="mb-0"><strong>{{ $error }}</strong></p>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    @if (!is_null(Auth::user()))
    <form action="{{route('comment', $post->id)}}" method="POST">
        @csrf
        <input type="hidden" class="form-control" name="user" id="dataForm1" value="{{ __(Auth::user()->id) }}">
        <input type="hidden" class="form-control" name="parent" id="dataForm2">
        <div class="form-group">
            <label for="dataForm3"><strong class="ml-1">Reply</strong></label>
            <input type="text" class="form-control" id="dataForm3" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1"><strong class="ml-1">Komentar</strong></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endif

@if (is_null(Auth::user()))
    <div class="alert alert-warning col-lg-12 text-center mt-3" role="alert">
        Login terlebih dahulu sebelum membuat komentar
    </div>
@endif

@if (!is_null(Auth::user()))
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Berikan Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {{-- Modal --}}
      <div class="modal-body">
        <form method="POST" action="{{route('star')}}">
            @csrf
            <input type="hidden" value="{{$post->id}}" name="post_id">
            <input type="hidden" value="{{ __(Auth::user()->id) }}" name="user_id">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Berikan Nilai</label>
                <select class="form-control" id="exampleFormControlSelect1" name="value" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            </div>
        <div class="modal-footer mb-3">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
         </form>
      </div>
    </div>
  </div>
</div>
@endif

<script>
    function myFunction(data, username) {
        document.getElementById("dataForm2").value = data;
        document.getElementById("dataForm3").value = username;
        console.log(data, username);
    }
</script>
@endsection

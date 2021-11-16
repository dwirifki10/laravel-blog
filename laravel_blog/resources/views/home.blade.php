@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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

                    <div class="media">
                    <img class="align-self-start mr-3 rounded-circle" style="width: 75px; height: 75px;" src="{{ (__(Auth::user()->photo) === null) ? asset('default/default.jpg') : asset('storage/'. __(Auth::user()->photo)) }}" alt="Generic placeholder image">
                    <div class="media-body">
                        <a class="float-right" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-pencil text-dark"></i> <span class="text-secondary">Ubah data</span></a>
                        <h5 class="mt-0"><strong>{{ __(Auth::user()->name) }}</strong></h5>
                        <i class="fa fa-star text-warning" aria-hidden="true"></i> <span class="text-secondary">{{(__(Auth::user()->starUser->avg('value')) === null) ? 0 : __(Auth::user()->starUser->avg('value')) }}</span>
                        <i class="fa fa-map-marker text-dark ml-2" aria-hidden="true"></i> <span class="text-secondary">{{ __(Auth::user()->address) }}</span>
                        <p>{{__(Auth::user()->status)}}</p>
                    </div>
                    </div>

                    <h4 class="mt-5 text-secondary">Likes & Viewers</h4>
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Views</h5>
                            <h3 class="card-text">{{$posts->sum('views')}}</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated {{ Carbon\Carbon::now()->diffForHumans() }}</small>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Likes</h5>
                            <h3 class="card-text">{{__(Auth::user()->starUser->count('id'))}}</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated {{ Carbon\Carbon::now()->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-4 text-secondary">Popular Post</h4>
                        <div class="card-deck">
                        @foreach ( $posts as $post )
                        <div class="card">
                            <img src="{{asset('storage/' . $post->photo)}}" alt="">
                            <div class="card-body">
                            <h5 class="card-title">{{ $post->title}}</h5>
                            <p class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($post->slug), 100, '...') !!}</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated {{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {{-- Modal --}}
      <div class="modal-body">
        <form method="POST" action="{{ route('status') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" name="photo">
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $photo }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                               <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="new-password">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <textarea id="status" class="form-control" name="status" required autocomplete="new-status"></textarea>
                            </div>
                        </div>
                </div>
            <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Save changes</button>
         </form>
      </div>
    </div>
  </div>
</div>
@endsection

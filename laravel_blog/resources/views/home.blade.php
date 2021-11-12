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

                    <strong>{{ __('Selamat Datang ' . Auth::user()->name)  }}</strong>
                    <h4 class="mt-4 text-secondary">Likes & Watchs</h4>
                    <div class="card-group">
                    @for ($i = 1; $i <= 2; $i++)
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Likes</h5>
                            <h3 class="card-text">{{$i}}</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    @endfor
                    </div>
                    <h4 class="mt-4 text-secondary">Popular Post</h4>
                    <div class="card-group">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">JavaScript</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                        </div>
                    @endfor
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

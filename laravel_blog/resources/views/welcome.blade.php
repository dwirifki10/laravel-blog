@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <button type="button" class="btn btn-primary btn-sm mr-2"><i class="fa fa-exchange mr-1" aria-hidden="true"></i> Filter</button>
            @for ($i = 1; $i <= 5; $i++)
                <button type="button" class="btn btn-light text-secondary btn-sm">Kategori {{$i}}</button>
            @endfor
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                @for ($i = 1; $i <= 6; $i++)
                <div class="col-lg-4">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{asset('photo/taylor_swift.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">Mengenal JavaScript</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        <div class="col-lg-2">
            <div class="card" style="width: 18rem;">
            <div class="card-header text-secondary font-weight-bold">
                Popular Post
            </div>
            <ul class="list-group list-group-flush">
                @for ($i = 1; $i <= 5; $i++)
                    <a href="" style="cursor: pointer; text-decoration: none;" class="text-secondary"><li class="list-group-item">Cras justo odio</li></a>
                @endfor
            </ul>
            </div>
        </div>
    </div>
</div>
@endsection


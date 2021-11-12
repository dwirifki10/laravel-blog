@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('List Blog Terdaftar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <table class="table">
                    <thead>
                        <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row" class="text-center">1</th>
                        <td class="text-center">
                            <img src={{asset('images/polije.png')}} width="35">
                        </td>
                        <td>Mengenal Bahasa Go-lang</td>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere, nam, <a href="" class="badge badge-success">Detail</a></td>
                        <td>
                            <a href="" class="badge badge-danger w-100">Hapus</a>
                            <a href="" class="badge badge-warning w-100">Ubah</a>
                        </td>
                        </tr>
                    </tbody>
                <table
            </div>
        </div>
    </div>
</div>
@endsection


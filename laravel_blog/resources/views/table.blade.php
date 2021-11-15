@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('List Blog Terdaftar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <span>Jumlah Post : {{ $posts->total() }}</span><br>
                <span>Data per Halaman : {{ $posts->perPage() }}</span>

                <div style="overflow-x:auto;">
                <table class="table mt-3">
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
                        @foreach ( $posts as $index => $post )
                        <tr>
                        <th scope="row" class="text-center">{{ $index + 1 }}</th>
                        <td class="text-center">
                            <img src="{{ url('/') . Storage::url($post['photo']) }}" width="35">
                        </td>
                        <td>{{ $post['title'] }}</td>
                        <td> {!! \Illuminate\Support\Str::limit($post['slug'], 200, $end='...') !!}
                            <a href="#" class="badge badge-success">Detail</a>
                        </td>
                        <td>
                            <a href="{{route('delete' , $post['id'])}}" class="badge badge-danger w-100" onclick="return confirm('Apakah kamu yakin ?')">Hapus</a>
                            <a href="{{route('show' , $post['id'])}}" class="badge badge-warning w-100">Ubah</a>
                        </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Update Data Blog') }}</div>

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

                <form method="POST" action="{{route('update', $post['id'])}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Post</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : Membuat Program Go-lang" value="{{$post->title}}">
                    </div>
                    <div class="mt-4 mb-2">
                         <img src="{{url('/') . Storage::url($post->photo)}}" width="100">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Pilih Gambar</label>
                        <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Kategori</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                           @foreach ($categories as $category)
                                <option value="{{$category['id']}}" {{ ($post->categoryPost->id === $category['id']) ? 'selected' : '' }}>
                                    {{$category['tag']}}
                                </option>
                           @endforeach
                        </select>
                    </div>
                    <div>
                        <textarea id="content" name="slug" class="form-control" rows="10" cols="50">{{$post->slug}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Selesai</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
   var konten = document.getElementById("content");
     CKEDITOR.replace(konten,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
@endsection


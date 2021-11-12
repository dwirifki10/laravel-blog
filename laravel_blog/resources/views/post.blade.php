@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Tambah Data Blog') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <form>
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Post</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : Membuat Program Go-lang">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Pilih Gambar</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Kategori</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                           @for ($i = 1; $i <= 3; $i++)
                               <option>Default select</option>
                           @endfor
                        </select>
                    </div>
                    <div>
                        <textarea id="content" class="form-control" name="konten" rows="10" cols="50"></textarea>
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


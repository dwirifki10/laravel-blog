@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <img class="card-img-top" width="700" height="500" src="{{asset('photo/taylor_swift.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                        <h4 class="card-title"><strong>Pemrograman Javascript : Langkah Awal Belajar Javascript</strong></h4>
                        <i class="fa fa-star mb-3 text-warning" aria-hidden="true"></i><span class="text-secondary"> 5</span>
                        <i class="fa fa-street-view ml-3" aria-hidden="true"></i><span class="text-secondary ml-1">1000</span>
                        <i class="fa fa-user ml-3" aria-hidden="true"></i><span class="text-secondary ml-1">Taylor Swift</span>
                        <a href="" class="ml-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span> Berikan Penilaian</span></a>
                        <p class="card-text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, ipsa molestiae quas iusto minima eum pariatur quisquam iste aperiam modi repudiandae? Eius maiores ratione officiis earum obcaecati dolore dolorum! Rerum!
                        </p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
                @for ($i = 1; $i <= 5; $i++)
                    <a href="" style="cursor: pointer; text-decoration: none;" class="text-secondary"><li class="list-group-item">Cras justo odio</li></a>
                @endfor
            </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                <div class="col-lg-12">
                    <blockquote class="mb-3">
                        <h6><strong>Taylor Swift</strong></h6>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, quidem. Non, labore ducimus. In quasi nesciunt, molestias suscipit sed pariatur illo labore, eligendi esse praesentium repellat facere corrupti fugiat ad!</p>
                        <button class="btn btn-link text-decoration-none" onclick="myFunction({{1}}, '{{'Taylor Swift'}}')">Reply</button>
                    </blockquote>
                    <blockquote class="ml-3">
                        <h6><strong>Ryan Dahl</strong></h6>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. At exercitationem, illum aspernatur voluptatum quis blanditiis recusandae natus, atque, eum tempore delectus. Vero corrupti fugit sed ea quasi optio itaque nemo?</p>
                        <button class="btn btn-link text-decoration-none" onclick="myFunction({{2}}, '{{'Ryan Dahl'}}')">Reply</button>
                    </blockquote>
                    </div>
                </div>
            </div>
        </div>
    @if (!is_null(Auth::user()))
        <div class="form-group">
            <input type="hidden" class="form-control" id="dataForm1" value="{{ Auth::user()->id}}" disabled>
            <input type="hidden" class="form-control" id="dataForm2" disabled>
        </div>
        <div class="form-group">
            <label for="dataForm3"><strong class="ml-1">Reply</strong></label>
            <input type="text" class="form-control" id="dataForm3" disabled>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1"><strong class="ml-1">Komentar</strong></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
@endif

@if (is_null(Auth::user()))
    <div class="alert alert-warning col-lg-12 text-center" role="alert">
        Please Login first if you want to post a comment
    </div>
@endif

{{-- Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Berikan Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Berikan Nilai</label>
                <select class="form-control" id="exampleFormControlSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
        </form>
      </div>
      <div class="modal-footer mb-3">
        <button type="button" class="btn btn-secondary mt-4" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary mt-4">Kirim</button>
      </div>
    </div>
  </div>
</div>

<script>
    function myFunction(data, username) {
        document.getElementById("dataForm2").value = data;
        document.getElementById("dataForm3").value = username;
    }
</script>
@endsection

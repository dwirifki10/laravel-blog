<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Web Competency - Login</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset("default/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset("default/css/sb-admin-2.min.css") }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 font-weight-bold">LARABLOG</h1>
                                        <h6 class="mb-4">Silahkan Login Terlebih Dahulu Sebagai Admin</h6>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukan Username Anda...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukan Password Anda...">
                                        </div>
                                        <a href="/admin/1" class="btn btn-primary btn-user btn-block">
                                            <span class="h6">Masuk</span>
                                        </a>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset("default/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("default/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset("default/vendor/jquery-easing/jquery.easing.min.js") }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset("default/vendor/jquery-easing/jquery.easing.min.js") }}"></script>

</body>
</html>
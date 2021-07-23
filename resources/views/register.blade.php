<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <link href="{{ asset("assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset("assets/css/sb-admin-2.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/css/bacod-admin.css") }}" rel="stylesheet">
</head>
<body class="bacod-absensi-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bacod-login-img" style="background: url('{{ asset("assets/img/login.jpg") }}')"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    {{-- Alert --}}
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-styled-left alert-arrow-left alert-component content-group-lg">
                                                {{ $error }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            @endforeach
                                        @endif

                                        @if (Session::has('success'))
                                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-component content-group-lg">
                                            {{ Session::get('success') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    {{-- EndAlert --}}
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register!</h1>
                                    </div>
                                    <form class="user" method="POST" action="/register" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="name" placeholder="Enter Fullname..." name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
                                        </div>
                                        <div class="form-group">
                                            <label for="avatar">Profile Photo</label>
                                            <input type="file" class=""
                                                id="avatar" placeholder="Choose file" name="avatar">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <h6> 
                                            Sudah punya akun? 
                                            <a class="small" href="{{ route('login') }}">Login</a>
                                        </h6>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset("assets/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset("assets/vendor/jquery-easing/jquery.easing.min.js")}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset("assets/js/sb-admin-2.min.js")}}"></script>

</body>

</html>
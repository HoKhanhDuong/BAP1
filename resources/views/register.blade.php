<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-design-blocks/2.0.0/css/froala_blocks.min.css">
</head>

<body>

<section class="fdb-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-5 text-center">
                <form action="{{route('Register')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="fdb-box">
                        <div class="row">
                            <div class="col">
                                <h1>Đăng ký tài khoản</h1>
                            </div>
                        </div>
{{--                        <div class="row mt-4">--}}
{{--                            <div class="col">--}}
{{--                                <input type="text" class="form-control" name="nickname" placeholder="Nick name" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row mt-4">
                            <div class="col">
                                <input type="text" class="form-control" name="full_name" placeholder="Họ và tên" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <input type="text" class="form-control" name="email" placeholder="email" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <input type="password" class="form-control mb-1" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <input type="file" class="form-control mb-1" name="avatar" id="avatar" placeholder="avatar" required>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="col">
                                <a href="{{route('login')}}" >Đăng nhập</a>
                            </div>
                            <div class="col d-block">
                                <button class="btn btn-outline-secondary" type="submit">Đăng ký</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

</body>
</html>

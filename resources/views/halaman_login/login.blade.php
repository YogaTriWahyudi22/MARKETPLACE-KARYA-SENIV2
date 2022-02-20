<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Marketplace | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('halaman_admin.pembagian_template.css')

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <span><b>MarketPlace</b>Karya Seni</span>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="width: 30rem; margin-left:-50px; height:20rem">
            <div class="card-body login-card-body">
                <p class="login-box-msg"></p>

                <form action="{{ route('proses_login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" placeholder="email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mb-5">
                        <button type="submit" class="btn btn-primary btn-block mb-2">Sign In</button>
                        <a href="{{ route('register') }}"> Register Page</a>
                    </div>
            </div>
            </form>

            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-card-body -->
    </div>

</body>

</html>

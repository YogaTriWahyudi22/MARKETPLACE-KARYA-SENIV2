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

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <span><b>MarketPlace</b>Karya Seni</span>
        </div>

        <div class="card" style="width: 30rem; margin-left:-50px;">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('proses_register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Inputkan Nama Lengkap"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nohp" placeholder="Nomor Hp" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <textarea class="form-control" name="alamat" placeholder="alamat" id="floatingTextarea"
                            required></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-control" name="status" aria-label="Default select example">
                            <option selected>Register Sebagai</option>
                            <option value="toko">Toko</option>
                            <option value="user">Pelanggan</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>

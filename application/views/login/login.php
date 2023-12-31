<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AJUMAS Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>style1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('') ?>style1/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class=" col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg">
                                <div class="p-5">
                                    <center>
                                        <img src="<?php echo base_url()?>assets/ajumas.png" class="d-block w-80"
                                            alt="..." style="height: 190px">
                                    </center>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        <?php echo $this->session->flashdata('pesan');
                                         ?>
                                    </div>
                                    <form class="user" action="<?php echo base_url('login/proses') ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" name="userid" class="form-control 
                                                id=" exampleInputEmail aria-describedby="emailHelp"
                                                placeholder="masukan monor hp/user id...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control  
                                            id=" exampleInputPassword placeholder="Password">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block"><i
                                                class="fas fa-sign-in-alt"></i>
                                            Masuk
                                        </button>
                                        <hr>
                                        <button type="reset" class="btn btn-danger btn-user btn-block">
                                            Batal
                                        </button>
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="<?php echo base_url('login/lupa_password') ?>">Lupa
                                            Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small"
                                            href="<?php echo base_url('login/daftar_pengguna_jasa') ?>">Buat
                                            akun Pengguna Jasa!</a>
                                        <br>
                                        <a class="small"
                                            href="<?php echo base_url('login/daftar_penyedia_jasa') ?>">Buat
                                            akun penyedia Jasa!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="<?php echo base_url('') ?>style/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('') ?>style1/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('') ?>style1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('') ?>style1/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('') ?>style1/js/sb-admin-2.min.js"></script>

</body>

</html>
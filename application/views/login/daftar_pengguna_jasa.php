<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Sebagai Pengguna </title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>style1/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="<?php echo base_url('') ?> style1/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url('') ?>style1/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                            <div class="col-lg">
                                <div class="p-5">
                                    <center>
                                        <img src="<?php echo base_url()?>assets/ajumas.png" class="d-block w-80"
                                            alt="..." style="height: 190px">
                                    </center>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat akun Pengguna jasa!</h1>
                                        <?php echo $this->session->flashdata('pesan'); ?>
                                    </div>
                                    <form class="user"
                                        action="<?php echo base_url('login/proses_daftar_pengguna_jasa') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="nama_pengguna" class="form-control"
                                                    id="exampleFirstName" placeholder="Nama" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select type="text" id="" name="jk" class="form-control custom-select"
                                                    required>
                                                    <option value="">Pilih Gender</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alamat" class="form-control" id="exampleInputEmail"
                                                placeholder="Alamat" required>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="tempat_lahir" class="form-control"
                                                    id="exampleFirstName" placeholder="Tempat Lahir" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="date" name="tanggal_lahir" class="form-control"
                                                    id="exampleFirstName" placeholder="Tanggal Lahir" required>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="no_hp" class="form-control"
                                                    id="exampleFirstName" placeholder="nomor Hp" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="file" name="foto" class="form-control"
                                                    id="exampleFirstName" placeholder="foto">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"><i
                                                class="fas fa-sign-in-alt"></i>
                                            Daftar Akun
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-user btn-block">
                                            Batal
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="forgot-password.html">Lupa Password?</a> -->
                                        <!-- <a class="small" href="<?php echo base_url('lupa_password') ?>">Lupa Password?</a> -->
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('login') ?>">Anda mempunyai akun?
                                            Login!</a>
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
    <script src="<?php echo base_url('') ?>style/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url('') ?>style1/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('') ?>style1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('') ?>style1/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('') ?>style1/js/sb-admin-2.min.js"></script>

</body>

</html>
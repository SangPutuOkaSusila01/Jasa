<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="<?php echo base_url('') ?>style1/footer/styles.css" rel="stylesheet">
    <link href="<?php echo base_url('') ?>style1/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Homepage</title>
</head>

<body>
    <div class="panel panel-default">
        <div class="panel-body">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <d class="navbar-brand"><i class="bi-box-seam"></i><a href="#putu" style="text-decoration: none"
                            class="text-white">Ajumas</a></d>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href=""><i class="bi-house-door"></i> Home<span
                                    class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link active" href="#oka"><i class="bi-house-door"></i> Pesan
                                Jasa<span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link active" href="<?php echo base_url('login')?>"><i
                                    class="bi-house-door"></i> Gabung Jasa<span class="sr-only">(current)</span></a>

                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Data
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href=""><i class="bi-person-bounding-box"></i> Lihat
                                        Kontak</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href=""><i class="bi-person-plus-fill"></i> Tambah
                                        Kontak</a>
                                </div>
                            </li> -->
                            <!-- <div class="dropup">
                                <a class="nav-item nav-link disabled" href="#">About</a>
                            </div> -->
                            <div class="dropup">
                                <a class="nav-item nav-link active" href="<?php echo base_url('login')?>"><i
                                        class="bi-box-arrow-right"></i>
                                    Login</a>
                            </div>
                        </div>



                    </div>
                </div>
            </nav>
        </div>
    </div>
    <br>
    <br>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src=" <?php echo base_url()?>assets/carousel.jpg" class="d-block w-100" alt="..."
                    style="height: 370px">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url()?>assets/bg_ajumas.jpg" class="d-block w-100" alt="..."
                    style="height: 370px">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url()?>assets/bg_ajumass.jpg" class="d-block w-100" alt="..."
                    style="height: 370px">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                </div>
            </div>
        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> -->
    </div>
    <div class="mt-5" id="oka">
        <div class="container-fluid">
            <div class="row text-center align-items-center mt-4">
                <div class="col-12">
                    <h3 class="mt-2"><b>Layanan jasa tersedia untuk anda</b> </h3>
                    <small>Ajumas menyediakan jasa segala macam sesuai kebutuhan</small>
                </div>

            </div>
            <br>
            <div class="row text-dark mt-4 mb-2">
                <?php 
            foreach($penyedia as $pj){
             ?>
                <div class="col-sm-3 g-4 mb-3">
                    <div class="card">
                        <div class="card-body">

                            <div class="text-center mb-2">
                                <img src="<?php echo base_url('assets/foto_daftar_jasa/').$pj->foto ?>" width="200px"
                                    height="130px" alt="gmbr">
                            </div>
                            <h5 class="card-title text-center"><b><?php echo $pj->nama_jasa?></b></h5>
                            <p><?php echo $pj->deskripsi_jasa?></p>
                            <a href="<?php echo base_url('admin/umum').'/'.$pj->jenis_jasa ?>"
                                class="btn btn-primary d-block"><i class="fas fa-eye"></i> LIHAT SELENGKAPNYA</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <!-- footer -->
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <!-- Footer -->
    <br><br>
    <!-- Footer-->
    <footer class="footer text-center" id="putu">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h5 class="text-uppercase mb-4">Contact</h5>
                    <p class="mb-0">
                        SANG PUTU OKA SUSILA
                        <br />
                        Mawasangka, 085299350597
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h5 class="text-uppercase mb-4">Sosial Media</h5>
                    <a class="btn btn-outline-light btn-social mx-1" href="#">
                        <i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://wa.me/6285299350597">
                        <i class="fab fa-fw fa-whatsapp"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#"><i class="fab fa-fw fa-instagram"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h5 class="text-uppercase mb-4">Ajumas</h5>
                    <p class="mb-0">
                        <b>Ajumas</b>
                        merupakan sebuah applikasi penyediakan jasa untuk Mawasangka
                        yang menyediakan berbagai jasa yang anda butuhkan, elektronik, kendaraan, fotografi,
                        pencucian, cukur rambut dan lain-lainya.

                        <!-- <a href="http://startbootstrap.com">Start Bootstrap</a> -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Ajumas 2023</small></div>
    </div>
    <!-- ./Footer -->


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('') ?>style1/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('') ?>style1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('') ?>style1/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('') ?>style1/js/sb-admin-2.min.js"></script>

    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>

</html>
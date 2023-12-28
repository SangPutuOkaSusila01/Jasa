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
    <title>Tampilan Umum</title>
</head>

<body>

    <div class="panel panel-default">
        <div class="panel-body">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <d class="navbar-brand"><i class="bi-box-seam"></i><a href="<?php echo base_url('home')?>"
                            style="text-decoration: none" class="text-white">Ajumas</a></d>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link active" href="<?php echo base_url('home')?>"><i
                                    class="bi-house-door"></i> Home<span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link active" href="#oka"><i class="bi-house-door"></i> Pesan
                                Jasa<span class="sr-only">(current)</span></a>
                            <a class="nav-item nav-link active" href="<?php echo base_url('login')?>"><i
                                    class="bi-house-door"></i> Gabung
                                Jasa<span class="sr-only">(current)</span></a>
                            <div class="dropup">
                                <a class="nav-item nav-link active" href="<?php echo base_url('login')?>"><i
                                        class="bi-box-arrow-right"></i>
                                    Login</a>
                            </div>
                        </div>
                        <!-- <form class="form-inline my-2 my-lg-0 ml-auto">
                            <input class="form-control mr-sm-2" type="search" placeholder="cari" aria-label="Search">
                            <button class="btn btn-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i>
                                Cari</button>
                        </form> -->
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid">
        <div class="row">
            <?php
            foreach ($oka7 as $row){
                // if ($row->jk == 'L'){
                //     $data = 'Laki-Laki';
                // }else{
                //     $data = 'Perempuan';
                // }
                ?>
            <div class="col-sm-4 g-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?php echo base_url('assets/foto_penyedia_jasa/').$row->foto ?>" width="200px"
                                height="130px" alt="gmbr">

                            <h5 class="card-title"><b><?php echo $row->nama_brand ?></b></h5>
                            <p class="badge badge-success"><?php echo $row->jenis_jasa ?></p>
                            <p class="badge badge-success"><?php echo $row->nama_penyedia ?></p><br>
                            <!-- <p class="card-text"><?php echo $row->alamat ?></p>
                            <p class="card-text"><?php echo $data ?></p> -->

                            <span class="badge badge-danger">Rp.<?php echo $row->kisaran_harga ?></span><br><br>
                            <div class="btn btn-sm mb-2">
                                <img src="<?php echo base_url('assets/foto_dokumentasi').'/'.$row->foto1 ?>"
                                    width="100px" height="50px" alt="gmbr">
                            </div>
                            <div class="btn btn-sm mb-2">
                                <img src="<?php echo base_url('assets/foto_dokumentasi1').'/'.$row->foto2 ?>"
                                    width="100px" height="50px" alt="gmbr">
                            </div><br>


                            <!-- <a href="#" class="btn btn-primary"> <i class="fas fa-eye"></i> Komentar</a> -->
                            <a href="<?php echo base_url('login')?>" class="btn btn-primary"> <i
                                    class="fa fa-share"></i>
                                Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
<div class="mt-4" id="oka">
    <div class="container-fluid">


        <?php echo form_open('pengguna_jasa');?>
        <div class="d-flex align-items-center">
            <div class="form-inline my-2 my-lg-0 ml-auto">
                <input type="text" class="form-control mr-sm-2" id="" name="cari" placeholder="Cari jasa disini">&nbsp;
                <button type="submit" class="btn btn-sm btn-dark my-2 my-sm-0" id="search" value="Cari" name="submit"><i
                        class="fas fa-search"></i>
                    Cari</button>


                <?php echo form_close();?>
            </div>
        </div>

        <div data-aos="zoom-in-down" data-aos-offset="300" data-aos-easing="ease-in-sine" class="py-3 mb-5">
            <div id="carouselExampleIndicators" class="carousel slide py-4 " data-ride="carousel"
                style="max-height: 400px; overflow: hidden;">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($oka7 as $key => $row) { ?>
                    <?php if (!empty($row->foto3)) { ?>
                    <div class="carousel-item <?php echo $key === 0 ? 'active' : ''; ?>" style="max-height: 600px;">
                        <a href="pengguna_jasa/tampilan_pengguna/<?php echo $row->jenis_jasa; ?>">
                            <img class="d-block w-100"
                                src="<?php echo base_url('assets/foto_dokumentasi3'.'/'.$row->foto3); ?>"
                                alt="Slide <?php echo $key + 1; ?>" style="max-height: 600px; object-fit: cover;">
                        </a>
                    </div>
                    <?php } ?>
                    <?php } ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>






        <div data-aos="fade-up" data-aos-duration="700" data-aos-offset="300" data-aos-easing="ease-in-sine">
            <div class="row text-dark mt-4 mb-3">
                <?php 
                    foreach($penyedia as $pj){
                    ?>
                <div class="col-sm-3 g-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-2">
                                <img src="<?php echo base_url('assets/foto_daftar_jasa/').$pj->foto ?>" width="200px"
                                    height="130px" alt="gmbr">
                            </div>
                            <h5 class="card-title text-center"><b><?php echo $pj->nama_jasa?></b></h5>
                            <p><?php echo $pj->deskripsi_jasa?></p>
                            <a href="<?php echo base_url('pengguna_jasa/tampilan_pengguna').'/'.$pj->jenis_jasa ?>"
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

</div>
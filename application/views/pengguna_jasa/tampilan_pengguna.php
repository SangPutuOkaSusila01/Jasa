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
                //$this->db->select_max('rating');
                $query['id_penyedia_jasa'] = $row->id_penyedia_jasa;
                $roll = $this->db->get_where('rating',$query)->result();
                // $query = $row->id_penyedia_jasa;
                // $roll = $this->db->query('select distinct id_penyedia_jasa from rating where id_penyedia_jasa = "'.$query.'" ')->result();
                if ($roll) {
                    $max['total'] = 0; // Inisialisasi total rating
                
                    foreach ($roll as $value) {
                        $id_penyedia_jasa = $value->id_penyedia_jasa;
                        $nama_penyedia = $value->nama;
                        $rating = $value->rating;
                
                        // Tambahkan rating ke total
                        $max['total'] += $rating;
                    }
                
                    // Hitung rasio 5/5 dari total rating
                    $max['total'] = ($max['total'] / (count($roll) * 5)) * 5;
                
                
                  
                
        }
        // $sql = $conn->query(query: "SELECT id FROM rating");
        // $numR = $sql->num_rows;

        // $sql = $conn->query(query: "SELECT SUM(rate) AS total FROM rating");
        // $rData = $sql->fecth_array();
        // $total = $rData['total'];
        // $avg = $total / $numR;

        ?>
        <div class="col-sm-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <!-- <img src="<?php echo base_url('assets/bahan/coba1.svg') ?>" width="200px" height="130px"
                            alt="gmbr"> -->
                        <img src="<?php echo base_url('assets/foto_penyedia_jasa/').$row->foto ?>" width="200px"
                            height="130px" alt="gmbr">

                        <h5 class="card-title"><b><?php echo $row->nama_brand ?></b></h5>
                        <h5 class="badge badge-success"><?php echo $row->jenis_jasa ?></h5>
                        <h5 class="badge badge-success"><?php echo $row->nama_penyedia ?></h5><br>
                        <h5 class="badge badge-success"><?php echo $row->alamat ?></h5><br>
                        <!-- <p class="card-text"><?php echo $data ?></p> -->

                        <!-- Trigger buttons for each image -->
                        <div class="btn btn-sm mb-2" data-toggle="modal" data-target="#myModal"
                            data-img="<?php echo base_url('assets/foto_dokumentasi').'/'.$row->foto1 ?>">
                            <img src="<?php echo base_url('assets/foto_dokumentasi').'/'.$row->foto1 ?>" width="100"
                                height="100" alt="gmbr">
                        </div>

                        <div class="btn btn-sm mb-2" data-toggle="modal" data-target="#myModal"
                            data-img="<?php echo base_url('assets/foto_dokumentasi1').'/'.$row->foto2 ?>">
                            <img src="<?php echo base_url('assets/foto_dokumentasi1').'/'.$row->foto2 ?>" width="100"
                                height="100" alt="gmbr">
                        </div>

                        <!-- Modal -->
                        <div class="modal fade opacity-25 " id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content border-0 bg-transparent">
                                    <div class="modal-header">
                                        <!-- Remove the Close button -->
                                    </div>
                                    <div class="modal-body text-center">
                                        <img id="modalImage" src="" class="img-fluid h-100 w-100">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <!-- <button type="button" class="btn btn-secondary" id="prevBtn">&lt;
                                            Previous</button>
                                        <button type="button" class="btn btn-secondary" id="nextBtn">Next &gt;</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>
                        <!-- <a href="#" class="btn btn-primary"> <i class="fas fa-eye"></i> Komentar</a> -->
                        <a href="<?php echo base_url('pengguna_jasa/checkout').'/'.$row->id_penyedia_jasa ?>"
                            class="btn btn-primary">
                            <i class="fas fa-share"></i>
                            Pesan Sekarang</a>
                        <a class="btn btn-sm btn-success btn-social "
                            href="https://api.whatsapp.com/send?phone=62<?php echo $row->no_hp  ?> &text=Halo admin <?= $row->nama_penyedia ?>, saya <?php echo $oka->nama_pengguna ?> berminat memesan jasa <?php echo $row->nama_brand ?>"
                            target="_blank">
                            <i class="fab fa-fw fa-whatsapp"></i></a>

                        <center><br>
                            <div>Total Rating:
                                <span class='result'>
                                    <?php echo isset($max['total']) ? number_format($max['total'], 2) : 0; ?> / 5
                                </span>
                            </div>
                            <form action="<?php echo base_url('pengguna_jasa/proses_reting') ?>" method="post">
                                <input type="hidden" name="id_pengguna_jasa"
                                    value="<?php echo $oka->id_pengguna_jasa ?>">
                                <input type="hidden" name="id_penyedia_jasa"
                                    value="<?php echo $row->id_penyedia_jasa ?>">
                                <input type="hidden" name="nama_penyedia" value="<?php echo $row->nama_penyedia ?>"><br>
                                <div class="rateyo" id="rating" data-rateyo-rating="0">
                                    data-rateyo-num-stars="5" data-rateyo-score="3">
                                </div>
                                <div class="mb-1">
                                    <span class='result'>0</span>
                                    <input type="hidden" name="rating" value="0">
                                </div>
                                <button class="btn btn-sm btn-secondary">simpan</button>
                            </form><br>
                        </center>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dekripsi-tab" data-toggle="tab" href="#dekripsi" role="tab"
                                aria-controls="dekripsi" aria-selected="true">Deskripsi jasa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active mt-2" id="dekripsi" role="tabpanel"
                            style="font-size: 14px;" aria-labelledby="dekripsi-tab"><?php echo $row->deskripsi_jasa ?>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                            style="font-size: 14px;">
                            <p><?= $row->profil_penyedia ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
            }
            ?>

    </div>
</div>
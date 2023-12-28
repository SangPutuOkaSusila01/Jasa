<?php if($lihat_0 > 0){?>
<!--  -->

<?php} else{ ?>
<h1 class="h3 mb-2 text-gray-800">Tabel Belum Verifikasi</h1>
<!-- ########################### Tabel verifikasi Jasa ############################# -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Nama Penyedia</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Nama Brand</th>
                        <th>Jenis Jasa</th>
                        <th>No Hp</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($verifikasi_0 as $data) : ?>
                    <tr>
                        <td class="text-center"><?php echo $data->nama_penyedia ?></td>
                        <td class="text-center"><?php echo $data->alamat ?></td>
                        <td class="text-center"><?php echo $data->jk ?></td>
                        <td class="text-center"><?php echo $data->tempat_lahir ?></td>
                        <td class="text-center"><?php echo $data->tanggal_lahir ?></td>
                        <td class="text-center"><?php echo $data->nama_brand ?></td>
                        <td class="text-center"><?php echo $data->jenis_jasa ?></td>
                        <td class="text-center"><?php echo $data->no_hp ?></td>
                        <td class="text-center"><img
                                src="<?php echo base_url('assets/foto_penyedia_jasa').'/'.$data->foto ?>" width="100px"
                                height="50px" alt="gmbr"></td>
                        </td>
                        <td class="text-center">
                            <a href class="btn btn-sm btn-warning mb-1" data-toggle="modal"
                                data-target="#edit<?php echo $data->id_penyedia_jasa ?>"><i
                                    class="fas fa-check"></i></a>

                            <a href class="btn btn-sm btn-danger mb-1" data-toggle="modal"
                                data-target="#hapus_verifikasi<?php echo $data->id_penyedia_jasa?>"><i
                                    class="fas fa-trash"></i></a>

                        </td>
                    </tr>

                    <!-- Modal Delete -->
                    <div class="modal fade" tabindex="-1" id="hapus_verifikasi<?php echo $data->id_penyedia_jasa ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin!!</h5>
                                    <h6>Hapus data : <?php echo $data->nama_penyedia ?></h6>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <form
                                        action="<?php echo base_url('admin/hapus_verifikasi').'/'.$data->id_penyedia_jasa?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-danger">YA Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal verifikasi -->
                    <div class="modal fade" id="edit<?php echo $data->id_penyedia_jasa ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Verifikasi Penyedia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="user" action="<?php echo base_url('admin/edit_verifikasi_jasa') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="hidden" name="id_penyedia_jasa"
                                                    value="<?php echo $data->id_penyedia_jasa ?>">
                                                <input type="text" name="nama_penyedia"
                                                    value="<?php echo $data->nama_penyedia ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Nama penyedia" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select type="text" id="" name="jk" class="form-control custom-select"
                                                    required>
                                                    <option value="">
                                                        Pilih Gender</option>
                                                    <option <?php if($data->jk == 'L') {echo 'selected';} ?> value="L">
                                                        Laki-laki</option>
                                                    <option <?php if($data->jk == 'P') {echo 'selected';} ?> value="P">
                                                        Perempuan</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alamat" value="<?php echo $data->alamat ?>"
                                                class="form-control" id="exampleInputEmail" placeholder="Alamat"
                                                required>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="tempat_lahir"
                                                    value="<?php echo $data->tempat_lahir ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Tempat Lahir" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="date" name="tanggal_lahir"
                                                    value="<?php echo $data->tanggal_lahir ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Tanggal Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="nama_brand"
                                                    value="<?php echo $data->nama_brand ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Nama Brand" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <?php 
                                                //  $list=array('-Pilih-');
                                                foreach($verifikasi_0 as $data)
                                                    {
                                                        $list[$data->jenis_jasa] = $data->jenis_jasa;
                                                    }
                                                    echo form_dropdown('jenis_jasa',$list,'',"class='custom-select input-full required  readonly'");    
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="no_hp" value="<?php echo $data->no_hp ?>"
                                                    class="form-control" id="exampleFirstName" placeholder="nomor Hp"
                                                    required readonly>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select type="text" id="" name="kd_verifikasi"
                                                    class="form-control custom-select" required>
                                                    <option value="">Pilih</option>
                                                    <option value="0">Batal</option>
                                                    <option value="1">Aktif</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>


                </tbody>
            </table>

        </div>
    </div>
</div>
<?php } ?>




<!-- ###################### Tabel Riwayat Pendaftar Jasa ######################### -->
<h1 class="h3 mb-2 text-gray-800">Tabel Sudah Verifikasi</h1>
<?php echo $this->session->flashdata('pesan'); ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-sm table-hover table-bordered" id="tabelx" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>Nama Penyedia</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Nama Brand</th>
                        <th>Jenis Jasa</th>
                        <th>No Hp</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($verifikasi_1 as $data) : ?>
                    <tr>
                        <td class="text-center"><?php echo $data->nama_penyedia ?></td>
                        <td class="text-center"><?php echo $data->alamat ?></td>
                        <td class="text-center"><?php echo $data->jk ?></td>
                        <td class="text-center"><?php echo $data->tempat_lahir ?></td>
                        <td class="text-center"><?php echo $data->tanggal_lahir ?></td>
                        <td class="text-center"><?php echo $data->nama_brand ?></td>
                        <td class="text-center"><?php echo $data->jenis_jasa ?></td>
                        <td class="text-center"><?php echo $data->no_hp ?></td>
                        <td class="text-center"><img
                                src="<?php echo base_url('assets/foto_penyedia_jasa').'/'.$data->foto ?>" width="100px"
                                height="50px" alt="gmbr"></td>
                        </td>
                        <td class="text-center">
                            <a href class="btn btn-sm btn-warning mb-1" data-toggle="modal"
                                data-target="#edit<?php echo $data->id_penyedia_jasa ?>"><i class="fas fa-eye"></i></a>

                            <a href class="btn btn-sm btn-danger mb-1" data-toggle="modal"
                                data-target="#hapus_verifikasi<?php echo $data->id_penyedia_jasa?>"><i
                                    class="fas fa-trash"></i></a>

                        </td>
                    </tr>

                    <!-- Modal Delete -->
                    <div class="modal fade" tabindex="-1" id="hapus_verifikasi<?php echo $data->id_penyedia_jasa ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin!!</h5>
                                    <h6>Hapus data : <?php echo $data->nama_penyedia ?></h6>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <form
                                        action="<?php echo base_url('admin/hapus_verifikasi').'/'.$data->id_penyedia_jasa?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-danger">YA Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal edit jasa -->
                    <!-- <div class="modal fade" id="edit<?php echo $data->id_penyedia_jasa ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Penyedia Jasa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="user" action="<?php echo base_url('admin/edit_penyedia_jasa') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="hidden" name="id"
                                                    value="<?php echo $data->id_penyedia_jasa ?>">
                                                <input type="text" name="nama_penyedia"
                                                    value="<?php echo $data->nama_penyedia ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Nama penyedia" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select type="text" id="" name="jk" class="form-control custom-select"
                                                    required>
                                                    <option value="">
                                                        Pilih Gender</option>
                                                    <option <?php if($data->jk == 'L') {echo 'selected';} ?> value="L">
                                                        Laki-laki</option>
                                                    <option <?php if($data->jk == 'P') {echo 'selected';} ?> value="P">
                                                        Perempuan</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alamat" value="<?php echo $data->alamat ?>"
                                                class="form-control" id="exampleInputEmail" placeholder="Alamat"
                                                required>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="tempat_lahir"
                                                    value="<?php echo $data->tempat_lahir ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Tempat Lahir" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="date" name="tanggal_lahir"
                                                    value="<?php echo $data->tanggal_lahir ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Tanggal Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="nama_brand"
                                                    value="<?php echo $data->nama_brand ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Nama Brand" required>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select type="text" id="" name="jenis_jasa"
                                                    class="form-control custom-select" required>
                                                    <option value="">Pilih jasa</option>
                                                    <option
                                                        <?php if($data->jenis_jasa == 'Fotografi') {echo 'selected';} ?>
                                                        value="Fotografi">Fotografi</option>
                                                    <option
                                                        <?php if($data->jenis_jasa == 'Service_Elektronik') {echo 'selected';} ?>
                                                        value="Service_Elektronik">Service Elektronik</option>
                                                    <option
                                                        <?php if($data->jenis_jasa == 'Service_Kendaraan') {echo 'selected';} ?>
                                                        value="Service_Kendaraan">Service Kendaraan</option>
                                                    <option
                                                        <?php if($data->jenis_jasa == 'Dekorasi') {echo 'selected';} ?>
                                                        value="Dekorasi">Dekorasi</option>
                                                    <option
                                                        <?php if($data->jenis_jasa == 'Cukur_Rambut') {echo 'selected';} ?>
                                                        value="Cukur_Rambut">Cukur Rambut</option>
                                                    <option
                                                        <?php if($data->jenis_jasa == 'Pencucian_Motor') {echo 'selected';} ?>
                                                        value="Pencucian_Motor">Pencucian Motor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="no_hp" value="<?php echo $data->no_hp ?>"
                                                    class="form-control" id="exampleFirstName" placeholder="nomor Hp"
                                                    required readonly>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="file" name="foto" value="<?php echo $data->foto ?>"
                                                    class="form-control" id="exampleFirstName" placeholder="foto">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Password">
                                            <small class="text-danger">* kosoongkan jika tidak di edit</small>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php endforeach; ?>


                </tbody>
            </table>

        </div>
    </div>
</div>
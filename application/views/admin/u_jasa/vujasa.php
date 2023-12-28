<h1 class="h3 mb-2 text-gray-800">Tables Pengguna Jasa</h1>
<?php echo $this->session->flashdata('pesan'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <!-- Button tambah -->
        <div class="container-fluid">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#exampleModal">
                <i class="fas fa-plus"></i> Tambah Pengguna
            </button>
        </div>
        <!-- Modal tambah jasa -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pengguna Jasa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="<?php echo base_url('admin/tambah_pengguna_jasa') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nama_pengguna" class="form-control" id="exampleFirstName"
                                        placeholder="Nama pengguna" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select type="text" id="" name="jk" class="form-control custom-select" required>
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
                                    <input type="text" name="tempat_lahir" class="form-control" id="exampleFirstName"
                                        placeholder="Tempat Lahir" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" name="tanggal_lahir" class="form-control" id="exampleFirstName"
                                        placeholder="Tanggal Lahir" required>
                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="no_hp" class="form-control" id="exampleFirstName"
                                        placeholder="nomor Hp" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="file" name="foto" class="form-control" id="exampleFirstName"
                                        placeholder="foto">
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword"
                                    placeholder="Password" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>Nama Pengguna</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>No Hp</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($list_pengguna_jasa as $data) : ?>
                    <tr>
                        <td class="text-center"><?php echo $data->nama_pengguna ?></td>
                        <td class="text-center"><?php echo $data->alamat ?></td>
                        <td class="text-center"><?php echo $data->jk ?></td>
                        <td class="text-center"><?php echo $data->tempat_lahir ?></td>
                        <td class="text-center"><?php echo $data->tanggal_lahir ?></td>
                        <td class="text-center"><?php echo $data->no_hp ?></td>
                        <td><img src="<?php echo base_url('assets/foto_pengguna_jasa').'/'.$data->foto ?>" width="100px"
                                height="50px" alt="gmbr"></td>

                        <td class="text-center">
                            <a href class="btn btn-sm btn-warning mb-1" data-toggle="modal"
                                data-target="#edit<?php echo $data->id_pengguna_jasa ?>"><i class="fas fa-edit"></i></a>

                            <a href class="btn btn-sm btn-danger mb-1" data-toggle="modal"
                                data-target="#hapus_pengguna<?php echo $data->id_pengguna_jasa ?>"><i
                                    class="fas fa-trash"></i></a>

                        </td>
                    </tr>

                    <!-- Modal Delete -->
                    <div class="modal fade" tabindex="-1" id="hapus_pengguna<?php echo $data->id_pengguna_jasa ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin!!</h5>
                                    <h6>Hapus data : <?php echo $data->nama_pengguna ?></h6>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <form
                                        action="<?php echo base_url('admin/hapus_pengguna').'/'.$data->id_pengguna_jasa?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-danger">YA Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal edit jasa -->
                    <div class="modal fade" id="edit<?php echo $data->id_pengguna_jasa?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pengguna Jasa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="user" action="<?php echo base_url('admin/edit_pengguna_jasa') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="hidden" name="id"
                                                    value="<?php echo $data->id_pengguna_jasa ?>">
                                                <input type="text" name="nama_pengguna"
                                                    value="<?php echo $data->nama_pengguna ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Nama pengguna" required>
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
                    </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
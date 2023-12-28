<h1 class="h3 mb-2 text-gray-800">Daftar pemesan</h1>
<?php echo $this->session->flashdata('pesan'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <!-- Button tambah -->
        <div class="container-fluid">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#exampleModal">
                <i class="fas fa-plus"></i> Daftar Pesanan
            </button>
        </div>

        <!-- Modal tambah jasa -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="<?php echo base_url('admin/dp_pesanan') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nama_pemesan" class="form-control" id="exampleFirstName"
                                        placeholder="Nama pemesan" required>
                                </div>
                                <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select type="text" id="" name="jk" class="form-control custom-select" required>
                                        <option value="">Pilih Gender</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div> -->

                            </div>
                            <div class="form-group">
                                <input type="text" name="alamat_pemesan" class="form-control" id="exampleInputEmail"
                                    placeholder="Alamat pemesan" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="date" name="tanggal_pemesan" class="form-control" id="exampleFirstName"
                                        placeholder="Tanggal pemesan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="telepon_pemesan" class="form-control" id="exampleFirstName"
                                        placeholder="telepon pemesan" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="file" name="permintaan_pemesan" class="form-control"
                                        id="exampleFirstName" placeholder="permintaan pemesan">
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
                        <th>id_penyedia_jasa</th>
                        <th>Nama penyedia</th>
                        <th>Nama Pemesan</th>
                        <th>Alamat</th>
                        <th>Tanggal Pemesan</th>
                        <th>Telepon Pemesan</th>
                        <th>Permintaan pemesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($list_pemesanan as $data) : ?>
                    <tr>
                        <!-- <td><?php echo $no++; ?></td> -->
                        <td class="text-center">
                            <small>(<?php echo $data->id_penyedia_jasa; ?>)</small>
                            <br class="text-center">
                            <?php echo $data->jenis_jasa; ?>
                        </td>
                        <td class="text-center"><?php echo $data->nama_penyedia ?></td>
                        <td class="text-center"><?php echo $data->nama_pemesan ?></td>
                        <td class="text-center"><?php echo $data->alamat_pemesan ?></td>
                        <!-- <td><?php echo $data->jk ?></td> -->
                        <!-- <td><?php echo $data->tempat_lahir ?></td> -->
                        <td class="text-center"><?php echo $data->tanggal_pemesan ?></td>
                        <td class="text-center"><?php echo $data->telepon_pemesan ?></td>
                        <td class="text-center"><?php echo $data->permintaan_pemesan ?></td>
                        <td class="text-center">
                            <a href class="btn btn-sm btn-warning mb-3" data-toggle="modal"
                                data-target="#edit<?php echo $data->Id_keranjang_pemesan ?>"><i
                                    class="fas fa-edit"></i></a>

                            <!-- <a href="#" class="btn btn-sm btn-danger mb-3" data-toggle="modal"
                                data-target="#hapus_dp_pesanan<?php echo $data->id_penyedia_jasa?>"><i
                                    class="fas fa-trash"></i></a> -->

                            <a href class="btn btn-sm btn-danger mb-3" data-toggle="modal"
                                data-target="#hapus_dp_pesanan<?php echo $data->Id_keranjang_pemesan ?>"><i
                                    class="fas fa-trash"></i></a>

                        </td>
                    </tr>

                    <!-- Modal Delete -->
                    <div class="modal fade" tabindex="-1"
                        id="hapus_dp_pesanan<?php echo $data->Id_keranjang_pemesan ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin!!</h5>
                                    <h6>Hapus data : <?php echo $data->nama_pemesan?></h6>
                                    <h6>Hapus data : <?php echo $data->permintaan_pemesan?></h6>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <form
                                        action="<?php echo base_url('admin/hapus_dp_pesanan').'/'.$data->Id_keranjang_pemesan?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-danger">YA Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal edit jasa -->
                    <div class="modal fade" id="edit<?php echo $data->Id_keranjang_pemesan ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pemesan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="user" action="<?php echo base_url('admin/edit_dp_pesanan') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="hidden" name="id"
                                                    value="<?php echo $data->Id_keranjang_pemesan ?>">
                                                <input type="text" name="nama_pemesan"
                                                    value="<?php echo $data->nama_pemesan ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="nama_pemesan" required>
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="date" name="tanggal_pemesan"
                                                    value="<?php echo $data->tanggal_pemesan ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Tanggal pemesan" required>
                                            </div>
                                            <!-- <div class=" col-sm-6 mb-3 mb-sm-0">
                                                <select type="text" id="" name="jk" class="form-control custom-select"
                                                    required>
                                                    <option value="">
                                                        Pilih Gender</option>
                                                    <option <?php if($data->jk == 'L') {echo 'selected';} ?> value="L">
                                                        Laki-laki</option>
                                                    <option <?php if($data->jk == 'P') {echo 'selected';} ?> value="P">
                                                        Perempuan</option>
                                                </select>
                                            </div> -->

                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="alamat_pemesan"
                                                value="<?php echo $data->alamat_pemesan ?>" class="form-control"
                                                id="exampleInputEmail" placeholder="Alamat pemesan" required>
                                        </div>

                                        <div class="form-group row">
                                            <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="tempat_lahir"
                                                    value="<?php echo $data->tempat_lahir ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Tempat Lahir" required>
                                            </div> -->

                                        </div>
                                        <div class="form-group row">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="telepon_pemesan"
                                                    value="<?php echo $data->telepon_pemesan ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="telepon pemesan" required
                                                    readonly>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="permintaan_pemesan"
                                                    value="<?php echo $data->permintaan_pemesan ?>" class="form-control"
                                                    id="exampleFirstName" placeholder="Permintaan pemesan">
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
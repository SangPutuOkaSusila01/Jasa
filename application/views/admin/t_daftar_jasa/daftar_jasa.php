<h1 class="h3 mb-2 text-gray-800">Tables daftar Jasa</h1>
<?php echo $this->session->flashdata('pesan'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">

        <!-- Button trigger modal -->
        <div class="container-fluid">
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                data-target="#exampleModal">
                <i class="fas fa-plus"></i> Tambah Jasa
            </button>

        </div>
        <!-- Modal tambah jasa -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jasa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="<?php echo base_url('admin/tambah_daftar_jasa') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nama_jasa" class="form-control" id="exampleFirstName"
                                        placeholder="Nama jasa" required>
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="jenis_jasa" class="form-control" id="exampleFirstName"
                                        placeholder="Jenis jasa" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="file" name="foto" class="form-control" id="exampleFirstName"
                                        placeholder="foto">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi_jasa">Deskripsi jasa</label>
                                <textarea class="form-control" name="deskripsi_jasa" id="deskripsi_jasa"
                                    rows="3"></textarea>
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

    <div class="card-body m-3">
        <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama jasa</th>
                        <th>jens jasa</th>
                        <th>Foto</th>
                        <th>Deskripsi jasa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1;
                     foreach ($list_daftar_jasa as $pj) :?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $pj->nama_jasa ?></td>
                        <td class="text-center"><?php echo $pj->jenis_jasa ?></td>
                        <td><img src="<?php echo base_url('assets/foto_daftar_jasa').'/'.$pj->foto ?>" width="100px"
                                height="50px" alt="gmbr"></td>
                        <td class="text-center"><?php echo $pj->deskripsi_jasa ?></td>

                        <td class="text-center">
                            <a href class="btn btn-sm btn-warning mb-1" data-toggle="modal"
                                data-target="#edit<?php echo $pj->id_daftar_jasa ?>"><i class="fas fa-eye"></i></a>

                            <a href class="btn btn-sm btn-danger mb-1" data-toggle="modal"
                                data-target="#hapus_daftar_jasa<?php echo $pj->id_daftar_jasa ?>"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>

                    <!-- Modal Delete -->
                    <div class="modal fade" tabindex="-1" id="hapus_daftar_jasa<?php echo $pj->id_daftar_jasa ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin!!</h5>
                                    <h6>Hapus data : <?php echo $pj->nama_jasa?></h6>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <form
                                        action="<?php echo base_url('admin/hapus_daftar_jasa').'/'.$pj->id_daftar_jasa?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-danger">YA Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal edit jasa -->
                    <div class="modal fade" id="edit<?php echo $pj->id_daftar_jasa?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Daftar Jasa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="user" action="<?php echo base_url('admin/edit_daftar_jasa') ?>"
                                        method="post" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="hidden" name="id_daftar_jasa"
                                                    value="<?php echo $pj->id_daftar_jasa ?>">
                                                <input type="text" name="nama_jasa" value="<?php echo $pj->nama_jasa ?>"
                                                    class="form-control" id="exampleFirstName" placeholder="Nama jasa"
                                                    required readonly>
                                            </div>

                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="jenis_jasa" class="form-control"
                                                    id="exampleFirstName" placeholder="Jenis jasa" required readonly>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="file" name="foto" class="form-control"
                                                    id="exampleFirstName" placeholder="foto">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi_jasa">Deskripsi jasa</label>
                                            <textarea class="form-control" name="deskripsi_jasa" id="deskripsi_jasa"
                                                rows="3"></textarea>
                                        </div>
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

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>
</div>
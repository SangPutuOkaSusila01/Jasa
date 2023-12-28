<!-- <form class="user" action="<?php echo base_url('pengguna_jasa/keranjang_pesanan') ?>" method="post"
    enctype="multipart/form-data"></form> -->
<h1 class="h3 mb-2 text-gray-800">Keranjang pemesanan</h1>
<!-- <div class="alert alert-success" role="alert">
    <strong><i class="fas fa-file-excel"></i> | Akun anda berhasil terhapus !</strong>
</div> -->

<?php echo $this->session->flashdata('pesan'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" action="<?php echo base_url('pengguna_jasa/tambah_pesanan') ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nama_jasa" class="form-control" id="exampleFirstName"
                                        placeholder="Nama jasa" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nama_penyedia" class="form-control" id="exampleFirstName"
                                        placeholder="Nama Penyedia">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="nama_pemesan" class="form-control" id="exampleFirstName"
                                        placeholder="Nama pemesan" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="alamat" class="form-control" id="exampleFirstName"
                                        placeholder="Alamat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="telepon_pemesan" class="form-control" id="exampleFirstName"
                                        placeholder="Telepon pemesan" required>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="tanggal_pemesan" class="form-control" id="exampleFirstName"
                                        placeholder="Tanggal pemesan">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="permintaan_pemesan">Permintaan Pemesan</label>
                                <textarea class="form-control" name="permintaan_pemesan" id="permintaan_pemesan"
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

        <div class='card-body'>
            <div class="table-responsive">

                <table class="table table-sm table-hover table-bordered" id="tabelx" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Jasa/Penyedia</th>
                            <!-- <th>Nama Penyedia</th> -->
                            <th>Nama Pemesan</th>
                            <th>Alamat</th>
                            <!-- <th>Telepon Pemesan</th> -->
                            <th>Tanggal Pemesan</th>
                            <th>permintaan pemesan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                    $no = 1;
                    $status = '';
                    foreach($list_keranjang_pemesan as $data) :
                        

                        if($data->status_pemesan == '0' ) {
                            $status = 'Belum Selesai';
                        } else {
                            $status = 'Selesai';
                        }
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <small>(<?php echo $data->id_penyedia_jasa; ?>)</small>
                                <br>
                                <?php echo $data->jenis_jasa; ?>
                            </td>
                            <!-- <td><?php echo $data->nama_penyedia; ?></td> -->
                            <td><?php echo $data->nama_pemesan; ?></td>
                            <td><?php echo $data->alamat_pemesan; ?></td>
                            <!-- <td><?php echo $data->telepon_pemesan; ?></td> -->
                            <td><?php echo $data->tanggal_pemesan; ?></td>
                            <td><?php echo $data->permintaan_pemesan; ?></td>
                            <td><?php echo $status; ?></td>
                            <td>
                                <center>
                                    <a href="<?php echo base_url('pengguna_jasa/edit_pemesan'.'/'.$data->Id_keranjang_pemesan) ?>"
                                        class="btn btn-sm btn-warning mb-3"><i class="fas fa-eye"></i></a>
                                    <!-- <a href class="btn btn-sm btn-warning  mb-3" data-toggle="modal"
                                        data-target="#edit_pemesan<?php echo $data->Id_keranjang_pemesan ?>"><i
                                            class="fas fa-edit"></i></a> -->
                                    <a href class="btn btn-sm btn-danger mb-3" data-toggle="modal"
                                        data-target="#hapus_keranjang_pemesan<?php echo $data->Id_keranjang_pemesan ?>"><i
                                            class="fas fa-trash"></i></a>
                                    <!-- <a class="btn btn-sm btn-success btn-social mb-3" href="https://wa.me/#">
                                        <i class="fab fa-fw fa-whatsapp"></i></a> -->
                                </center>
                            </td>
                        </tr>

                        <!-- Modal Delete -->
                        <div class="modal fade" tabindex="-1"
                            id="hapus_keranjang_pemesan<?php echo $data->Id_keranjang_pemesan ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin!!</h5>
                                        <h6>Hapus data : <?php echo $data->nama_pemesan?></h6>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tidak</button>
                                        <form
                                            action="<?php echo base_url('pengguna_jasa/hapus_keranjang_pemesan').'/'.$data->Id_keranjang_pemesan?>"
                                            method="POST">
                                            <button type="submit" class="btn btn-danger">YA Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- modal edit -->
                        <div class="modal fade" id="edit_keranjang_pemesan<?php echo $data->Id_keranjang_pemesan ?>"
                            tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pemesan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="user"
                                            action="<?php echo base_url('pengguna_jasa/edit_keranjang_pemesan') ?>"
                                            method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo $data->Id_keranjang_pemesan ?> ">
                                                    <input type="hidden" name="id_penyedia_jasa"
                                                        value="<?php echo $data->id_penyedia_jasa ?> ">
                                                    <input type="text" name="nama_pemesan"
                                                        value="<?php echo $data->nama_pemesan?>" class="form-control"
                                                        id="exampleFirstName" placeholder="nama_pemesan" required>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="nama_penyedia"
                                                        value="<?php echo $data->nama_penyedia ?>" class="form-control"
                                                        id="exampleFirstName" placeholder="Nama penyedia">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="alamat_pemesan"
                                                    value="<?php echo $data->alamat_pemesan ?>" class="form-control"
                                                    id="exampleInputEmail" placeholder="Alamat pemesan" required>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="date" name="tanggal_pemesan"
                                                        value="<?php echo $data->tanggal_pemesan ?>"
                                                        class="form-control" id="exampleFirstName"
                                                        placeholder="Tanggal pemesanan" required>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <?php 
                                                //  $list=array('-Pilih-');
                                                foreach($list_keranjang_pemesan as $data)
                                                    {
                                                        $list[$data->jenis_jasa] = $data->jenis_jasa;
                                                    }
                                                    echo form_dropdown('jenis_jasa',$list,'',"class='custom-select input-full required  readonly'");    
                                                ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="telepon_pemesan"
                                                        value="<?php echo $data->telepon_pemesan?>" class="form-control"
                                                        id="exampleFirstName" placeholder="telepon pemesan" required
                                                        readonly>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="permintaan_pemesan"
                                                        value="<?php echo $data->permintaan_pemesan ?>"
                                                        class="form-control" id="exampleFirstName"
                                                        placeholder="permintaan_pemesan">
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
            <!-- <button type="button" class="btn btn-primary btn sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Tambah Pesanan
            </button> -->
        </div>
    </div>
</div>
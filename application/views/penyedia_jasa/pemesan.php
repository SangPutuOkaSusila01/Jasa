<h1 class="h3 mb-2 text-gray-800">Daftar pemesan</h1>
<?php echo $this->session->flashdata('pesan'); ?>

<!-- <div class="alert alert-success" role="alert">
    <strong><i class="fas fa-file-excel"></i> | Akun anda berhasil terhapus !</strong>
</div> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-sm table-hover table-bordered" id="tabelx" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>jenis jasa</th>
                            <th>Penyedia jasa</th>
                            <th>Nama Pengguna</th>
                            <th>Alamat</th>
                            <th>Telepon Pemesan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Permintaan pemesan</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                    $no = 1;
                    $status = '';
                    foreach($list_pemesanan as $data) :
                        

                        if($data->status_pemesan == '0' ) {
                            $status = 'Belum Selesai';
                        } else if($data->status_pemesan == '1' ) {
                            $status = 'Selesai';
                        }else{
                            $status = '';
                        }
                ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <small>(<?php echo $data->Id_keranjang_pemesan; ?>)</small>
                                <br>
                                <?php echo $data->jenis_jasa; ?>
                            </td>
                            <td><?php echo $data->nama_penyedia; ?></td>
                            <td><?php echo $data->nama_pemesan; ?></td>
                            <td><?php echo $data->alamat_pemesan; ?></td>
                            <td><?php echo $data->telepon_pemesan; ?></td>
                            <td><?php echo $data->tanggal_pemesan; ?></td>
                            <td><?php echo $data->permintaan_pemesan; ?></td>
                            <td><?php echo $status; ?></td>
                            <td>
                                <a href="<?php echo base_url('penyedia_jasa/detail_pemesan'.'/'.$data->Id_keranjang_pemesan) ?>"
                                    class="btn btn-sm btn-warning mb-3"><i class="fas fa-eye"></i></a>
                                <!-- <a href="<?php echo base_url('penyedia_jasa/detail_pemesan') ?>"
                                    class="btn btn-sm btn-warning mb-3" data-toggle="modal"
                                    data-target="#edit_pemesan<?php echo $data->Id_keranjang_pemesan ?>"><i
                                        class="fas fa-eye"></i></a> -->
                                <a href class="btn btn-sm btn-danger mb-3" data-toggle="modal"
                                    data-target="#hapus_pemesan<?php echo $data->id_pengguna_jasa ?>"><i
                                        class="fas fa-trash"></i></a>
                                <!-- <a class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#hapus_pemesan<?php echo $data->id_penyedia_jasa ?>"><i
                                        class="fas fa-check"></i></a> -->
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" tabindex="-1" id="hapus_pemesan<?php echo $data->id_pengguna_jasa ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin!!</h5>
                                        <h6>Hapus data : <?php echo $data->nama_pemesan ?></h6>
                                        <h6>Hapus data : <?php echo $data->id_pengguna_jasa?></h6>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tidak</button>
                                        <form
                                            action="<?php echo base_url('penyedia_jasa/hapus_pemesan').'/'.$data->Id_keranjang_pemesan ?>"
                                            method="POST">
                                            <button type="submit" class="btn btn-danger">YA Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal edit jasa keranjang pemesan -->
                        <div class="modal fade" id="edit_pemesan<?php echo $data->Id_keranjang_pemesan ?>"
                            tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pemesan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="user"
                                            action="<?php echo base_url('penyedia_jasa/edit_status_pemesan') ?>"
                                            method="post" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="Id_keranjang_pemesan"
                                                        value="<?php echo $data->Id_keranjang_pemesan?>">
                                                    <input type="text" name="nama_pemesan"
                                                        value="<?php echo $data->nama_pemesan ?>" class="form-control"
                                                        id="exampleFirstName" placeholder="nama_pemesan" required
                                                        readonly>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="nama_penyedia"
                                                        value="<?php echo $data->nama_penyedia ?>" class="form-control"
                                                        id="exampleFirstName" placeholder="Nama penyedia" required
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="alamat_pemesan"
                                                    value="<?php echo $data->alamat_pemesan ?>" class="form-control"
                                                    id="exampleInputEmail" placeholder="Alamat pemesan" required
                                                    readonly>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="date" name="tanggal_pemesan"
                                                        value="<?php echo $data->tanggal_pemesan ?>"
                                                        class="form-control" id="exampleFirstName"
                                                        placeholder="Tanggal pemesanan" required readonly>
                                                </div>

                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <?php 
                                                //  $list=array('-Pilih-');
                                                foreach($list_pemesanan as $data)
                                                    {
                                                        $list[$data->jenis_jasa] = $data->jenis_jasa;
                                                    }
                                                    echo form_dropdown('jenis_jasa',$list,'',"class='custom-select input-full required  readonly'");    
                                                ?>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group row">
                                            </div> -->
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="telepon_pemesan"
                                                        value="<?php echo $data->telepon_pemesan ?>"
                                                        class="form-control" id="exampleFirstName"
                                                        placeholder="telepon pemesan" required readonly>
                                                </div>
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="text" name="permintaan_pemesan"
                                                        value="<?php echo $data->permintaan_pemesan ?>"
                                                        class="form-control" id="exampleFirstName"
                                                        placeholder="permintaan_pemesan" required readonly>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <select type="text" id="" name="status_pemesan"
                                                        class="form-control custom-select" required>
                                                        <option value="">Pilih</option>
                                                        <option value="0">Belum Selesai</option>
                                                        <option value="1">Selesai</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <button type="" class="btn btn-primary">
                                                    <= kembali</button>
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
</div>
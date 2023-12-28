<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Pemesan</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('penyedia_jasa/edit_status_pemesan') ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="hidden" name="Id_keranjang_pemesan"
                            value="<?php echo $data->Id_keranjang_pemesan?>">
                        <input type="text" name="nama_pemesan" value="<?php echo $data->nama_pemesan ?>"
                            class="form-control" id="exampleFirstName" placeholder="nama_pemesan" required readonly>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nama_penyedia" value="<?php echo $data->nama_penyedia ?>"
                            class="form-control" id="exampleFirstName" placeholder="Nama penyedia" required readonly>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="alamat_pemesan" value="<?php echo $data->alamat_pemesan ?>"
                        class="form-control" id="exampleInputEmail" placeholder="Alamat pemesan" required readonly>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" name="tanggal_pemesan" value="<?php echo $data->tanggal_pemesan ?>"
                            class="form-control" id="exampleFirstName" placeholder="Tanggal pemesanan" required
                            readonly>
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
                        <input type="text" name="telepon_pemesan" value="<?php echo $data->telepon_pemesan ?>"
                            class="form-control" id="exampleFirstName" placeholder="telepon pemesan" required readonly>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="permintaan_pemesan" value="<?php echo $data->permintaan_pemesan ?>"
                            class="form-control" id="exampleFirstName" placeholder="permintaan_pemesan" required
                            readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <select type="text" id="" name="status_pemesan" class="form-control custom-select" required>
                            <!-- <option value="">Pilih</option> -->
                            <option value="0">Belum Selesai</option>
                            <option value="1">Selesai</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"> Simpan</i></button>
                    <div class="pull-right">
                        <a href="<?php echo base_url('penyedia_jasa/pemesan')?>" class="btn btn-warning btn-flat"><i
                                class="fa fa-undo"></i> Back</a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
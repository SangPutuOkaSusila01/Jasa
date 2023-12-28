<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Pemesan</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> -->
        </div>
        <div class="modal-body">
            <form class="user" action="<?php echo base_url('pengguna_jasa/edit_keranjang_pemesan') ?>" method="post"
                enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="hidden" name="id" value="<?php echo $data->Id_keranjang_pemesan ?> ">
                        <input type="hidden" name="id_penyedia_jasa" value="<?php echo $data->id_penyedia_jasa ?> ">
                        <input type="text" name="nama_pemesan" value="<?php echo $data->nama_pemesan?>"
                            class="form-control" id="exampleFirstName" placeholder="nama_pemesan" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="nama_penyedia" value="<?php echo $data->nama_penyedia ?>"
                            class="form-control" id="exampleFirstName" placeholder="Nama penyedia">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="alamat_pemesan" value="<?php echo $data->alamat_pemesan ?>"
                        class="form-control" id="exampleInputEmail" placeholder="Alamat pemesan" required>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" name="tanggal_pemesan" value="<?php echo $data->tanggal_pemesan ?>"
                            class="form-control" id="exampleFirstName" placeholder="Tanggal pemesanan" required>
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
                        <input type="text" name="telepon_pemesan" value="<?php echo $data->telepon_pemesan?>"
                            class="form-control" id="exampleFirstName" placeholder="telepon pemesan" required readonly>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="permintaan_pemesan" value="<?php echo $data->permintaan_pemesan ?>"
                            class="form-control" id="exampleFirstName" placeholder="permintaan_pemesan">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"> Simpan</i></button>
                    <div class="pull-right">
                        <a href="<?php echo base_url('pengguna_jasa/keranjang_pemesan')?>"
                            class="btn btn-warning btn-flat"><i class="fa fa-undo"></i> Back</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
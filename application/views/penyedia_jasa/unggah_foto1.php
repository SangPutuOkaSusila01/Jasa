<form class="user" action="<?php echo base_url('penyedia_jasa/proses_unggah_foto1') ?>" method="post"
    enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Username</label>
            <input type="text" name="no_hp" value="<?php echo $oka->no_hp ?>" class="form-control" id="exampleFirstName"
                placeholder="nomor Hp" required readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Foto Dokumentasi 1</label>
            <input type="file" name="foto1" class="form-control" id="exampleFirstName" placeholder="foto1">
        </div>
    </div>

    <!-- <?php if (!empty($data)) :?>
    <?php foreach($list_pemesanan as $data) : ?>
    <tr>
        <td <?php echo $data->foto ?>></td>
        <td <?php echo $data->foto1 ?>></td>
    </tr>
    <?php endforeach ?>
    <?php else :?>

    <?php endif ?> -->

    <div class="form-group">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
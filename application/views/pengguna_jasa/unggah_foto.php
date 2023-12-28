<form class="user" action="<?php echo base_url('pengguna_jasa/prses_unggah_foto') ?>" method="post"
    enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Username</label>
            <input type="text" name="no_hp" value="<?php echo $coba->no_hp ?>" class="form-control"
                id="exampleFirstName" placeholder="nomor Hp" required readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control" id="exampleFirstName" placeholder="foto">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
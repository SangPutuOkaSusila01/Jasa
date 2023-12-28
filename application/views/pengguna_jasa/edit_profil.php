<form class="user" action="<?php echo base_url('pengguna_jasa/prses_edit_profil') ?>" method="post"
    enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="hidden" name="id" value="<?php echo $oka->id_pengguna_jasa ?>">
            <input type="text" name="nama_pengguna" value="<?php echo $oka->nama_pengguna ?>" class="form-control"
                id="exampleFirstName" placeholder="Nama penyedia" required>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select type="text" id="" name="jk" class="form-control custom-select" required>
                <option value="">
                    Pilih Gender</option>
                <option <?php if($oka->jk == 'L') {echo 'selected';} ?> value="L">
                    Laki-laki</option>
                <option <?php if($oka->jk == 'P') {echo 'selected';} ?> value="P">
                    Perempuan</option>
            </select>
        </div>

    </div>
    <div class="form-group">
        <input type="text" name="alamat" value="<?php echo $oka->alamat ?>" class="form-control" id="exampleInputEmail"
            placeholder="Alamat" required>
    </div>

    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="tempat_lahir" value="<?php echo $oka->tempat_lahir ?>" class="form-control"
                id="exampleFirstName" placeholder="Tempat Lahir" required>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="date" name="tanggal_lahir" value="<?php echo $oka->tanggal_lahir ?>" class="form-control"
                id="exampleFirstName" placeholder="Tanggal Lahir" required>
        </div>
    </div>
    <div class="form-group row">
    </div>
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="no_hp" value="<?php echo $oka->no_hp ?>" class="form-control" id="exampleFirstName"
                placeholder="nomor Hp" required readonly>
        </div>
    </div>

    <div class="form-group">
        <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
        <small class="text-danger">* kosoongkan jika tidak di edit</small>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
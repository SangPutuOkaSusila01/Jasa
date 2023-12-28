<form class="user" action="<?php echo base_url('penyedia_jasa/proses_edit_profil') ?>" method="post"
    enctype="multipart/form-data">
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="hidden" name="id" value="<?php echo $oka->id_penyedia_jasa ?>">
            <input type="text" name="nama_penyedia" value="<?php echo $oka->nama_penyedia ?>" class="form-control"
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
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" name="nama_brand" value="<?php echo $oka->nama_brand?>" class="form-control"
                id="exampleFirstName" placeholder="Nama Brand" required>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <select type="text" id="" name="jenis_jasa" class="form-control custom-select" required>
                <option value="">Pilih jasa</option>
                <option <?php if($oka->jenis_jasa == 'Fotografi') {echo 'selected';} ?> value="Fotografi">Fotografi
                </option>
                <option <?php if($oka->jenis_jasa == 'Service_Elektronik') {echo 'selected';} ?>
                    value="Service_Elektronik">Service Elektronik</option>
                <option <?php if($oka->jenis_jasa == 'Service_Kendaraan') {echo 'selected';} ?>
                    value="Service_Kendaraan">Service Kendaraan</option>
                <option <?php if($oka->jenis_jasa == 'Dekorasi') {echo 'selected';} ?> value="Dekorasi">Dekorasi
                </option>
                <option <?php if($oka->jenis_jasa == 'Cukur_Rambut') {echo 'selected';} ?> value="Cukur_Rambut">Cukur
                    Rambut</option>
                <option <?php if($oka->jenis_jasa == 'Pencucian_Motor') {echo 'selected';} ?> value="Pencucian_Motor">
                    Pencucian Motor</option>
            </select>
        </div>
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

    <div class="deskripsi py-3">
        <label for="Deskripsi Jasa"> Deskripsi Jasa</label>
        <div class="col-sm-12 mb-3 mb-sm-0" id="editor-container">
        </div>
        <input type="hidden" name="deskripsi_jasa" id="deskripsi_jasa_input"
            value="<?php echo htmlspecialchars($oka->deskripsi_jasa); ?>">
    </div>

    <div class="profil py-5">
        <label for="profil_penyedia"> Profil Jasa</label>
        <div class="col-sm-12 mb-3 mb-sm-0" id="editor-profil">
        </div>
        <input type="hidden" name="profil_penyedia" id="profil_penyedia_input"
            value="<?php echo htmlspecialchars($oka->profil_penyedia); ?>">
    </div>


    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
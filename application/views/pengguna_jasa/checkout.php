<form action="<?= base_url('Pengguna_jasa/simpan_pesanan')?>" method="post">

    <input type="hidden" name="id_penyedia_jasa" value="<?= $id_penyedia_jasa; ?>" class="form-control"
        id="nama_pemesan" disable>
    <input type="hidden" name="jenis_jasa" value="<?php echo $jasa->jenis_jasa ?>" class="form-control"
        id="nama_pemesan" disable>
    <input type="hidden" name="nama_penyedia" value="<?php echo $jasa->nama_penyedia ?>" class="form-control"
        id="nama_pemesan" disable>
    <input type="hidden" name="id_pengguna_jasa" value="<?php echo $oka->id_pengguna_jasa ?>" class="form-control"
        id="id_pengguna_jasa" disable>

    <!-- <input type="hidden" name="id_pengguna_jasa" value="<?= $id_pengguna_jasa; ?>" class="form-control"
    id="nama_pemesan" disable> -->

    <div class="information mt-3 mb-5 pb-2 border-bottom-danger w-100 shadow-lg" style="width:30%">
        <h3 class="text-danger ml-4">Informasi Penting!! <span class="badge badge-secondary"></span></h3>
        <div style="font-size: 13px;" class="ml-4">
            <p>Proses Pemesanan:</p>
            <p>1. Lengkapi Data Pemesanan</p>
            <p>2. Cek Keranjang Pemesanan</p>
            <p>3. Tekan Logo Whatsapp jika ada yang mau ditanyakan</p>
        </div>
    </div>

    <div class="form-group">
        <label>Nama Pemesan</label>
        <input type="text" name="nama_pemesan" value="<?php echo $oka->nama_pengguna ?>" class="form-control"
            id="nama_pemesan" placeholder="Nama pengguna" required readonly>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat_pemesan" value="<?php echo $oka->alamat ?>" class="form-control"
            id="alamat_pemesan" placeholder="Nama pengguna" required readonly>
    </div>
    <div class="form-group">
        <label>Nomor Hp</label>
        <input type="text" name="telepon_pemesan" value="<?php echo $oka->no_hp ?>" class="form-control"
            id="telepon_pemesan" placeholder="Nomor Hp" required readonly>
    </div>
    <div class="form-group">
        <label for="permintaan_pemesan">Permintaan Pemesan</label>
        <textarea class="form-control" name="permintaan_pemesan" id="permintaan_pemesan"></textarea>
    </div>

    <!-- <div class="inputfield terms">
        <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
        </label>
        <p>Setuju dengan S&K yang berlaku</p>
    </div> -->
    <div class="inputfield">
        <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i>
            Pesan jasa</button>
    </div>
</form>
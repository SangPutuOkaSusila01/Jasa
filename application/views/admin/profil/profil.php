<?php echo $this->session->flashdata('pesan'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Profil Penyedia Jasa <a class="btn btn-warning btn-sm"
                            href="<?php echo base_url('penyedia_jasa/edit_profil') ?>">Edit
                            Data</a></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover table-responsive table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="380px" rowspan="9x" align="center"><img class="img-thumbnail"
                                        style="width:190px" src="<?php echo base_url('assets/foto_penyedia_jasa/').$oka->foto;
                                         ?>"><a class="btn btn-success btn-block"
                                        href="<?php echo base_url('penyedia_jasa/unggah_foto') ?>">Unggah
                                        Foto</a></td>
                            </tr>
                            <tr>
                                <td width="280px"> Username_admin</td>
                                <td width="725px"><?php echo $oka->nama_penyedia ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php echo $oka->alamat?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td><?php echo $oka->jk?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td><?php echo $oka->tempat_lahir?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td><?php echo $oka->tanggal_lahir?></td>
                            </tr>
                            <tr>
                                <td>Nama Brand</td>
                                <td><?php echo $oka->nama_brand?></td>
                            </tr>
                            <tr>
                                <td>Jenis Jasa</td>
                                <td><?php echo $oka->jenis_jasa?></td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td><?php echo $oka->no_hp?></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
            <br>
        </div>

    </div>
</div>
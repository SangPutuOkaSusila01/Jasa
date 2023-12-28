<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {

public function index()
{
  $sang['penyedia'] = $this->db->get_where('penyedia_jasa')->num_rows();
  $sang['pengguna'] = $this->db->get_where('pengguna_jasa')->num_rows();
  $sang['keranjang'] = $this->db->get_where('keranjang_pesanan')->num_rows();
  $sang['daftar'] = $this->db->get_where('daftar_jasa')->num_rows();
   $this->template->load('template','admin/home',$sang);
}

public function vpjasa()
{
   $data['list_penyedia_jasa'] = $this->db->get('penyedia_jasa')->result();
   $this->template->load('template','admin/p_jasa/vpjasa', $data);

}

public function vujasa()
{
  $data['list_pengguna_jasa'] = $this->db->get('pengguna_jasa')->result();
  $this->template->load('template','admin/u_jasa/vujasa', $data);
}

public function daftar_jasa()
{
  $data['list_daftar_jasa'] = $this->db->get_where('daftar_jasa')->result();
   $this->template->load('template','admin/t_daftar_jasa/daftar_jasa',$data);
}

public function verif()
{
   $data['verifikasi_1'] = $this->db->get_where('penyedia_jasa', ['kd_verifikasi'=>1])->result();
   
   $data['verifikasi_0'] = $this->db->get_where('penyedia_jasa', ['kd_verifikasi'=>0])->result();

   $data['lihat_0'] = $this->db->get_where('penyedia_jasa', ['kd_verifikasi'=>0])->num_rows();
   $this->template->load('template','admin/verifikasi/verif',$data);
}

public function verif1()
{
  $data['list_verifikasi_1'] = $this->db->get_where('pengguna_jasa', ['kd_verifikasi'=>0])->result();
   
    $data['list_verifikasi_0'] = $this->db->get_where('pengguna_jasa', ['kd_verifikasi'=>0])->result();

  $data['cek_0'] = $this->db->get_where('pengguna_jasa', ['kd_verifikasi'=>0])->num_rows();
  
   $this->template->load('template','admin/verifikasi1/verif1',$data);
}

public function dp_pesanan()
{
  $data['list_pemesanan'] = $this->db->get_where('keranjang_pesanan')->result();
   $this->template->load('template','admin/d_pesanan/dp_pesanan', $data);
}

public function umum($jenis_jasa)
{
   $filter['jenis_jasa'] = $jenis_jasa;
   $oks['oka7'] = $this->db->get_where('penyedia_jasa',$filter)->result();
   $this->load->view('umum/umum',$oks);
}

#====================== tambah penyedia jasa ================================
public function tambah_penyedia_jasa(){
   
   $name = $this->input->post('no_hp');
   $key['no_hp'] = $this->input->post('no_hp');
   $config['upload_path'] = 'assets/foto_penyedia_jasa/';
   $config['allowed_types'] = 'jpg|png';
   // $config['max_size'] = 10000;
   $config['file_name'] = $name;
   $config['overwrite'] = true;

   $this->upload->initialize($config);
   if (!empty($_FILES['foto']['name'])) {
     if ($this->upload->do_upload('foto')){
         $ode = [
             'no_hp' => $this->input->post('no_hp'),
             'nama_penyedia' => $this->input->post('nama_penyedia'),
             'jk' => $this->input->post('jk'),
             'alamat' => $this->input->post('alamat'),
             'tempat_lahir' => $this->input->post('tempat_lahir'),
             'tanggal_lahir' => $this->input->post('tanggal_lahir'),
             'nama_brand' => $this->input->post('nama_brand'),
             'jenis_jasa' => $this->input->post('jenis_jasa'),
             'foto' => $this->upload->data('file_name')
             
           ];
           
           $data = [
             'userid' => $this->input->post('no_hp'),
             'nama' => $this->input->post('nama_penyedia'),
             'password' => $this->input->post('password'),
             'foto' => $this->upload->data('file_name'),
             'level' => 'penyedia_jasa',
           ];
       $cek = $this->db->get_where('penyedia_jasa', $key)->row();
       if ($cek) {
           $this->session->set_flashdata('pesan', '
           <div class="alert alert-success" role="alert">
           <strong><i class="fas fa-file-excel"></i> | Akun sudh terdaftar !</strong>
           </div>
               <script type="text/javascript">
               window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                   $(this).remove(); 
               });
           }, 10026);
           </script>'
           );
           redirect('admin/vpjasa', 'refresh');
       } else {
         $this->db->insert('penyedia_jasa', $ode);
         $this->db->insert('login', $data);
         $this->session->set_flashdata('pesan', '
       <div class="alert alert-success" role="alert">
       <strong><i class="fas fa-check"></i> | Akun berhasil di daftar !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/vpjasa', 'refresh');
       }
     } else {
       $this->session->set_flashdata('pesan', '
       <div class="alert alert-danger" role="alert">
       <strong><i class="fas fa-file-excel"></i> | Foto terlalu besar !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/vpjasa', 'refresh');
     }
   } else {
     $cekx = $this->db->get_where('penyedia_jasa', $key)->row();
     if ($cekx) {
       $this->session->set_flashdata('pesan', '
       <div class="alert alert-danger" role="alert">
       <strong><i class="fas fa-file-excel"></i> | Akun sudh terdaftar !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/vpjasa', 'refresh');
     } else {
       $data['no_hp'] = $this->input->post('no_hp');
       $data['nama_penyedia'] = $this->input->post('nama_penyedia');
       $data['jk'] = $this->input->post('jk');
       $data['alamat'] = $this->input->post('alamat');
       $data['tempat_lahir'] = $this->input->post('tempat_lahir');
       $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
       $data['nama_brand'] = $this->input->post('nama_brand');
       $data['jenis_jasa'] = $this->input->post('jenis_jasa');

       $ode['userid'] = $this->input->post('no_hp');
       $ode['nama'] = $this->input->post('nama_pengguna');
       $ode['password'] = $this->input->post('password');
       $ode['level'] = 'penyedia_jasa';
       //menyimpan data ke database;
       $this->db->insert('penyedia_jasa', $data);
       $this->db->insert('login', $ode);
       $this->session->set_flashdata('pesan', '
       <div class="alert alert-success" role="alert">
       <strong><i class="fas fa-check"></i> | Akun berhasil di daftar !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/vpjasa', 'refresh');
     }
   }

   
}


#======================== Tambah pengguna jasa ===================
public function tambah_pengguna_jasa(){
   
  $name = $this->input->post('no_hp');
  $key['no_hp'] = $this->input->post('no_hp');
  $config['upload_path'] = 'assets/foto_pengguna_jasa/';
  $config['allowed_types'] = 'jpg|png';
  // $config['max_size'] = 10000;
  $config['file_name'] = $name;
  $config['overwrite'] = true;

  $this->upload->initialize($config);
  if (!empty($_FILES['foto']['name'])) {
    if ($this->upload->do_upload('foto')){
        $ode = [
            'no_hp' => $this->input->post('no_hp'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'foto' => $this->upload->data('file_name')
            
          ];
          
          $data = [
            'userid' => $this->input->post('no_hp'),
            'nama' => $this->input->post('nama_pengguna'),
            'password' => $this->input->post('password'),
            'foto' => $this->upload->data('file_name'),
            'level' => 'pengguna_jasa',
          ];
      $cek = $this->db->get_where('pengguna_jasa', $key)->row();
      if ($cek) {
          $this->session->set_flashdata('pesan', '
          <div class="alert alert-danger" role="alert">
          <strong><i class="fas fa-file-excel"></i> | Jasa sudh terdaftar !</strong>
          </div>
              <script type="text/javascript">
              window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 10026);
          </script>'
          );
          redirect('admin/vujasa', 'refresh');
      } else {
        
        $this->db->insert('pengguna_jasa', $ode);
        $this->db->insert('login', $data);
        $this->session->set_flashdata('pesan', '
      <div class="alert alert-success" role="alert">
      <strong><i class="fas fa-check"></i> | Jasa berhasil di daftar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/vujasa', 'refresh');
      }
    } else {
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger" role="alert">
      <strong><i class="fas fa-file-excel"></i> | Foto terlalu besar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/vujasa', 'refresh');
    }
  } else {
    $cekx = $this->db->get_where('pengguna_jasa', $key)->row();
    if ($cekx) {
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger" role="alert">
      <strong><i class="fas fa-file-excel"></i> | Jasa sudh terdaftar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/vujasa', 'refresh');
    } else {
      $data['no_hp'] = $this->input->post('no_hp');
      $data['nama_pengguna'] = $this->input->post('nama_pengguna');
      $data['jk'] = $this->input->post('jk');
      $data['alamat'] = $this->input->post('alamat');
      $data['tempat_lahir'] = $this->input->post('tempat_lahir');
      $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
      $ode['userid'] = $this->input->post('no_hp');
      $ode['nama'] = $this->input->post('nama_pengguna');
      $ode['password'] = $this->input->post('password');
      $ode['level'] = 'pengguna_jasa';
      //menyimpan data ke database;
      $this->db->insert('pengguna_jasa', $data);
      $this->db->insert('login', $ode);
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success" role="alert">
      <strong><i class="fas fa-check"></i> | Jasa berhasil di daftarkan !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/vujasa', 'refresh');
    }
  }

  
}

#======================== Tambah daftar jasa =====================
public function tambah_daftar_jasa(){
  $name = $this->input->post('nama_jasa');
  $key['nama_jasa'] = $this->input->post('nama_jasa');
  $config['upload_path'] = 'assets/foto_daftar_jasa/';
  $config['allowed_types'] = 'jpg|png';
  // $config['max_size'] = 10000;
  $config['file_name'] = $name;
  $config['overwrite'] = true;

  $this->upload->initialize($config);
  if (!empty($_FILES['foto']['name'])) {
    if ($this->upload->do_upload('foto')){
        $ode = [
          'jenis_jasa' => $this->input->post('jenis_jasa'),
            'nama_jasa' => $this->input->post('nama_jasa'),
            'foto' => $this->upload->data('file_name'),
            'deskripsi_jasa' => $this->input->post('deskripsi_jasa')
          ];
          
          $data = [
            'jenis_jasa' => $this->input->post('jenis_jasa'),
            'nama_jasa' => $this->input->post('nama_jasa'),
            'foto' => $this->upload->data('file_name'),
            'deskripsi_jasa' => $this->input->post('deskripsi_jasa'),
            'level' => 'daftar_jasa',
          ];
      $cek = $this->db->get_where('daftar_jasa', $key)->row();
      if ($cek) {
          $this->session->set_flashdata('pesan', '
          <div class="alert alert-danger" role="alert">
          <strong><i class="fas fa-file-excel"></i> | Akun sudh terdaftar !</strong>
          </div>
              <script type="text/javascript">
              window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 10026);
          </script>'
          );
          redirect('admin/daftar_jasa', 'refresh');
      } else {
        
        $this->db->insert('daftar_jasa', $ode);
        // $this->db->insert('home', $data);
        $this->session->set_flashdata('pesan', '
      <div class="alert alert-success" role="alert">
      <strong><i class="fas fa-check"></i> | Akun berhasil di daftar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/daftar_jasa', 'refresh');
      }
    } else {
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger" role="alert">
      <strong><i class="fas fa-file-excel"></i> | Foto terlalu besar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/daftar_jasa', 'refresh');
    }
  } else {
    $cekx = $this->db->get_where('daftar_jasa', $key)->row();
    if ($cekx) {
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger" role="alert">
      <strong><i class="fas fa-file-excel"></i> | Akun sudh terdaftar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/daftar_jasa', 'refresh');
    } else {

      $data['nama_jasa'] = $this->input->post('nama_jasa');
      $data['deskripsi_jasa'] = $this->input->post('deskripsi_jasa');
      $ode['userid'] = $this->input->post('no_hp');
      $ode['jenis_jasa'] = $this->input->post('jenis_jasa');
      $ode['level'] = 'daftar_jasa';
      //menyimpan data ke database;
      $this->db->insert('daftar_jasa', $data);
      $this->db->insert('home', $ode);
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success" role="alert">
      <strong><i class="fas fa-check"></i> | Akun berhasil di daftar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/daftar_jasa', 'refresh');
    }
  }
}



#================= hapus penyedia jasa ==========================
public function hapus_penyedia($id_penyedia_jasa)
{
   $this->db->query("DELETE FROM penyedia_jasa WHERE id_penyedia_jasa=$id_penyedia_jasa");
   $this->session->set_flashdata('pesan', '
           <div class="alert alert-danger" role="alert">
           <strong><i class="fas fa-file-excel"></i> | Data anda berhasil terhapus !</strong>
           </div>
               <script type="text/javascript">
               window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                   $(this).remove(); 
               });
           }, 10026);
           </script>'
           );
   redirect('admin/vpjasa','refresh');
}

#========================== hapus pengguna jasa =====================
public function hapus_pengguna($id_pengguna_jasa)
{
   $this->db->query("DELETE FROM pengguna_jasa WHERE id_pengguna_jasa=$id_pengguna_jasa");
   $this->session->set_flashdata('pesan', '
           <div class="alert alert-danger" role="alert">
           <strong><i class="fas fa-file-excel"></i> | Data anda berhasil terhapus !</strong>
           </div>
               <script type="text/javascript">
               window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                   $(this).remove(); 
               });
           }, 10026);
           </script>'
           );
   redirect('admin/vujasa','refresh');
}

#================= hapus penyedia jasa ==========================
public function hapus_daftar_jasa($id_daftar_jasa)
{
   $this->db->query("DELETE FROM daftar_jasa WHERE id_daftar_jasa=$id_daftar_jasa");
   $this->session->set_flashdata('pesan', '
           <div class="alert alert-danger" role="alert">
           <strong><i class="fas fa-file-excel"></i> | Jasa berhasil terhapus !</strong>
           </div>
               <script type="text/javascript">
               window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                   $(this).remove(); 
               });
           }, 10026);
           </script>'
           );
   redirect('admin/daftar_jasa','refresh');
}

#===================== edit verifikasi penyedia jasa =============================
public function edit_verifikasi_jasa(){

  $putu = [
      'kd_verifikasi' => $this->input->post('kd_verifikasi'),
    ];
    $oka['userid'] = $this->input->post('no_hp');
$key= $this->input->post('id_penyedia_jasa');
 $this->db->where('id_penyedia_jasa',$key);
  $this->db->update('penyedia_jasa', $putu);
  $this->db->update('login',$putu, $oka);

  $this->session->set_flashdata('pesan', '
       <div class="alert alert-success" role="alert">
       <strong><i class="fas fa-check"></i> | Akun berhasil terverifikasi silakan login !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/verif', 'refresh');
  
}

#===================== edit verifikasi pengguna jasa =============================
public function edit_verifikasi_jasa1(){

  $putu = [
      'kd_verifikasi' => $this->input->post('kd_verifikasi'),
    ];
    $oka['userid'] = $this->input->post('no_hp');
$key= $this->input->post('id_pengguna_jasa');
 $this->db->where('id_pengguna_jasa',$key);
  $this->db->update('pengguna_jasa', $putu);
  $this->db->update('login',$putu, $oka);

  $this->session->set_flashdata('pesan', '
       <div class="alert alert-success" role="alert">
       <strong><i class="fas fa-check"></i> | Akun berhasil terverifikasi silakan login !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/verif1', 'refresh');
  
}

#======================= Edit penyedia jasa ===========================
function edit_penyedia_jasa(){
  $key = $this->input->post('id');
  $name = $this->input->post('no_hp');
  $config['upload_path'] = 'assets/foto_penyedia_jasa/';
  $config['allowed_types'] = 'jpg|png';
  // $config['max_size'] = 10000;
  $config['file_name'] = $name;
  $config['overwrite'] = true;

  $this->upload->initialize($config);
  if (!empty($_FILES['foto']['name'])) {
    if ($this->upload->do_upload('foto')){
      
        $putu = [
            'no_hp' => $this->input->post('no_hp'),
            'nama_penyedia' => $this->input->post('nama_penyedia'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nama_brand' => $this->input->post('nama_brand'),
            'jenis_jasa' => $this->input->post('jenis_jasa'),
            'foto' => $this->upload->data('file_name')
            
          ];
          $o['userid'] = $this->input->post('no_hp');
          $data = [
            'userid' => $this->input->post('no_hp'),
            'nama' => $this->input->post('nama_penyedia'),
            'password' => $this->input->post('password'),
            'foto' => $this->upload->data('file_name'),
            'level' => 'penyedia_jasa',
          ];
      $this->db->where('id_penyedia_jasa',$key);
        $this->db->update('penyedia_jasa', $putu);
        $this->db->update('login', $data, $o);
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success" role="alert">
        <strong><i class="fas fa-check"></i> | Akun berhasil di ubah !</strong>
        </div>
            <script type="text/javascript">
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 10026);
        </script>'
        );
        redirect('admin/vpjasa', 'refresh');
     } else {
       $this->session->set_flashdata('pesan', '
       <div class="alert alert-danger" role="alert">
       <strong><i class="fas fa-file-excel"></i> | Foto terlalu besar !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/vpjasa', 'refresh');
     }
   } else {
       $data['no_hp'] = $this->input->post('no_hp');
       $data['nama_penyedia'] = $this->input->post('nama_penyedia');
       $data['jk'] = $this->input->post('jk');
       $data['alamat'] = $this->input->post('alamat');
       $data['tempat_lahir'] = $this->input->post('tempat_lahir');
       $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
       $data['nama_brand'] = $this->input->post('nama_brand');
       $data['jenis_jasa'] = $this->input->post('jenis_jasa');
      // Untuk login
       $o['userid'] = $this->input->post('no_hp');
       $ode['userid'] = $this->input->post('no_hp');
       $ode['nama'] = $this->input->post('nama_penyedia');
       $ode['level'] = 'penyedia_jasa';
       $passwordo = $this->input->post('password');
       if ($passwordo) $ode['password'] = $passwordo;
       //$ode['password'] = $this->input->post('password');
       //menyimpan data ke database;
       
       $this->db->where('id_penyedia_jasa',$key);
       $this->db->update('penyedia_jasa', $data);
       $this->db->update('login', $ode, $o);
       $this->session->set_flashdata('pesan', '
       <div class="alert alert-success" role="alert">
       <strong><i class="fas fa-check"></i> | Akun berhasil di ubah !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/vpjasa', 'refresh');
   }
}

#======================= Edit pengguna jasa ===========================
function edit_pengguna_jasa(){
  $key = $this->input->post('id');
  $name = $this->input->post('no_hp');
  $config['upload_path'] = 'assets/foto_pengguna_jasa/';
  $config['allowed_types'] = 'jpg|png';
  // $config['max_size'] = 10000;
  $config['file_name'] = $name;
  $config['overwrite'] = true;

  $this->upload->initialize($config);
  if (!empty($_FILES['foto']['name'])) {
    if ($this->upload->do_upload('foto')){
        $odek = [
            'no_hp' => $this->input->post('no_hp'),
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'foto' => $this->upload->data('file_name')
            
          ];
          $o['userid'] = $this->input->post('no_hp');
          $data = [
            'userid' => $this->input->post('no_hp'),
            'nama' => $this->input->post('nama_pengguna'),
            'password' => $this->input->post('password'),
            'foto' => $this->upload->data('file_name'),
            'level' => 'pengguna_jasa',
          ];
       $this->db->where('id_pengguna_jasa',$key);
        $this->db->update('pengguna_jasa', $odek);
        $this->db->update('login', $data, $o);
        $this->session->set_flashdata('pesan', '
       <div class="alert alert-success" role="alert">
       <strong><i class="fas fa-check"></i> | Akun berhasil di ubah !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/vujasa', 'refresh');
    } else {
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger" role="alert">
      <strong><i class="fas fa-file-excel"></i> | Foto terlalu besar !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/vujasa', 'refresh');
    }
  } else {
      $data['no_hp'] = $this->input->post('no_hp');
      $data['nama_pengguna'] = $this->input->post('nama_pengguna');
      $data['jk'] = $this->input->post('jk');
      $data['alamat'] = $this->input->post('alamat');
      $data['tempat_lahir'] = $this->input->post('tempat_lahir');
      $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
     // Untuk login
      $o['userid'] = $this->input->post('no_hp');
      $ode['userid'] = $this->input->post('no_hp');
      $ode['nama'] = $this->input->post('nama_pengguna');
      $ode['level'] = 'pengguna_jasa';
      $passwordo = $this->input->post('password');
      if ($passwordo) $ode['password'] = $passwordo;
      //$ode['password'] = $this->input->post('password');
      //menyimpan data ke database;
      $this->db->where('id_pengguna_jasa',$key);
      $this->db->update('pengguna_jasa', $data);
      $this->db->update('login', $ode, $o);
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-success" role="alert">
      <strong><i class="fas fa-check"></i> | Akun berhasil di ubah !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('admin/vujasa', 'refresh');
  }
}

#================== hapus pemesanan ================
public function hapus_dp_pesanan($Id_keranjang_pemesan)
{
   $this->db->query("DELETE FROM keranjang_pesanan WHERE Id_keranjang_pemesan = $Id_keranjang_pemesan");
   $this->session->set_flashdata('pesan', '
           <div class="alert alert-danger" role="alert">
           <strong><i class="fas fa-file-excel"></i> | Data anda berhasil terhapus !</strong>
           </div>
               <script type="text/javascript">
               window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                   $(this).remove(); 
               });
           }, 10026);
           </script>'
           );
   redirect('admin/dp_pesanan','refresh');
}

#=========================== edit pemesanan ====================
function edit_dp_pesanan(){
  $key = $this->input->post('id');
          $putu = [
               'telepon_pemesan' => $this->input->post('telepon_pemesan'),
              'nama_pemesan' => $this->input->post('nama_pemesan'),
              'alamat_pemesan' => $this->input->post('alamat_pemesan'),
              'tanggal_pemesan' => $this->input->post('tanggal_pemesan'),
              'permintaan_pemesan' => $this->input->post('permintaan_pemesan'),
            ];
            $this->db->where('Id_keranjang_pemesan',$key);
          $this->db->update('keranjang_pesanan', $putu);
          $this->session->set_flashdata('pesan', '
         <div class="alert alert-success" role="alert">
         <strong><i class="fas fa-check"></i> | Akun berhasil di ubah !</strong>
         </div>
             <script type="text/javascript">
             window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                 $(this).remove(); 
             });
         }, 10026);
         </script>'
         );
         redirect('admin/dp_pesanan', 'refresh');

    }

    // hapus penyedia jasa
    public function hapus_verifikasi($id_penyedia_jasa)
{
   $this->db->query("DELETE FROM penyedia_jasa WHERE id_penyedia_jasa=$id_penyedia_jasa");
   $this->session->set_flashdata('pesan', '
           <div class="alert alert-danger" role="alert">
           <strong><i class="fas fa-file-excel"></i> | Akun anda berhasil terhapus !</strong>
           </div>
               <script type="text/javascript">
               window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                   $(this).remove(); 
               });
           }, 10026);
           </script>'
           );
   redirect('admin/verif','refresh');
}
  
// hapus pengguna jasa
public function hapus_verifikasi1($id_pengguna_jasa)
{
   $this->db->query("DELETE FROM pengguna_jasa WHERE id_pengguna_jasa=$id_pengguna_jasa");
   $this->session->set_flashdata('pesan', '
           <div class="alert alert-danger" role="alert">
           <strong><i class="fas fa-file-excel"></i> | Akun anda berhasil terhapus !</strong>
           </div>
               <script type="text/javascript">
               window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                   $(this).remove(); 
               });
           }, 10026);
           </script>'
           );
   redirect('admin/verif1','refresh');
}

#======================= Edit daftar jasa ===========================
function edit_daftar_jasa(){
  $key = $this->input->post('id_daftar_jasa');
  $name = $this->input->post('nama_jasa');
  $config['upload_path'] = 'assets/foto_daftar_jasa/';
  $config['allowed_types'] = 'jpg|png';
  // $config['max_size'] = 10000;
  $config['file_name'] = $name;
  $config['overwrite'] = true;

  $this->upload->initialize($config);
  if (!empty($_FILES['foto']['name'])) {
    if ($this->upload->do_upload('foto')){
      
        $putu = [
            'nama_jasa' => $this->input->post('nama_jasa'),
            'jenis_jasa' => $this->input->post('jenis_jasa'),
            'foto' => $this->upload->data('file_name'),
            'deskripsi_jasa' => $this->upload->data('deskripsi_jasa')
            
          ];
          $data = [
            'nama_jasa' => $this->input->post('nama_jasa'),
            'jenis_jasa' => $this->input->post('jenis_jasa'),
            'foto' => $this->upload->data('file_name'),
          ];
      $this->db->where('id_daftar_jasa',$key);
        $this->db->update('daftar_jasa', $putu);
        $this->db->update('login', $data);
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-success" role="alert">
        <strong><i class="fas fa-check"></i> | Akun berhasil di ubah !</strong>
        </div>
            <script type="text/javascript">
            window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 10026);
        </script>'
        );
        redirect('admin/daftar_jasa', 'refresh');
     } else {
       $this->session->set_flashdata('pesan', '
       <div class="alert alert-danger" role="alert">
       <strong><i class="fas fa-file-excel"></i> | Foto terlalu besar !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/daftar_jasa', 'refresh');
     }
   } else {
   
       $data['nama_jasa'] = $this->input->post('nama_jasa');
       $data['jenis_jasa'] = $this->input->post('jenis_jasa');
       $data['deskripsi_jasa'] = $this->input->post('deskripsi_jasa');
      // Untuk login
       $o['userid'] = $this->input->post('no_hp');
       $ode['userid'] = $this->input->post('no_hp');
       $ode['nama'] = $this->input->post('nama_penyedia');
       $ode['level'] = 'penyedia_jasa';
       $passwordo = $this->input->post('password');
       if ($passwordo) $ode['password'] = $passwordo;
       //$ode['password'] = $this->input->post('password');
       //menyimpan data ke database;
       
       $this->db->where('id_daftar_jasa',$key);
       $this->db->update('daftar_jasa', $data);
       $this->db->update('login', $ode);
       $this->session->set_flashdata('pesan', '
       <div class="alert alert-success" role="alert">
       <strong><i class="fas fa-check"></i> | Akun berhasil di ubah !</strong>
       </div>
           <script type="text/javascript">
           window.setTimeout(function() {
           $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
           });
       }, 10026);
       </script>'
       );
       redirect('admin/daftar_jasa', 'refresh');
   }
}




}

?>
<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Penyedia_jasa extends CI_Controller {

public function index()
{
    // $data['pesanan'] = $this->db->get_where('keranjang_pesanan')->num_rows();
    // $data['keranjang'] = $this->db->get_where('keranjang_pesanan')->num_rows();
   
    //$data['keranjang'] = $this->db->get_where('keranjang_pesanan',$filter)->row();
    $filter['no_hp'] = $this->session->userdata('userid');
    $variable = $this->db->get_where('penyedia_jasa',$filter)->row();

    $kurang_ajar['id_penyedia_jasa'] =  $variable->id_penyedia_jasa;
    $data['keranjang'] = $this->db->get_where('keranjang_pesanan',$kurang_ajar)->num_rows();
    $this->template->load('template','penyedia_jasa/home',$data);         
}
public function profil()
{
    $filter['no_hp'] = $this->session->userdata('userid');
    $data['oka'] = $this->db->get_where('penyedia_jasa',$filter)->row();
   $this->template->load('template','penyedia_jasa/profil',$data);
}
public function pemesan(){
  $filter2['no_hp'] = $this->session->userdata('userid');
  $variable = $this->db->get_where('penyedia_jasa',$filter2)->row();
//   foreach ($variable as $key) {
//    $kumbou = $key->id_penyedia_jasa;
//   }
//  $filter['id_penyedia_jasa'] = $kumbou;

  $filter['id_penyedia_jasa'] = $variable->id_penyedia_jasa;
  $data['list_pemesanan'] = $this->db->get_where('keranjang_pesanan',$filter)->result();
  $this->template->load('template','penyedia_jasa/pemesan', $data);
}



#================== hapus pemesan ================================
public function hapus_pemesan($Id_keranjang_pemesan)
{
   $this->db->query("DELETE FROM keranjang_pesanan WHERE Id_keranjang_pemesan = $Id_keranjang_pemesan");
   $this->session->set_flashdata('pesan', '
           <div class="alert alert-success" role="alert">
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
   redirect('penyedia_jasa/pemesan','refresh');
}


#==========================edit Status pemesan====================
public function edit_status_pemesan(){

    $putu = [
        'status_pemesan' => $this->input->post('status_pemesan'),
      ];
  $key= $this->input->post('Id_keranjang_pemesan');
   $this->db->where('Id_keranjang_pemesan',$key);
    $this->db->update('keranjang_pesanan', $putu);

    $this->session->set_flashdata('pesan', '
         <div class="alert alert-success" role="alert">
         <strong><i class="fas fa-check"></i> | Status telah di ubah !</strong>
         </div>
             <script type="text/javascript">
             window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
                 $(this).remove(); 
             });
         }, 10026);
         </script>'
         );
         redirect('penyedia_jasa/pemesan', 'refresh');
    
}
#=========================== edit pemesan ====================
function edit_pemesan(){
          $putu = [
              'telepon_pemesan' => $this->input->post('telepon_pemesan'),
              'nama_pemesan' => $this->input->post('nama_pemesan'),
              'alamat_pemesan' => $this->input->post('alamat_pemesan'),
              'tanggal_pemesan' => $this->input->post('tanggal_pemesan'),
              'permintaan_pemesan' => $this->input->post('permintaan_pemesan'),
            ];
        
         $this->db->where('id_penyedia_jasa',$key);
          $this->db->update('pemesanan', $putu);
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
         redirect('penyedia_jasa/pemesan', 'refresh');
    }

    #=================== unggah foto ============
    function unggah_foto(){
    $data['info'] = '';
    $filter['no_hp'] = $this->session->userdata('userid');
    $data['oka'] = $this->db->get_where('penyedia_jasa',$filter)->row();
    $this->template->load('template','penyedia_jasa/unggah_foto',$data);  
    }

    function proses_unggah_foto(){
        $key = $this->input->post('no_hp');
        $name = $this->input->post('no_hp');
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
                  'foto' => $this->upload->data('file_name')
                ];
                $o['userid'] = $this->input->post('no_hp');
                $data = [
                    'userid' => $this->input->post('no_hp'),
                    'foto' => $this->upload->data('file_name'),
                    'level' => 'penyedia_jasa',
                ];
             $this->db->where('no_hp',$key);
              $this->db->update('penyedia_jasa', $ode);
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
             redirect('penyedia_jasa/profil', 'refresh');
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
            redirect('penyedia_jasa/profil', 'refresh');
          }

        } else {
            $data['no_hp'] = $this->input->post('no_hp');
           // Untuk login
            $o['userid'] = $this->input->post('no_hp');
            $ode['userid'] = $this->input->post('no_hp');
            $ode['level'] = 'penyedia_jasa';
            //menyimpan data ke database;
            $this->db->where('no_hp',$key);
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
            redirect('penyedia_jasa/profil', 'refresh');
        }
    }

    

    #======================= edit foto dokumentasi 1 ================================
    function unggah_foto1(){
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['oka'] = $this->db->get_where('penyedia_jasa',$filter)->row();
       $this->template->load('template','penyedia_jasa/unggah_foto1',$data);
    }
     
      function proses_unggah_foto1(){
        $key = $this->input->post('no_hp');
        $name = $this->input->post('no_hp');
        $config['upload_path'] = 'assets/foto_dokumentasi/';
        $config['allowed_types'] = 'jpg|png';
        // $config['max_size'] = 10000;
        $config['file_name'] = $name;
        $config['overwrite'] = true;
      
        $this->upload->initialize($config);
        if (!empty($_FILES['foto1']['name'])) {
          if ($this->upload->do_upload('foto1')){
              $ode = [
                  'no_hp' => $this->input->post('no_hp'),
                  'foto1' => $this->upload->data('file_name')
                  
                ];
                $o['userid'] = $this->input->post('no_hp');
             $this->db->where('no_hp',$key);
              $this->db->update('penyedia_jasa', $ode);
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
             redirect('penyedia_jasa/profil', 'refresh');
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
            redirect('penyedia_jasa/profil', 'refresh');
          }

        } else {
            $data['no_hp'] = $this->input->post('no_hp');
           // Untuk login
            $o['userid'] = $this->input->post('no_hp');
            $ode['userid'] = $this->input->post('no_hp');
            $ode['level'] = 'penyedia_jasa';
            //menyimpan data ke database;
            $this->db->where('no_hp',$key);
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
            redirect('penyedia_jasa/profil', 'refresh');
        }
    }

    #======================= edit foto dokumentasi 2 ================================
    function unggah_foto2(){
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['oka'] = $this->db->get_where('penyedia_jasa',$filter)->row();
       $this->template->load('template','penyedia_jasa/unggah_foto2',$data);
    }
     
      function proses_unggah_foto2(){
        $key = $this->input->post('no_hp');
        $name = $this->input->post('no_hp');
        $config['upload_path'] = 'assets/foto_dokumentasi1/';
        $config['allowed_types'] = 'jpg|png';
        // $config['max_size'] = 10000;
        $config['file_name'] = $name;
        $config['overwrite'] = true;
      
        $this->upload->initialize($config);
        if (!empty($_FILES['foto2']['name'])) {
          if ($this->upload->do_upload('foto2')){
              $ode = [
                  'no_hp' => $this->input->post('no_hp'),
                  'foto2' => $this->upload->data('file_name')
                  
                ];
                $o['userid'] = $this->input->post('no_hp');
             $this->db->where('no_hp',$key);
              $this->db->update('penyedia_jasa', $ode);
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
             redirect('penyedia_jasa/profil', 'refresh');
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
            redirect('penyedia_jasa/profil', 'refresh');
          }

        } else {
            $data['no_hp'] = $this->input->post('no_hp');
           // Untuk login
            $o['userid'] = $this->input->post('no_hp');
            $ode['userid'] = $this->input->post('no_hp');
            $ode['level'] = 'penyedia_jasa';
            //menyimpan data ke database;
            $this->db->where('no_hp',$key);
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
            redirect('penyedia_jasa/profil', 'refresh');
        }
    }

    function unggah_foto3(){
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['oka'] = $this->db->get_where('penyedia_jasa',$filter)->row();
       $this->template->load('template','penyedia_jasa/unggah_foto3',$data);
    }
     
      function proses_unggah_foto3(){
        $key = $this->input->post('no_hp');
        $name = $this->input->post('no_hp');
        $config['upload_path'] = 'assets/foto_dokumentasi3/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        // $config['max_size'] = 10000;
        $config['max_width'] = 1920; // Maximum width in pixels
$config['max_height'] = 1080; // Maximum height in pixels
        $config['file_name'] = $name;
        $config['overwrite'] = true;
      
        $this->upload->initialize($config);
        if (!empty($_FILES['foto3']['name'])) {
          if ($this->upload->do_upload('foto3')){
              $ode = [
                  'no_hp' => $this->input->post('no_hp'),
                  'foto3' => $this->upload->data('file_name')
                  
                ];
                $o['userid'] = $this->input->post('no_hp');
             $this->db->where('no_hp',$key);
              $this->db->update('penyedia_jasa', $ode);
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
             redirect('penyedia_jasa/profil', 'refresh');
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
            redirect('penyedia_jasa/profil', 'refresh');
          }

        } else {
            $data['no_hp'] = $this->input->post('no_hp');
           // Untuk login
            $o['userid'] = $this->input->post('no_hp');
            $ode['userid'] = $this->input->post('no_hp');
            $ode['level'] = 'penyedia_jasa';
            //menyimpan data ke database;
            $this->db->where('no_hp',$key);
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
            redirect('penyedia_jasa/profil', 'refresh');
        }
    }

          #================== edit profil =================
function edit_profil(){
    $filter['no_hp'] = $this->session->userdata('userid');
    $data['oka'] = $this->db->get_where('penyedia_jasa',$filter)->row();
   $this->template->load('template','penyedia_jasa/edit_profil',$data);
}

  
function proses_edit_profil(){
    $key = $this->input->post('id');
      $data['no_hp'] = $this->input->post('no_hp');
      $data['nama_penyedia'] = $this->input->post('nama_penyedia');
      $data['jk'] = $this->input->post('jk');
      $data['alamat'] = $this->input->post('alamat');
      $data['tempat_lahir'] = $this->input->post('tempat_lahir');
      $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
      $data['nama_brand'] = $this->input->post('nama_brand');
      $data['jenis_jasa'] = $this->input->post('jenis_jasa');
      $data['deskripsi_jasa'] = $this->input->post('deskripsi_jasa');
      $data['profil_penyedia'] = $this->input->post('profil_penyedia');
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
      <strong><i class="fas fa-check"></i> | Data berhasil di ubah !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('penyedia_jasa/profil', 'refresh');
    }

    function detail_pemesan($Id_keranjang_pemesan){
        $filter['Id_keranjang_pemesan'] = $Id_keranjang_pemesan;
        $data['list_pemesanan'] = $this->db->get_where('keranjang_pesanan',$filter)->result();
        $data['data'] = $this->db->get_where('keranjang_pesanan',$filter)->row();
        $this->template->load('template','penyedia_jasa/detail_pemesan',$data);
    }
 }

    /* End of file  penyedia_jasa.php */
        
                            
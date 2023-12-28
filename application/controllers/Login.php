<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller {

public function index()
{
   $this->load->view('Login/login');         
}

public function proses()
{
    $data['userid'] = $this->input->post('userid');
    $data['password'] = $this->input->post('password');

    $this->db->where('kd_verifikasi = 1');
    $cek = $this->db->get_where('login',$data);
    if ($cek->num_rows() > 0) {
        $usr = $cek->row_array();
        $this->session->set_userdata($usr);
        if ($usr['level'] == 'admin') {
        redirect('admin');
        }
        else if ($usr['level'] == 'penyedia_jasa'){
        redirect('penyedia_jasa');
        }
        else {
        redirect('pengguna_jasa');
        }
    }
    else
    {
      $this->session->set_flashdata('pesan', '
      <div class="alert alert-danger" role="alert">
      <strong><i class="fas fa-file-excel"></i> | Userid dan password salah !</strong>
      </div>
          <script type="text/javascript">
          window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
          });
      }, 10026);
      </script>'
      );
      redirect('login', 'refresh');
    }
}

public function logout()
{
    session_destroy();
    $this->load->view('login/login');
    
}

public function daftar_pengguna_jasa()
{
    $this->load->view('login/daftar_pengguna_jasa');
}



function proses_daftar_pengguna_jasa(){
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
              'foto' => $this->upload->data('file_name'),
              'kd_verifikasi' => 1,
              
            ];
            
            $data = [
              'userid' => $this->input->post('no_hp'),
              'nama' => $this->input->post('nama_pengguna'),
              'password' => $this->input->post('password'),
              'foto' => $this->upload->data('file_name'),
              'level' => 'pengguna_jasa',
              'kd_verifikasi' => 1,
            ];
        $cek = $this->db->get_where('pengguna_jasa', $key)->row();
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
            redirect('login', 'refresh');
        } else {
          $this->db->insert('pengguna_jasa', $ode);
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
        redirect('login', 'refresh');
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
        redirect('login/daftar_pengguna_jasa', 'refresh');
      }
    } else {
      $cekx = $this->db->get_where('pengguna_jasa', $key)->row();
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
        redirect('login', 'refresh');
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
        redirect('login', 'refresh');
      }
    }
}

#### login penyedia jasa ###
public function daftar_penyedia_jasa()
{
  // menampilkan data ditampilan
  $data['list_daftar_jasa'] = $this->db->get_where('daftar_jasa')->result(); 
  $this->load->view('login/daftar_penyedia_jasa',$data);
}

function proses_daftar_penyedia_jasa(){
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
              'kisaran_harga' => $this->input->post('kisaran_harga'),
              'kd_verifikasi' => '0',
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
            <div class="alert alert-danger" role="alert">
            <strong><i class="fas fa-file-excel"></i> | Akun sudah terdaftar !</strong>
            </div>
                <script type="text/javascript">
                window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 10026);
            </script>'
            );
            redirect('login', 'refresh');
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
        redirect('login', 'refresh');
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
        redirect('login/daftar_penyedia_jasa', 'refresh');
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
        redirect('login', 'refresh');
      } else {
        $data['no_hp'] = $this->input->post('no_hp');
        $data['nama_penyedia'] = $this->input->post('nama_penyedia');
        $data['jk'] = $this->input->post('jk');
        $data['alamat'] = $this->input->post('alamat');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $data['tanggal_lahir'] = $this->input->post('tanggal_lahir');
        $data['nama_brand'] = $this->input->post('nama_brand');
        $data['jenis_jasa'] = $this->input->post('jenis_jasa');
        $data['kisaran_harga'] = $this->input->post('kisaran_harga');

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
        redirect('login', 'refresh');
      }
    }
}

public function lupa_password(){
    $data['title'] = 'lupa_password';
    $this->load->view('login/lupa_password');
  }






}
        
    /* End of file  Login.php */
        
                            
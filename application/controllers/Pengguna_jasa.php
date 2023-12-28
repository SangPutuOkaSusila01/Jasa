<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_jasa extends CI_Controller
{
    public function __construct(){
		parent::__construct();
        $this->load->model('Ajumas_model');
	}

    public function index()
    {
        //$oka['penyedia'] = $this->db->query('select distinct jenis_jasa from penyedia_jasa')->result();
        $key=$this->input->post('cari',true);
		$oka['penyedia']=$this->Ajumas_model->kunci($key);
        $oka['oka7'] = $this->db->get_where('penyedia_jasa')->result();
        //$oka['penyedia'] = $this->db->get_where('daftar_jasa')->result();
        $this->template->load('template', 'pengguna_jasa/home', $oka);
    }

    public function profil()
    {
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['oka'] = $this->db->get_where('pengguna_jasa', $filter)->row();
        $this->template->load('template', 'pengguna_jasa/profil', $data);
    }

    public function tampilan_pengguna($jenis_jasa)
    {
        $key['no_hp'] = $this->session->userdata('userid');
        $oka['oka'] = $this->db->get_where('pengguna_jasa', $key)->row();

        $oka['oka1'] = $this->db->get_where('rating')->row();


        $filter['jenis_jasa'] = $jenis_jasa;
        $oka['oka7'] = $this->db->get_where('penyedia_jasa', $filter)->result();
        $this->template->load('template', 'pengguna_jasa/tampilan_pengguna', $oka);
    }

    public function checkout($id_pengguna_jasa)
    {
        $data['id_penyedia_jasa'] = $id_pengguna_jasa;
        $cek_jasa['id_penyedia_jasa'] = $id_pengguna_jasa;
        $data['jasa'] = $this->db->get_where('penyedia_jasa', $cek_jasa)->row();
        
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['oka'] = $this->db->get_where('pengguna_jasa', $filter)->row();
        
        // $cek_jasa['id_pengguna_jasa'] = $id_pengguna_jasa;
        // $data['jasa'] = $this->db->get_where('pengguna_jasa', $cek_jasa)->row();
        
        
        $this->template->load('template', 'pengguna_jasa/checkout', $data);
    }



    #============tampilan untuk menyimpan===============
    public function simpan_pesanan()
    {
        date_default_timezone_set('Asia/Kuching');
      
        $data['id_pengguna_jasa']   = $this->input->post('id_pengguna_jasa');
        $data['id_penyedia_jasa']   = $this->input->post('id_penyedia_jasa');
        $data['nama_penyedia']   = $this->input->post('nama_penyedia');
        $data['jenis_jasa']         = $this->input->post('jenis_jasa');
        $data['nama_pemesan']       = $this->input->post('nama_pemesan');
        $data['alamat_pemesan']     = $this->input->post('alamat_pemesan');
        $data['telepon_pemesan']    = $this->input->post('telepon_pemesan');
        $data['permintaan_pemesan'] = $this->input->post('permintaan_pemesan');
        $data['tanggal_pemesan']    = date('Y/m/d');
        $data['status_pemesan']     = '0';

        // $this->db->update('permintaan_pemesan', $data);
        $this->db->insert('keranjang_pesanan', $data);
    
        $this->session->set_flashdata(
            'pesan',
                '<div class="alert alert-success" role="alert">
                <strong><i class="fas fa-check"></i> Pesanan berhasil disimpan !</strong>
                </div>
                    <script type="text/javascript">
                    window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                }, 10026);
                </script>'
        );
        redirect('Pengguna_jasa/keranjang_pemesan', 'refresh');
    }

    public function keranjang_pemesan()
    {
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['oka'] = $this->db->get('pengguna_jasa', $filter)->row();

        $filterPengguna['telepon_pemesan'] = $this->session->userdata('userid');
        $data['list_keranjang_pemesan'] = $this->db->get_where('keranjang_pesanan',$filterPengguna)->result();
        $this->template->load('template', 'pengguna_jasa/keranjang_pemesan', $data);
    }

    #=================== unggah foto ============
    function unggah_foto()
    {
        $data['info'] = '';
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['coba'] = $this->db->get_where('pengguna_jasa', $filter)->row();
        $this->template->load('template', 'pengguna_jasa/unggah_foto', $data);
    }

    function prses_unggah_foto()
    {
        $key = $this->input->post('no_hp');
        $name = $this->input->post('no_hp');
        $config['upload_path'] = 'assets/foto_pengguna_jasa/';
        $config['allowed_types'] = 'jpg|png';
        // $config['max_size'] = 10000;
        $config['file_name'] = $name;
        $config['overwrite'] = true;

        $this->upload->initialize($config);
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $putu = [
                    'no_hp' => $this->input->post('no_hp'),
                    'foto' => $this->upload->data('file_name')

                ];
                $o['userid'] = $this->input->post('no_hp');
                $data = [
                    'userid' => $this->input->post('no_hp'),
                    'foto' => $this->upload->data('file_name'),
                    'level' => 'pengguna_jasa',
                ];
                $this->db->where('no_hp', $key);
                $this->db->update('pengguna_jasa', $putu);
                $this->db->update('login', $data, $o);
                $this->session->set_flashdata(
                    'pesan',
                    '
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
                redirect('pengguna_jasa/profil', 'refresh');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '
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
                redirect('pengguna_jasa/profil', 'refresh');
            }
        } else {
            $data['no_hp'] = $this->input->post('no_hp');
            // Untuk login
            $o['userid'] = $this->input->post('no_hp');
            $ode['userid'] = $this->input->post('no_hp');
            $ode['level'] = 'pengguna_jasa';
            //menyimpan data ke database;
            $this->db->where('no_hp', $key);
            $this->db->update('pengguna_jasa', $data);
            $this->db->update('login', $ode, $o);
            $this->session->set_flashdata(
                'pesan',
                '
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
            redirect('pengguna_jasa/profil', 'refresh');
        }
    }


    #================== edit profil =================
    function edit_profil()
    {
        $filter['no_hp'] = $this->session->userdata('userid');
        $data['oka'] = $this->db->get_where('pengguna_jasa', $filter)->row();
        $this->template->load('template', 'pengguna_jasa/edit_profil', $data);
    }


    function prses_edit_profil()
    {
        $key = $this->input->post('id');
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
        $this->db->where('id_pengguna_jasa', $key);
        $this->db->update('pengguna_jasa', $data);
        $this->db->update('login', $ode, $o);
        $this->session->set_flashdata(
            'pesan',
            '
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
        redirect('pengguna_jasa/profil', 'refresh');
    }

    public function list_keranjang_pemesan()
    {
        $filter['no_hp'] = $this->session->userdata('userid');
     $data['list_keranjang_pemesan'] = $this->db->get_where('pengguna_jasa')->result();
    $this->template->load('template','pengguna_jasa/keranjang_pemesan', $data);
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
          $t_pesanan = [
              'no_hp' => $this->input->post('no_hp'),
              'nama_penyedia' => $this->input->post('nama_penyedia'),
              'nama_pengguna' => $this->input->post('nama_pengguna'),
              'alamat' => $this->input->post('alamat'),
              'tempat_lahir' => $this->input->post('tempat_lahir'),
              'tanggal_lahir' => $this->input->post('tanggal_lahir'),
              'jenis_jasa' => $this->input->post('jenis_jasa'),
              'permintaan_pemesan' => $this->upload->data('permintaan_pemesan'),
              'status_pemesan' => $this->upload->data('status_pemesan')
              
            ];
            
            $data = [
              'userid' => $this->input->post('no_hp'),
              'nama' => $this->input->post('nama_penyedia'),
              'password' => $this->input->post('password'),
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
            redirect('pengguna_jasa/keranjang_pemesan', 'refresh');
        } else {
          $this->db->insert('penyedia_jasa', $t_pesanan);
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
        redirect('pengguna_jasa/keranjang_pemesan', 'refresh');
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
        redirect('pengguna_jasa/keranjang_pemesan', 'refresh');
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
        redirect('pengguna_jasa/keranjang_pemesan', 'refresh');
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
    

#================== hapus pemesanan ================
public function hapus_keranjang_pemesan($Id_keranjang_pemesan)
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
   redirect('pengguna_jasa/keranjang_pemesan','refresh');
}

#===================== edit pemesan ==============
    public function edit_keranjang_pemesan(){
        $key = $this->input->post('id');
        $putu = [
            // 'id_pengguna_jasa' => $this->input->post('id_pengguna_jasa'),
            'id_penyedia_jasa' => $this->input->post('id_penyedia_jasa'),
            'jenis_jasa' => $this->input->post('jenis_jasa'),
            'telepon_pemesan' => $this->input->post('telepon_pemesan'),
            'nama_penyedia' => $this->input->post('nama_penyedia'),
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'alamat_pemesan' => $this->input->post('alamat_pemesan'),
            'tanggal_pemesan' => $this->input->post('tanggal_pemesan'),
            'permintaan_pemesan' => $this->input->post('permintaan_pemesan'),
          ];
      
          $this->db->where('Id_keranjang_pemesan',$key);
          $this->db->update('keranjang_pesanan', $putu);
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
       redirect('pengguna_jasa/keranjang_pemesan', 'refresh');
    }

    // function proses_reting(){
    //     $key['id_pengguna_jasa'] = $this->input->post('id_pengguna_jasa');
    //     $data['id_pengguna_jasa'] = $this->input->post('id_pengguna_jasa');
    //     $data['id_penyedia_jasa'] = $this->input->post('id_penyedia_jasa');
    //     $data['nama'] = $this->input->post('nama_penyedia');
    //     $data['rating'] = $this->input->post('rating');
    
    //     // Periksa apakah pengguna sudah memberikan rating sebelumnya
    //     $cari = $this->db->get_where('rating', $key)->row();
        
    //     if ($cari) {
    //         // Jika pengguna sudah memberikan rating sebelumnya
    //         // Periksa apakah rating diberikan kepada penyedia jasa yang sama atau tidak
    //         if ($cari->id_penyedia_jasa == $this->input->post('id_penyedia_jasa')) {
    //             // Jika rating diberikan kepada penyedia jasa yang sama, lakukan update
    //             $this->db->update('rating', $data, $key);
    //         } else {
    //             // Jika rating diberikan kepada penyedia jasa yang berbeda, lakukan insert baru
    //             $this->db->insert('rating', $data);
    //         }
    //     } else {
    //         // Jika pengguna belum memberikan rating sebelumnya, lakukan insert baru
    //         $this->db->insert('rating', $data);
    //     }
    
    //     redirect('pengguna_jasa', 'refresh');
    // }
    
        //     function proses_reting(){
        //     $id_pengguna_jasa = $this->input->post('id_pengguna_jasa');
        //     $id_penyedia_jasa = $this->input->post('id_penyedia_jasa');
        //     $nama_penyedia = $this->input->post('nama_penyedia');
        //     $rating = $this->input->post('rating');
            
        //     // Ambil data rating terakhir pengguna untuk penyedia jasa tertentu
        //     $last_rating = $this->db
        //         ->where('id_pengguna_jasa', $id_pengguna_jasa)
        //         ->where('id_penyedia_jasa', $id_penyedia_jasa)
        //         ->order_by('waktu', 'desc')
        //         ->limit(1)
        //         ->get('rating')
        //         ->row();

        //     // Jika ada rating sebelumnya
        //     if ($last_rating) {
        //         // Hitung selisih waktu antara rating sebelumnya dan waktu sekarang
        //         $waktu_sekarang = time();
        //         $waktu_rating_sebelumnya = strtotime($last_rating->waktu);
        //         $selisih_waktu = $waktu_sekarang - $waktu_rating_sebelumnya;

        //         // Jika selisih waktu kurang dari 1800 detik (30 menit), tampilkan notifikasi
        //         if ($selisih_waktu < 1800) {
        //             echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        //                     Anda hanya dapat mengubah rating setiap 30 menit.
        //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                         <span aria-hidden="true">&times;</span>
        //                     </button>
        //                 </div>';
        //             return;
        //         }
        //     }

        //     // Jika waktu telah berlalu atau tidak ada rating sebelumnya, lakukan proses rating
        //     $data = array(
        //         'id_pengguna_jasa' => $id_pengguna_jasa,
        //         'id_penyedia_jasa' => $id_penyedia_jasa,
        //         'nama' => $nama_penyedia,
        //         'rating' => $rating,
        //         'waktu' => date('Y-m-d H:i:s'), // Simpan waktu saat ini
        //     );

        //     $this->db->insert('rating', $data);

        //     // Tampilkan notifikasi sukses jika diperlukan
        //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //             Rating berhasil ditambahkan.
        //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //             </button>
        //         </div>';

        //     redirect('pengguna_jasa', 'refresh');
        // }



        function proses_reting(){
            $id_pengguna_jasa = $this->input->post('id_pengguna_jasa');
            $id_penyedia_jasa = $this->input->post('id_penyedia_jasa');
            $nama_penyedia = $this->input->post('nama_penyedia');
            $rating = $this->input->post('rating');
           

            // Ambil data rating terakhir pengguna untuk penyedia jasa tertentu
            $last_rating = $this->db
                ->where('id_pengguna_jasa', $id_pengguna_jasa)
                ->where('id_penyedia_jasa', $id_penyedia_jasa)
                ->order_by('waktu', 'desc')
                ->limit(1)
                ->get('rating')
                ->row();
        
            // Jika ada rating sebelumnya
            if ($last_rating) {
                // Hitung selisih waktu antara rating sebelumnya dan waktu sekarang
                $waktu_sekarang = time();
                $waktu_rating_sebelumnya = strtotime($last_rating->waktu_terakhir_rating);
                $selisih_waktu = $waktu_sekarang - $waktu_rating_sebelumnya;
        
                // Jika selisih waktu kurang dari 1800 detik (30 menit), tampilkan notifikasi
                if ($selisih_waktu < 1800) {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Anda hanya dapat memberikan rating setiap 30 menit.
                            <a href="' . base_url('pengguna_jasa') . '" class="btn btn-warning">Kembali</a>
                        </div>';
                    return;
                }
            }
            
        
            // Jika waktu telah berlalu atau tidak ada rating sebelumnya, lakukan proses rating
            $data = array(
                'id_pengguna_jasa' => $id_pengguna_jasa,
                'id_penyedia_jasa' => $id_penyedia_jasa,
                'nama' => $nama_penyedia,
                'rating' => $rating,
                'waktu_terakhir_rating' => date('Y-m-d H:i:s'), // Simpan waktu saat ini
            );
        
            $this->db->insert('rating', $data);
        
            // Tampilkan notifikasi sukses jika diperlukan
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Rating berhasil ditambahkan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        
            redirect('pengguna_jasa', 'refresh');
        }

        function edit_pemesan($Id_keranjang_pemesan){
            $filter['Id_keranjang_pemesan'] = $Id_keranjang_pemesan;
            $data['list_keranjang_pemesan'] = $this->db->get_where('keranjang_pesanan',$filter)->result();
            $data['data'] = $this->db->get_where('keranjang_pesanan',$filter)->row();
            $this->template->load('template','pengguna_jasa/edit_pemesan',$data);
        }
        

 

}
        
    /* End of file  Pengguna_jasa.php */
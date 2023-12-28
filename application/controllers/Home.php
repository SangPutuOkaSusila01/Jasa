<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Home extends CI_Controller {

public function index()
{
    //$oka['penyedia']= $this->db->query('select distinct jenis_jasa from penyedia_jasa')->result();
    $oka['penyedia'] = $this->db->get_where('daftar_jasa')->result();
    $this->load->view('home', $oka);  
  
    // if (isset($_GET['cari'])) { 
    //     $query= mysqli_query($coon, "SELECT * FROM daftar_jasa WHERE jenis_jasa LIKE '%". $_GET['cari']."%'" );
    //  }
}

// public function set($oka){
//     $this->db->select('*');
//     $this->db->like('name', $oka);
//     $this->db->or_like('description', $oka);
//     return $this->db->get('daftar_jasa')->result();
// }
// $key = $this->input->post($oka, true);
     
}
        
    /* End of file  Home.php */
        
                            
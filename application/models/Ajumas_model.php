<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Ajumas_model extends CI_Model {
    public function __construct(){
		parent::__construct();
	}
                        
public function kunci($cari)
{
    $this->db->select('*');
    $this->db->like('nama_jasa',$cari);
    $this->db->or_like('jenis_jasa',$cari);
    return $this->db->get('daftar_jasa')->result();                                      
}
                        
                                            
}
                        
/* End of file ajumas.php */
    
                        
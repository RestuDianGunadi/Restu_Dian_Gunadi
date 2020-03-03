<?php 
 /* extend menggunakan CI controller */
class M_login extends CI_Model{	
/* cek login sesuai id */
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}
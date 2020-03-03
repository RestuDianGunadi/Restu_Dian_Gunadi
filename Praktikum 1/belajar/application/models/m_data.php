<?php 
 /* penulisan M_data dianjurkan diawali dengan huruf besar 
 kemudian extend model dengan CI model */
class M_data extends CI_Model{
	/* mengambil data yang ditangkap pada controller */
	function ambil_data(){
		return $this->db->get('user');
	}
}
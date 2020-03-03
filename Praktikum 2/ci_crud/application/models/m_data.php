<?php 
 /* extend menggunakan CI controller */
class M_data extends CI_Model{
  /* mengambil data dari database */
	function tampil_data(){
		return $this->db->get('user');
	}
 /* function input data yang terhubung dengan database */
	function input_data($data,$table){
		$this->db->insert($table,$data);
    }
/* fungsi $where berguna untuk menyelesaikan query dan delete*/    
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
/* function edit data untuk mengubah sesuai dengan database */
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }
/* function untuk update data */
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
}
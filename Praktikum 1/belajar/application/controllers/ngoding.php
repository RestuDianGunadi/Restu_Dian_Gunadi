<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /* exten menggunakan CI controller */
class Ngoding extends CI_Controller {
	
	function index(){
		/* memanggil library malasngoding */
		$this->load->library('malasngoding');
		/* panggil method yang sudah dibuat pada library */
		$this->malasngoding->nama_saya();
                echo "<br/>";
                $this->malasngoding->nama_kamu("Andi");
	}
 
}
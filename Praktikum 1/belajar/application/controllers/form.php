<?php 
 /* extend menggunakan CI Controller */
class Form extends CI_Controller{
 /* buat form yang dipanggil dengan method
 agar dipanggil pertama kali */
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
 
	function index(){
		$this->load->view('v_form');
	}
 /* membuat form input wajib diisi */
    function aksi(){
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('konfir_email','Konfirmasi Email','required');
     
        if($this->form_validation->run() != false){
            echo "Form validation oke";
        }else{
            $this->load->view('v_form');
        }
    }
}
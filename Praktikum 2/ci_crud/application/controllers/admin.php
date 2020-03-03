<?php 
/* extend menggunakan CI controller */
class Admin extends CI_Controller{
/* cek session status */ 
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}
 /* load admin */
	function index(){
		$this->load->view('v_admin');
	}
}
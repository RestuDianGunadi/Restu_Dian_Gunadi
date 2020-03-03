<?php 

class Login extends CI_Controller{
/* function yang pertama kali dijalankan */
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');

	}
/* load view */
	function index(){
		$this->load->view('v_login');
	}
/* menangkap data username dan password lalu dimasukkan
pada array dan dikirim pada m_login */
	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
/* cek username dan password */			
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("admin/index"));
/* muncul jika username atau password salah */
		}else{
			echo "Username dan password salah !";
		}
	}
/* function untuk logout */
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
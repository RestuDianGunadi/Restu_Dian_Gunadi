<?php 
 
 /* extend dengan CI controller */
class Crud extends CI_Controller{
 /* panggil m_data */
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
 
	}
/* pharsing data ke view v_tampil */
	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil',$data);
	}
/* menambahkan data dari view */ 
	function tambah(){
		$this->load->view('v_input');
	}
 /* menangkap inputan kemudian menjadikannya array */
	function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 /* menginput data ke database menggunakan m_data */
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
/* input array yang berisi data yang di input */
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
/* method hapus dengan varianel $id
berguna untuk menangkap data id yang dikirim */    
    function hapus($id){
/* data dijadikan array dan dikirim ke m_model */
		$where = array('id' => $id);
/* $where berisi id dan parameter kedua berisi nama tabel */
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
/* membuat method edit dan model untuk mengambil data
sesuai dengan id */    
    function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
        $this->load->view('v_edit',$data);
    }
/* menangkap data yang akan diedit */
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
/* masukkan daya yg diupdate 
ke dalam variabel data */
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
     /* tempat id data */
        $where = array(
            'id' => $id
        );
     
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
 
}
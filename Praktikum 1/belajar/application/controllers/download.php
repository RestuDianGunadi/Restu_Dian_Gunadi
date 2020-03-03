<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /* extend menggunakan CI */
class Download extends CI_Controller {
	/* paggil helper download */
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}
 
	public function index(){		
		$this->load->view('v_download');
	}
 /* membuat download file yang sudah ada */
	public function lakukan_download(){				
		force_download('varel.jpeg',NULL);
	}	
 
}
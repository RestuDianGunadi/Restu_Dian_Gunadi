<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 /* extend menggunakan CI controller */
class Mobil extends CI_Controller {
 /* membuat uri segment berurutan
 sesuai dengan yang sudah ditentukan */
	public function warna(){
		echo "Segment 1 adalah = " . $this->uri->segment('1') . "<br/>";		
		echo "Segment 2 adalah = " . $this->uri->segment('2') . "<br/>";		
		echo "Segment 3 adalah = " . $this->uri->segment('3') . "<br/>";		
		echo "Segment 4 adalah = " . $this->uri->segment('4') . "<br/>";		
		echo "Segment 5 adalah = " . $this->uri->segment('5') . "<br/>";	
	}
}
<?php
class Test extends CI_Controller {

        public function index()
        {
        	
        }
		
		public function testCheck(){
			$this->load->model('ModelTest');
			$data['value'] = $this->ModelTest->showState();
			$this->load->view('test/testview', $data);
		}
		
}
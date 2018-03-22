<?php
class Blog extends CI_Controller {

        public function index()
        {
        	$this->load->view('login/login');
        }
		
		public function checkLogin(){
			$this->load->model('ModelBlog');
			//print_r($_POST); die;
			$email = $this->input->post('user_email');
			$psswd = $this->input->post('user_password');
			$result = $this->ModelBlog->checkLogin($email, $psswd);
			if(!empty($result)){
				echo json_encode($result);
			}			
		}
}
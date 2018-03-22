<?php
class ModelBlog extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function callModel(){
    	$var = 'Model Called';
    	echo $var;
    }
	
	public function checkLogin($email, $pwd){
		$this->db->select('login.id, login.userid, login.email, login.phone, user.name');
		$this->db->from(USER_LOGIN.' as login');
		$this->db->join(USER.' as user', 'user.id = login.userid', 'LEFT');
		$this->db->where('login.email',$email);
		$this->db->where('login.password',$pwd);
		$this->db->where('user.status', '1');
		$query = $this->db->get();
		if ( $query->num_rows() > 0 ){
			$row = $query->result_array();
			return $row;
		}
	}

}
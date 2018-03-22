<?php
class ModelTest extends CI_Model {

    public function __construct()
    {
            parent::__construct();
            // Your own constructor code
    }

    public function callModel(){
    	$var = 'Model Called';
    	echo $var;
    }
	
	public function showState(){
		$query = $this->db->get(STATE_TABLE);
		if(sizeof($query)>0){
			return json_encode($query->result_array());
		}
	}

}
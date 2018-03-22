<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ModelSupplier extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	public function supplier(){
		$this->db->select('*');
		$this->db->from(SUPPLIER);
		$query = $this->db->get();
		if ( $query->num_rows() > 0 ){
			$row = $query->result_array();
			return $row;
		}
	}
	
	public function supplierDetails($supplierCode){
		$q = $this->db->get_where(SUPPLIER, array('supplier_code'=>$supplierCode))->result_array();
		return $q;
	}
}
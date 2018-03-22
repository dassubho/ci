<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	class Supplier extends CI_Controller{
		
		public function __construct() {
			parent::__construct();
			$this->load->model('ModelSupplier');
		}
		
		public function index(){
			$this->load->view('supplier/supplier_view');
		}
		
		public function getSupplier(){
			$result = $this->ModelSupplier->supplier();
			if(!empty($result)){
				echo json_encode($result);
			}
		}
		
		public function getSupplierDetails(){
			$supCode = $_POST['sup_code'];
			if($supCode != ''){
				$result = $this->ModelSupplier->supplierDetails($supCode);
				if($result){
					echo json_encode($result);
				}
			}
		}
	}
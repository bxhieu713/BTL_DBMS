<?php
class model_customer extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
      public function updateCoin($input,$id){
        $this->db->where('id', $id);
        return $this->db->update('tbl_customer', $input);
      }
      public function getCusById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_customer');
        return $query->row();
      }
  	}
?>
<?php
class model_san extends CI_Model {
	
      function __construct() { 
          $this->load->database(); 
    	}
    	public function getAllsan(){
        $this->db->select('idsan,tensan,tbl_san.loaisan as idloaisan,dongia,tbl_loaisan.loaisan,tbl_san.createdDate');
        $this->db->from('tbl_san');
        $this->db->join('tbl_loaisan','tbl_san.loaisan = tbl_loaisan.idloaisan');
        $this->db->order_by('tensan','asc');
      	$query = $this->db->get();
        return $query->result();
    	}
      public function getSanById($id){
        $this->db->select('idsan,tensan,dongia,tbl_loaisan.loaisan');
        $this->db->from('tbl_san');
        $this->db->join('tbl_loaisan','tbl_san.loaisan = tbl_loaisan.idloaisan');
         $this->db->where('idsan',$id);
        $query = $this->db->get();
        return $query->row();
      }
      public function getPitchByType($id){
        $this->db->where('loaisan',$id);
        $query = $this->db->get('tbl_san');
        return $query->result();
      }
  	}
?>
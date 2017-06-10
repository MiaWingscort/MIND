<?php
class Ima extends CI_Model{
	function __construct() {
		parent::__construct();
	}

	function dohvati($id){
		$this->db->select('SifInt');
		$this->db->from('ima');
		$this->db->where('SifKor',$id);

		$query=$this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
}
?>
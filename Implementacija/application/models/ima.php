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
	function dodaj($ima) {
		$this->db->insert('ima', $ima);
	}

	function nadjiInteresovanjaZaKorisnika($sifra){
		
		$this->db->select('SifInt');
		$this->db->from('ima');
		$this->db->where('SifKor', $sifra);
	
		$query = $this->db->get();

		return $query->result_array();
	}

	function osveziZaKorisnika($sifra,$interesovanja){
		// $this->db->where('id', $id);
  //  $this->db->delete('testimonials'); 

		$this->db->where('SifKor', $sifra);
		$this->db->delete('ima');

		$this->load->model('interesovanje');
		foreach ($interesovanja as $inter) {
			$sifraInt = $this->interesovanje->nadjiInteresovanjePoImenu($inter);
			
			$imaNiz = array('SifKor' => $sifra, 'SifInt' => $sifraInt->SifInt);
			$this->dodaj($imaNiz);
		}
	}
}
?>
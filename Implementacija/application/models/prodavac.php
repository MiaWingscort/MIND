<?php

/**
* 
*/
class Prodavac extends CI_Model
{

	function __construct() {
		parent::__construct();
	}


	function dodaj($prodavac) {
		$this->db->insert('prodavac', $prodavac);
	}
function nadjiSaSifrom($sifra) {
		$this->db->select('SifKor, Naziv, PIB, Adresa, Telefon, Website');
		$this->db->from('prodavac');
		$this->db->where('SifKor', $sifra);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}

	}

	function promeni($prod){
		$this->db->set('Naziv', $prod['Naziv']);
		$this->db->set('PIB', $prod['PIB']);  
		$this->db->set('Adresa', $prod['Adresa']);  
		$this->db->set('Telefon', $prod['Telefon']);  
		$this->db->set('Website', $prod['Website']);  
		$this->db->where('SifKor', $prod['SifKor']); 
		$this->db->update('prodavac');  
	}
	

}

?>
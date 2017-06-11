<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Ideja extends CI_Model
{

	function __construct() {
		parent::__construct();
	}


	function dodaj($ideja) {
		$this->db->insert('ideja', $ideja);
	}

	function nadjiSaSifrom($sifra) {
		$this->db->select('SifIdeja, SifKor, Naziv, Tekst, PutanjaDoSlike');
		$this->db->from('ideja');
		$this->db->where('SifIdeja', $sifra);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	function vratiSve() {
		$this->db->select('SifIdeja, SifKor, Naziv, Tekst, PutanjaDoSlike');
		$this->db->from('ideja');

		$query = $this->db->get();

		if ($query->num_rows() >= 1) {
			return $query->result_array();
		} else {
			return false;
		}

	}
	function obrisi($idIdeje) {
		$this->db->delete('ideja', array('SifIdeja' => $idIdeje)); 
	}
}

?>
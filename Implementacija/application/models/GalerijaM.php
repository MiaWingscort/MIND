<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class GalerijaM extends CI_Model
{

	function __construct() {
		parent::__construct();
	}


	function dodaj($slika) {
		$this->db->insert('slika_u_galeriji', $slika);
	}

	function nadjiSaSifrom($sifra) {
		$this->db->select('SifSlika, SifKor, PutanjaDoSlike');
		$this->db->from('slika_u_galeriji');
		$this->db->where('SifSlika', $sifra);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	function vratiSve() {
		$this->db->select('SifSlika, SifKor, PutanjaDoSlike');
		$this->db->from('slika_u_galeriji');

		$query = $this->db->get();

		if ($query->num_rows() >= 1) {
			return $query->result_array();
		} else {
			return false;
		}

	}
	function obrisi($idSlike) {
		$this->db->delete('slika_u_galeriji', array('SifSlika' => $idSlike)); 
	}

}

?>
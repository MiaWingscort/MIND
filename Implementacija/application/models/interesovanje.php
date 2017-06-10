<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Interesovanje extends CI_Model
{

	function __construct() {
		parent::__construct();
	}


	function dodaj($interesovanje) {
		$this->db->insert('interesovanje', $interesovanje);
	}

	function nadjiInteresovanjePoSifri($sifra){
		$this->db->select('Naziv');
		$this->db->from('interesovanje');
		$this->db->where('SifInt', $sifra);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}

}

?>
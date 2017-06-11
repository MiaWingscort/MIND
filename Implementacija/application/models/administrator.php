<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Administrator extends CI_Model
{

	function __construct() {
		parent::__construct();
	}


	function dodaj($admin) {
		$this->db->insert('administrator', $admin);
		return $this->db->insert_id();
	}

	function nadjiSaSifrom($sifra) {
		$this->db->select('SifKor, Ime, Prezime');
		$this->db->from('administrator');
		$this->db->where('SifKor', $sifra);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}

	}
	function promeni($admin){
		$this->db->set('Ime', $admin['Ime']);
		$this->db->set('Prezime', $admin['Prezime']);  
		$this->db->where('SifKor', $admin['SifKor']); 
		$this->db->update('administrator');  

		
	}

}

?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Kupovina extends CI_Model
{

	function __construct() {
		parent::__construct();
	}


	function dodaj($kupovina) {
		$this->db->insert('administrator', $kupovina);
	}

	function nadjiKomeKupacKupuje($sifra){

		$this->db->select('Primalac');
		$this->db->from('kupovina');
		$this->db->where('Kupac', $sifra);
		$this->db->where('Status_', 'NIJE_OBAVLJENA');
		$this->db->limit(1);

		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return null;
		}
	}
	
	function otkaziKupovinu($idPrimaoca){
		$sess = $this->session->userdata('logged_in');
		$sifra = $sess['id'];
		$this->db->set('Status_', 'OTKAZANA');
		$this->db->where('Primalac', $idPrimaoca);
		$this->db->where('Kupac', $sifra);  
		$this->db->update('kupovina'); 
	}

}

?>
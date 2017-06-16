<?php

/**
* 
*/
class Igrac extends CI_Model
{

	function __construct() {
		parent::__construct();
	}

	function dodaj($igrac) {
		$this->db->insert('igrac', $igrac);
	}

	function pretrazi($interesovanja) {
		$sess = $this->session->userdata('logged_in');
		$SifKor= $sess['id'];

		$sqlQuery = "SELECT DISTINCT Igr.SifKor, Igr.Ime, Igr.Prezime, Igr.Adresa, Igr.DatumRodjenja, Igr.Pol
					 FROM Igrac AS Igr, Ima AS I
					 WHERE Igr.SifKor NOT IN (SELECT Primalac
											  FROM Kupovina 
											  WHERE Status_ = 'NIJE_OBAVLJENA')
					 AND I.SifInt IN (SELECT SifInt
									 FROM Interesovanje AS Inter
									 WHERE Naziv IN  ?
									)
					 AND I.SifKor  = Igr.SifKor
					 AND Igr.SifKor <> ?";

		$query = $this->db->query($sqlQuery, array($interesovanja, $SifKor));

		$korisnici = $query->result();
		return $korisnici;
	}

	function dohvatiInteresovanja($id) {
		$query = $this->db->query("SELECT Inter.Naziv FROM Interesovanje AS Inter, Ima AS Ima WHERE Inter.SifInt = Ima.SifInt AND Ima.SifKor = " . $id);

		$interesovanja = array();

		foreach ($query->result() as $row)
		{
		    array_push($interesovanja, $row->Naziv);
		}

		return $interesovanja;
	}
	function promeni($igr){
		$this->db->set('Ime', $igr['Ime']);
		$this->db->set('Prezime', $igr['Prezime']);  
		$this->db->set('Adresa', $igr['Adresa']);  
		$this->db->set('Telefon', $igr['Telefon']);  
		$this->db->set('DatumRodjenja', $igr['DatumRodjenja']);
		$this->db->set('Pol', $igr['Pol']);  
		$this->db->where('SifKor', $igr['SifKor']); 
		$this->db->update('igrac');  
	}
	function nadjiSaSifrom($sifra) {
		$this->db->select('SifKor, Ime, Prezime, Adresa, Telefon, DatumRodjenja, Pol');
		$this->db->from('igrac');
		$this->db->where('SifKor', $sifra);
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
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
		$stringPretrage = implode("', '" , $interesovanja);

		$stringPretrage = '(\'' . $stringPretrage . '\')';

		//$id = $this->session->userdata('logged_in')['id'];
		// DODATI DA SE RAZLIKUJE OD ID ULOGOVANOG IGRACA !!!!!!!!!!!!!!!!!!
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$sqlQuery = "SELECT Igr.Ime, Igr.Prezime, Igr.Adresa, Igr.DatumRodjenja, Igr.Pol
					 FROM Igrac AS Igr, Ima AS I
					 WHERE Igr.SifKor NOT IN (SELECT Primalac
											  FROM Kupovina 
											  WHERE Primalac = I.SifKor AND Status_ = 'NIJE_OBAVLJENA')
					 AND I.SifKor = Igr.SifKor
					 AND I.SifInt IN (SELECT SifInt
									 FROM Interesovanje AS Inter
									 WHERE I.SifInt = Inter.SifInt
									 AND Naziv IN " . $stringPretrage . "
									)";

		$query = $this->db->query($sqlQuery);

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
}

?>
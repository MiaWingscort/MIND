<?php

/**
* 
*/
class Korisnik extends CI_Model
{

	function __construct() {
		parent::__construct();
	}

	function prijavi($email, $lozinka) {
		$this->db->select('SifKor, E-mail ,Lozinka');
		$this->db->from('korisnik');
		$this->db->where('E-mail', $email);
		$this->db->where('Lozinka', $lozinka);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	function dodaj($korisnik) {
		$this->db->insert('korisnik', $korisnik);
		return $this->db->insert_id();
	}

	function postoji($korisnik) {
		return $this->prijavi($korisnik['E-mail'], $korisnik['Lozinka']);
	}

	function postojiPonistavanje($korisnik) {
		$this->db->select('*');
		$this->db->from('korisnik');
		$this->db->where('E-mail', $korisnik['E-mail']);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	function promeniLozinku($korisnik) {
		$this->db->where('SifKor', $korisnik->SifKor);
		$this->db->update('korisnik', array('Lozinka' => MD5($korisnik->Lozinka)));
	}
	
	function ukloniKorisnika($email){
		$this->db->where('E-mail',$email);
		$this->db->update('korisnik', array('Zabranjen' => 'D'));

	}

	function dohvatiSveKorisnike() {
		$this->db->select('*');
		$this->db->from('korisnik');

		$query = $this->db->get();

		return $query->result();
	}
	function promeniEmailSlika($korisnik){
		$this->db->set('E-mail', $korisnik['Email']); 
		$this->db->where('SifKor', $korisnik['SifKor']); 
		$this->db->update('Korisnik');  
	}
	function nadjiSaEmailomKorisnik($email){
		$this->db->select('SifKor, E-mail, Lozinka, TipKorisnika, PutanjaDoProfilSlike');
		$this->db->from('korisnik');
		$this->db->where('E-mail', $email);
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
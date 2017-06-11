<?php 


class Oglas extends CI_Model{
	function __construct() {
		parent::__construct();
	}

	function dodaj($oglas) {
		$this->db->insert('oglas', $oglas);
		return $this->db->insert_id();
	}

	function brojSlikaOglasa() {
		$sqlQuery= "SELECT COUNT(*) AS Broj FROM OGLAS";
		$query = $this->db->query($sqlQuery);
		$brojredova = $query->result();
		return $brojredova[0]->Broj;
	}
	function dohvatiPutanje($start,$end){
		$sqlQuery="SELECT PutanjaDoSlike FROM Oglas LIMIT $start,$end";
		$query = $this->db->query($sqlQuery);
		$redovi=$query->result();
		return $redovi;
	}
}

?>
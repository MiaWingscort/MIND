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

	

}

?>
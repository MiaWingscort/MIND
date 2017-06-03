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
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerija extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('GalerijaM', '', TRUE);
	}
	public function index()
	{
		$resultset = $this->GalerijaM->vratiSve();
		$data['resultset'] = $resultset;
		$this->load->view('gallery',$data);
	}
	public function otvoriSliku($idSlike) {
		$resultset = $this->ideja->nadjiSaSifrom($idSlike);
		$this->load->view('gallerySingle', $resultset);
	}

	public function uredi($idIdeje){
		$resultset = $this->ideja->nadjiSaSifrom($idIdeje);
		$this->load->view('ideasEdit', $resultset);
	}
	public function obrisi($idSlike){
		$this->GalerijaM->obrisi($idSlike);
		redirect(base_url() . 'Galerija');
	}
	public function potvrdiUnos(){
		$slika['SifKor']=1; 						#sredi da ne bude hardcode
		$slika['PutanjaDoSlike']="/slike/giftBox.png";
		$this->GalerijaM->dodaj($slika);

		redirect(base_url() . 'Galerija');
	}
	public function dodaj()
	{
		$this->load->view('galleryNew');


	}


}

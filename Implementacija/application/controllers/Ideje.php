<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ideje extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('ideja', '', TRUE);
	}
	public function index()
	{
		$resultset = $this->ideja->vratiSve();
		foreach ($resultset as $key=>$result) {
		 	if(strlen($result['Tekst'])>600)
		 	{
		 		$resultset[$key]['Tekst']=substr($result['Tekst'],0,600)."...";
		 	}
		 }
		$data['resultset'] = $resultset;
		$this->load->view('ideas',$data);
	}

	public function otvoriIdeju($idIdeje) {
		$resultset = $this->ideja->nadjiSaSifrom($idIdeje);
		$this->load->view('ideasSingle', $resultset);
	}

	public function uredi($idIdeje){
		$resultset = $this->ideja->nadjiSaSifrom($idIdeje);
		$this->load->view('ideasEdit', $resultset);
	}
	public function obrisi($idIdeje){
		$this->ideja->obrisi($idIdeje);
		$this->index();
	}
	public function potvrdiUredjivanje($idIdeje){

		$this->ideja->obrisi($idIdeje);

		$ideja['SifKor']=3;
		$ideja['Naziv']=$this->input->post('naziv');
		$ideja['Tekst']=$this->input->post('tekst');
		$ideja['PutanjaDoSlike']="/slike/giftBox.png";
		$this->ideja->dodaj($ideja);

		redirect(base_url() . 'Ideje');
	}
}

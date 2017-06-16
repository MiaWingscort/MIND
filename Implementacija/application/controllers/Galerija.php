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
	public function odobri($idSlike){
		$resultset = $this->GalerijaM->nadjiSaSifrom($idSlike);
		$resultset['Odobrena']=1;
		$this->GalerijaM->obrisi($idSlike);
		$this->GalerijaM->dodaj($resultset);
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
	function dodajSliku(){
		$config['upload_path']          = './uploads/galerija/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 4096;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload');

        $this->upload->initialize($config);
        $error="";
        $info="";
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = "Slika nije uploadovana.";
            redirect(base_url() . 'Galerija/dodaj?error=' . $error);
        }
        else
        {
            $upload_data = $this->upload->data(); 
            $file_name = $upload_data['file_name'];

            $info = "Uspesno ste uploadovali sliku u galeriju.";
        }
			$slika['SifKor']=$this->session->userdata('logged_in')['id']; 						#sredi da ne bude hardcode
			$slika['PutanjaDoSlike']="./uploads/galerija/" . $file_name;
			$this->GalerijaM->dodaj($slika);
			
            redirect(base_url() . 'Galerija?info=' . $info);  
		
		if ($this->form_validation->run() == FALSE) {
	   	} else {

	   	}
	   	
	}


}

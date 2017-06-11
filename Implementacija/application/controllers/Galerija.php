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
		
		#$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('datumIsteka', 'Input', 'trim|required|regex_match[/([0-9][0-9][0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/]', array('required' => 'Niste uneli datum.', 'regex_match' => 'Datum nije unet u trazenom formatu'));
		#$this->form_validation->set_rules('website', 'Input', 'trim|required', array('required' => 'Niste uneli website.'));
		#$this->form_validation->set_rules('cena', 'Input', 'numeric|required', array('required' => 'Niste uneli cenu.', 'numeric' => 'Niste uneli cenu kao cifru'));
			$slika['SifKor']=$this->session->userdata('logged_in')['id']; 						#sredi da ne bude hardcode
			$slika['PutanjaDoSlike']="./uploads/galerija/" . $file_name;
			$this->GalerijaM->dodaj($slika);
			
            redirect(base_url() . 'Galerija?info=' . $info);  
		
		if ($this->form_validation->run() == FALSE) {
			#$this->session->set_flashdata('greske-oglas', validation_errors());
	   	} else {

	   		//$SifraKorisnika = $this->session->userdata('logged_in')['id'];

	   		//echo $this->session->userdata('logged_in');



	   	}
	   	
		#redirect(base_url() . 'Galerija');
	}


}

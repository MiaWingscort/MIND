<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UklanjanjeKorisnika extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('korisnik','',TRUE);
	}

	public function index() {
		$korisnici = $this->korisnik->dohvatiSveKorisnike();

		$data['korisnici'] = $korisnici;

		$this->load->view('ukloni_korisnika', $data);
	}

	public function ukloni(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run()==FALSE){
			$error = "Niste korektno uneli email";
		   	redirect( '/UklanjanjeKorisnika?error=' . $error);
		}
		else {
			$email = $this->input->post('email');
			$rezultat=$this->korisnik->ukloniKorisnika($email);
			redirect('/UklanjanjeKorisnika', 'refresh');
		}
	}
}
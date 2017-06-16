<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ZaboravljenaSifra extends CI_Controller {
	public function __construct() {
	   parent::__construct();
	   $this->load->model('korisnik', '', TRUE);
	}

	public function index() {
		$data = Array();

		if (isset($_GET['info'])) {
           $data['info'] = $_GET['info'];
        }
		if (isset($_GET['error'])) {
           $data['error'] = $_GET['error'];
        }
		$this->load->view('zaboravljena_sifra', $data);
	}

	public function ponisti() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$error = "Korisnik sa unetom email adresom ne postoji.";
	   		redirect(base_url() . '/zaboravljenaSifra?error=' . $error, 'refresh');
	   	} else {
	   		$email = $this->input->post('email');

	   		$rez = $this->korisnik->postojiPonistavanje(array('E-mail' => $email));
	   	
	   		if ($rez) {
	   			$korisnik = $rez[0];

	   			$rez_slanja = $this->posaljiMail($korisnik);

	   			if ($rez_slanja){
		   			$info = "Uspesno ste ponistili lozinku. Nova lozinka je poslata na vas email: " . $email;

		   			redirect(base_url() . '/zaboravljenaSifra?info=' . $info, 'refresh');
		   		} else {
		   			$error = "Mail nije uspesno poslat.";

	   				redirect(base_url() . '/zaboravljenaSifra?error=' . $error, 'refresh');
		   		}

	   		} else {
	   			$error = "Korisnik sa unetom email adresom ne postoji.";

	   			redirect(base_url() . '/zaboravljenaSifra?error=' . $error, 'refresh');
	   		}
	   	}
	}

	private function posaljiMail($korisnik) {
		date_default_timezone_set('GMT');

		$this->load->helper('string');

		$nova_lozinka = random_string('alnum', 16);

		$this->korisnik->promeniLozinku(array('SifKor' => $korisnik->SifKor, 'Lozinka' => $nova_lozinka));

		$config = Array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'mindteam.etf@gmail.com',
			'smtp_pass' => 'mind2017',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('mindteam.etf@gmail.com', 'Tajanstveni Deda Mraz');
		$this->email->to($korisnik->{'E-mail'});
		$this->email->subject('Ponistena lozinka');
		$this->email->message('Zatrazili ste novu lozinku. Ovo je vasa nova lozinka: '. $nova_lozinka);

		return $this->email->send();
	}

	function sacuvajIstuSifru() {
		$sess = $this->session->userdata('logged_in');
		$SifKor= $sess['id'];

		$this->korisnik->sacuvajIstuSifru(array('SifKor' => $SifKor));

		$sess['menjao_sifru'] = 'N';

		$this->session->set_userdata('logged_in', $sess);
	}

	function promeniSifru($novaSifra) {
		$sess = $this->session->userdata('logged_in');
		$SifKor= $sess['id'];

		$this->korisnik->promeniNovuSifru(array('Lozinka' => $novaSifra, 'SifKor' => $SifKor));

		$sess['menjao_sifru'] = 'N';

		$this->session->set_userdata('logged_in', $sess);
	}
}

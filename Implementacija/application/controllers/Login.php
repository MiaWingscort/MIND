<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
	   parent::__construct();
	   $this->load->model('korisnik', '', TRUE);
	}

	public function index() {
		$this->load->library('form_validation');

	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_checkCredentials');

	   	if ($this->form_validation->run() == FALSE) {

			echo "LOSI KREDENCIJALI";
	   	} else {
	   		redirect('Welcome/ulogovan');
	   		#echo "USPESNO STE LOGOVANI";
	   	}

	}

	public function checkCredentials($password) {
		$email = $this->input->post('email');

		echo $email;

		$result = $this->korisnik->prijavi($email, $password);

		$this->load->helper('array');

		if ($result) {
			$sess_array = array();

			
		
				$sess_array = array(
					'id' => $result->SifKor, 
					'email' => $result->{'E-mail'},
					'tip_korisnika' => $result->{'TipKorisnika'}
				);

				$this->session->set_userdata('logged_in', $sess_array);
				
			
			
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Neispravan email ili sifra. Pokusajte ponovo');
			return false;
		}
	}

	public function logout() {
	 	$this->session->unset_userdata('logged_in');
	 	$this->session->sess_destroy();
	 	redirect('/','refresh');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontakt extends CI_Controller {

	function __construct() {
	   parent::__construct();
	}
	public function index()
	{
		$this->load->view('contact');
	}
	public function posalji()
	{
		$this->posaljiEmail();

		redirect('/Kontakt');

	}
	public function posaljiEmail() {

		date_default_timezone_set('GMT');

		$this->load->helper('string');

		$config = Array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' =>  'mindteam.etf@gmail.com',
			'smtp_pass' => 'mind2017',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('mindteam.etf@gmail.com' , $this->input->post('ime') . " " . $this->input->post('prezime'));
		$this->email->to('granicmina95@gmail.com');
		$this->email->subject('Kontakt TDM');
		$this->email->message($this->input->post('comment') . "\n\n Odgovorite na: " . $this->input->post('email'));

		return $this->email->send();
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reklamiranje extends CI_Controller{
	function __construct() {
	   parent::__construct();
	   $this->load->model('oglas', '', TRUE);
	   $this->load->helper(array('form', 'url','file'));
	}

	function index() {
		$this->load->view('oglasi');
	}

	function dodajReklamu() {
		$config['upload_path']          = './uploads/oglasi/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 4096;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload');

        $this->upload->initialize($config);

        if ( ! ($upload_data = $this->upload->do_upload('userfile')))
        {
            $error = "Slika nije uploadovana.";
            redirect(base_url() . '/Reklamiranje?error=' . $error);
        }

        $file_name = $this->upload->file_name;
		
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('datumIsteka', 'Input', 'trim|required|regex_match[/([0-9][0-9][0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/]', array('required' => 'Niste uneli datum.', 'regex_match' => 'Datum nije unet u trazenom formatu'));
		$this->form_validation->set_rules('website', 'Input', 'trim|required', array('required' => 'Niste uneli website.'));
		$this->form_validation->set_rules('cena', 'Input', 'numeric|required', array('required' => 'Niste uneli cenu.', 'numeric' => 'Niste uneli cenu kao cifru'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('greske-oglas', validation_errors());
	   	} else {
	   		$datumKraja = $this->input->post('datumIsteka');
	   		$website = $this->input->post('website');
	   		$cena = $this->input->post('cena');

	   		//$SifraKorisnika = $this->session->userdata('logged_in')['id'];

	   		//echo $this->session->userdata('logged_in');

	   		$this->oglas->dodaj(array('SifKor' => 2, 'PutanjaDoSlike' => "./uploads/oglasi/" . $file_name , 'PutanjaOdSlike' => $website, 'Cena' => $cena, 'DatumKraja' => $datumKraja, 'DatumPocetka' => date("Y-m-d")));

	   	}
	   	
	   	$info = "Uspesno ste uploadovali sliku oglasa.";
        redirect(base_url() . '/Reklamiranje?info=' . $info);  
	}

	function dohvatiSlikeOglasa($left) {
		$brojOglasa = $this->oglas->brojSlikaOglasa();
		if ($left == 'true'){
			$putanje = $this->oglas->dohvatiPutanje(0, $brojOglasa / 2);
		} else {
			$putanje = $this->oglas->dohvatiPutanje($brojOglasa / 2 + $brojOglasa % 2, $brojOglasa / 2);
		}
		
		echo json_encode($putanje);
	}
}
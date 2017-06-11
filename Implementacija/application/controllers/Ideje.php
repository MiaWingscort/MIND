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

$config['upload_path']          = './uploads/ideje/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 4096;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload');

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = "Slika nije uploadovana.";
            redirect(base_url() . 'Ideje/dodaj?error=' . $error);
        }
        else
        {
            $upload_data = $this->upload->data(); 
            $file_name = $upload_data['file_name'];

            $info = "Uspesno ste uploadovali ideju.";
            redirect(base_url() . 'Ideje?info=' . $info);  
        }
		
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('datumIsteka', 'Input', 'trim|required|regex_match[/([0-9][0-9][0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/]', array('required' => 'Niste uneli datum.', 'regex_match' => 'Datum nije unet u trazenom formatu'));
		#$this->form_validation->set_rules('website', 'Input', 'trim|required', array('required' => 'Niste uneli website.'));
		#$this->form_validation->set_rules('cena', 'Input', 'numeric|required', array('required' => 'Niste uneli cenu.', 'numeric' => 'Niste uneli cenu kao cifru'));

		if ($this->form_validation->run() == FALSE) {
			#$this->session->set_flashdata('greske-oglas', validation_errors());
	   	} else {

	   		//$SifraKorisnika = $this->session->userdata('logged_in')['id'];

	   		//echo $this->session->userdata('logged_in');

			$ideja['SifKor']=3;
			$ideja['Naziv']=$this->input->post('naziv');
			$ideja['Tekst']=$this->input->post('tekst');
			$ideja['PutanjaDoSlike']= "./uploads/oglasi/" . $file_namebase;
		
			$this->ideja->dodaj($ideja);

	   	}
		redirect(base_url() . 'Ideje');
	}

	function dodajSliku(){
		$config['upload_path']          = './uploads/ideje/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 4096;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload');

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = "Slika nije uploadovana.";
            redirect(base_url() . 'Ideje/dodaj?error=' . $error);
        }
        else
        {
            $upload_data = $this->upload->data(); 
            $file_name = $upload_data['file_name'];

            $info = "Uspesno ste uploadovali ideju.";
            redirect(base_url() . 'Ideje?info=' . $info);  
        }
		
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('datumIsteka', 'Input', 'trim|required|regex_match[/([0-9][0-9][0-9][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/]', array('required' => 'Niste uneli datum.', 'regex_match' => 'Datum nije unet u trazenom formatu'));
		#$this->form_validation->set_rules('website', 'Input', 'trim|required', array('required' => 'Niste uneli website.'));
		#$this->form_validation->set_rules('cena', 'Input', 'numeric|required', array('required' => 'Niste uneli cenu.', 'numeric' => 'Niste uneli cenu kao cifru'));

		if ($this->form_validation->run() == FALSE) {
			#$this->session->set_flashdata('greske-oglas', validation_errors());
	   	} else {

	   		//$SifraKorisnika = $this->session->userdata('logged_in')['id'];

	   		//echo $this->session->userdata('logged_in');

	   		$this->GalerijaM->dodaj(array('SifKor' => 1, 'PutanjaDoSlike' => "./uploads/galerija/" . $file_name ));

	   	}
	   	redirect('Galerija');
	}

}

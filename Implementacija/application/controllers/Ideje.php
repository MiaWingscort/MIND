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

	public function dodajSliku($idIdeje){

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
            $this->upload->display_errors();
            #redirect(base_url() . 'Ideje?error=' . $error);
        }
        else
        {
            $upload_data = $this->upload->data(); 
            $file_name = $upload_data['file_name'];

            $info = "Uspesno ste uploadovali ideju.";
            $ideja['SifKor']=$this->session->userdata('logged_in')['id'];
			$ideja['Naziv']=$this->input->post('naziv');
			$ideja['Tekst']=$this->input->post('tekst');
			$ideja['PutanjaDoSlike']= "./uploads/ideje/" . $file_name;
		
			$this->ideja->obrisi($idIdeje);
			$this->ideja->dodaj($ideja);
            redirect(base_url() . 'Ideje?info=' . $info);  
        }
	}
}

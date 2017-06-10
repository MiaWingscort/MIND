<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pretraga extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('igrac');
        }

        public function index() {
            $this->load->view('pretraga');
        }


        public function pretrazi()
        {
            $mojaInteresovanja = $this->input->post('mojaInteresovanja');
            $unetaInteresovanja = $this->input->post('unetaInteresovanja');

            if ($mojaInteresovanja == 'da') {
                //$id = $this->session->userdata('logged_in')['id'];
                $interesovanja = $this->igrac->dohvatiInteresovanja(1);
            } else {
                $interesovanja = explode("\n", $unetaInteresovanja);
            }

            $korisnici = $this->igrac->pretrazi($interesovanja);

            $data['korisnici'] = $korisnici;

            //$this->load->view('pretraga', $data);
        }
}
?>
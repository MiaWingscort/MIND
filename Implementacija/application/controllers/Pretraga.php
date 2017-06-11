<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pretraga extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('igrac');
        }

        public function index() {
            if (!$this->session->userdata('logged_in')) {
                redirect('Welcome');
            }

            $session_data = $this->session->userdata;
            $session_data_array = $session_data['logged_in'];

            $tip = $session_data_array['tip_korisnika'];

            if ($tip != 'I') {
                redirect('Welcome/ulogovan');
            }

                $this->load->view('pretraga');
        }


        public function pretrazi()
        {
            if (!$this->session->userdata('logged_in')) {
                redirect('Welcome');
            }

            $session_data = $this->session->userdata;
            $session_data_array = $session_data['logged_in'];

            $tip = $session_data_array['tip_korisnika'];

            if ($tip != 'I') {
                redirect('Welcome/ulogovan');
            }

            $mojaInteresovanja = $this->input->post('mojaInteresovanja');
            $unetaInteresovanja = $this->input->post('unetaInteresovanja');

            if ($mojaInteresovanja == 'da') {
                $id = $session_data_array['id'];
                $interesovanja = $this->igrac->dohvatiInteresovanja($id);
            } else {
                $interesovanja = explode("\n", $unetaInteresovanja);
            }

            $korisnici = $this->igrac->pretrazi($interesovanja);

            $data['korisnici'] = $korisnici;

            $this->load->view('pretraga', $data);
        }

        public function izaberi($idPrimalac) {
            $this->load->model('kupovina');

            $session_data = $this->session->userdata;
            $session_data_array = $session_data['logged_in'];

            $idKupac = $session_data_array['id'];
            
            $this->kupovina->novaKupovina(array('Kupac' => $idKupac, 'Primalac' => $idPrimalac));
        }
}
?>
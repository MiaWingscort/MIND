<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PonistavanjePrimaocaPoklona extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('kupovina');
        }

        public function index() {
            $this->otkaziKupovinu();
        }


        public function otkaziKupovinu(){
            $sess = $this->session->userdata('logged_in');
            $pid = $sess['primalacId'];
            
            $this->kupovina->otkaziKupovinu($pid);
            redirect('PromenaProfila');
        }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url','file'));
        }

        public function do_uploadOglas()
        {
                $config['upload_path']          = './uploads/oglasi/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 4096;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload');

                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error = "Slika nije uploadovana.";
                    redirect(base_url() . '/Reklamiranje?error=' . $error);
                }
                else
                {
                    $upload_data = $this->upload->data(); 
                    $file_name = $upload_data['file_name'];

                    $info = "Uspesno ste uploadovali sliku oglasa.";
                    redirect(base_url() . '/Reklamiranje?info=' . $info);  
                }
        }
}
?>
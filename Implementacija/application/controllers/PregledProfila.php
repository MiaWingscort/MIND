<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class PregledProfila extends CI_Controller {


		public function __construct() {
	   		parent::__construct();
		}



		public function index(){

			$sess = $this->session->userdata('logged_in');
			$sifra = $sess['id'];

			$tip = 'I';
	   		if ($tip == 'I'){
	   			$this->load->model('igrac', '', TRUE);
	   			$this->load->model('kupovina', '', TRUE);
	   			$this->load->model('korisnik', '', TRUE);
	   			$this->load->model('interesovanje', '', TRUE);
	   			$this->load->model('ima', '', TRUE);

	   			$rezIgrac = $this->igrac->nadjiSaSifrom($sifra);
	   			$rezKupovina = $this->kupovina->nadjiKomeKupacKupuje($sifra);
	   			$imePrimaoca = $this->igrac->nadjiSaSifrom($rezKupovina->Primalac);
	   			$slika = $this->korisnik->nadjiSaEmailomKorisnik($sess['email']);
	   			$rezIdInteresovanja = $this->ima->nadjiInteresovanjaZaKorisnika($sifra);
	   			$interesovanja = array();
	   			foreach ($rezIdInteresovanja as $row) {
	   				$temp = $this->interesovanje->nadjiInteresovanjePoSifri($row['SifInt']);
	   				array_push($interesovanja, $temp->Naziv);
	   				
	   			}

	   			$data = array('Ime' => $rezIgrac->Ime, 'Prezime' => $rezIgrac->Prezime, 'DatumRodjenja' => $rezIgrac->DatumRodjenja, 'Email' => $sess['email'], 'Pol' => $rezIgrac->Pol, 'Adresa' => $rezIgrac->Adresa, 'Telefon' => $rezIgrac->Telefon, 'PrimalacIme' => $imePrimaoca->Ime, 'PrimalacPrezime' => $imePrimaoca->Prezime, 'Slika' => $slika->PutanjaDoProfilSlike, 'Interesovanja' => $interesovanja);
	   			$this->load->view('profil_igraca', $data);
	   		}else if ('P'){
	   			$this->load->model('prodavac', '', TRUE);
	   			$rezultat = $this->prodavac->nadjiSaSifrom($sifra);
	   			$this->load->view('profil_prodavca', $rezultat);
	   		}else if ('A'){
	   			$this->load->model('administrator', '', TRUE);
	   			$rezultat = $this->administrator->nadjiSaSifrom($sifra);
	   		}
		}
	}

?>
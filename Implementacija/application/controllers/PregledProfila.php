<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class PregledProfila extends CI_Controller {


		public function __construct() {
	   		parent::__construct();
	   		$this->load->model('igrac', '', TRUE);
	   		$this->load->model('kupovina', '', TRUE);
	   		$this->load->model('korisnik', '', TRUE);
	   		$this->load->model('interesovanje', '', TRUE);
	   		$this->load->model('ima', '', TRUE);
	   		$this->load->model('prodavac', '', TRUE);
	   		$this->load->model('administrator', '', TRUE);

		}



		public function index(){

			$sess = $this->session->userdata('logged_in');
			$sifra = $sess['id'];
			$tip = $sess['tip_korisnika'];
			$email = $sess['email'];
			
			$this->load->helper('date');
	   		if ($tip == 'I'){
	   			
	   			$rezIgrac = $this->igrac->nadjiSaSifrom($sifra);
	   			$datum = strtotime($rezIgrac->DatumRodjenja);

	   			$rezKupovina = $this->kupovina->nadjiKomeKupacKupuje($sifra);
	   			$primalacIme;
	   			$primalacPrezime;
	   			if ($rezKupovina != false){
	   				$imePrimaoca = $this->igrac->nadjiSaSifrom($rezKupovina->Primalac);
	   				$primalacIme = $imePrimaoca->Ime;
	   				$primalacPrezime = $imePrimaoca->Prezime;
	   			}else{
	   				$primalacIme = 'Nije vam dodeljen ili niste izabrali primaoca poklona!';
	   				$primalacPrezime = '';
	   			}
	   			
	   			$slika = $this->korisnik->nadjiSaEmailomKorisnik($sess['email']);
	   			$slikaPutanja = $slika->PutanjaDoProfilSlike;


	   			$rezIdInteresovanja = $this->ima->nadjiInteresovanjaZaKorisnika($sifra);
	   			$interesovanja = array();
	   			foreach ($rezIdInteresovanja as $row) {
	   				$temp = $this->interesovanje->nadjiInteresovanjePoSifri($row['SifInt']);
	   				array_push($interesovanja, $temp->Naziv);
	   			}

	   			$data = array('Ime' => $rezIgrac->Ime, 'Prezime' => $rezIgrac->Prezime, 'DatumRodjenja' => $datum, 'Email' => $email, 'Pol' => $rezIgrac->Pol, 'Adresa' => $rezIgrac->Adresa, 'Telefon' => $rezIgrac->Telefon, 'PrimalacIme' => $primalacIme, 'PrimalacPrezime' => $primalacPrezime, 'Slika' => $slikaPutanja, 'Interesovanja' => $interesovanja);
	   			$this->load->view('profil_igraca', $data);
	   		}else if ($tip == 'P'){

	   			$rezultat = $this->prodavac->nadjiSaSifrom($sifra);

	   			$slika = $this->korisnik->nadjiSaEmailomKorisnik($email);
	   			$slikaPutanja = $slika->PutanjaDoProfilSlike;

	   			$rezIdInteresovanja = $this->ima->nadjiInteresovanjaZaKorisnika($sifra);
	   			$interesovanja = array();
	   			foreach ($rezIdInteresovanja as $row) {
	   				$temp = $this->interesovanje->nadjiInteresovanjePoSifri($row['SifInt']);
	   				array_push($interesovanja, $temp->Naziv);
	   				
	   			}



	   			$data = array('Naziv' => $rezultat->Naziv, 'PIB' => $rezultat->PIB, 'Email' => $email, 'Adresa' => $rezultat->Adresa, 'Telefon' => $rezultat->Telefon, 'Website' => $rezultat->Website, 'Slika' => $slikaPutanja, 'Interesovanja' => $interesovanja);
	   			$this->load->view('profil_prodavca', $data);
	   		}else if ($tip == 'A'){

	   			$slika = $this->korisnik->nadjiSaEmailomKorisnik($email);
	   			$slikaPutanja = $slika->PutanjaDoProfilSlike;

	   			$rezAdmin = $this->administrator->nadjiSaSifrom($sifra);

	   			$data = array('Ime' => $rezAdmin->Ime, 'Prezime' => $rezAdmin->Prezime, 'Email' => $email, 'Slika' => $slikaPutanja);

	   			$this->load->view('profil_administratora', $data);
	   		}
		}
	}

?>
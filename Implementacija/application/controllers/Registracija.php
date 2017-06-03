<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registracija extends CI_Controller {
	function __construct() {
	   parent::__construct();
	   $this->load->model('korisnik', '', TRUE);
	   $this->load->model('prodavac', '', TRUE);
	   $this->load->model('igrac', '', TRUE);
	}

	function noviIgrac() {
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('ime', 'Input', 'trim|required|alpha', array('required' => 'Niste uneli ime.', 'alpha' => 'Ime mora da sadrzi samo slova.'));
		$this->form_validation->set_rules('prezime', 'Input', 'trim|required|alpha', array('required' => 'Niste uneli prezime.', 'alpha' => 'Prezime mora da sadrzi samo slova.'));

		$this->form_validation->set_rules('telefon', 'Mobile Number', 'trim|required|numeric', array('required' => 'Niste uneli telefon.', 'numeric' => 'Telefon sadrzi samo cifre.'));
		$this->form_validation->set_rules('adresa', 'Input', 'trim|required', array('required' => 'Niste uneli adresu.'));
		$this->form_validation->set_rules('pol', 'Input', 'required', array('required' => 'Niste izabrali pol.'));

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Niste uneli email.', 'valid_email' => 'Email nije korektno unet.'));
		$this->form_validation->set_rules('sifra', 'Password', 'trim|required', array('required' => 'Niste uneli lozinku.'));
		$this->form_validation->set_rules('ponovljena_sifra', 'Password Confirmation', 'trim|required|matches[sifra]',  array('required' => 'Niste uneli  ponovljenu lozinku.', 'matches[sifra]' => 'Ponovljena lozinka ne odgovara unetoj.'));

		$this->form_validation->set_rules('dan', 'Input', 'numeric|required', array('required' => 'Niste uneli dan rodenja.', 'numeric' => 'Niste izabrali dan rodjenja.'));
		$this->form_validation->set_rules('mesec', 'Input', 'numeric|required', array('required' => 'Niste uneli mesec rodjenja.', 'numeric' => 'Niste izabrali mesec rodjenja.'));
		$this->form_validation->set_rules('godina', 'Input', 'numeric|required', array('required' => 'Niste uneli godinu rodjenja.', 'numeric' => 'Niste izabrali godinu rodjenja.'));


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('greske-igrac', validation_errors());
			redirect('/');
	   	} else {
	   		$email = $this->input->post('email');
	   		$lozinka = $this->input->post('sifra');

	   		$ime = $this->input->post('ime');
	   		$prezime = $this->input->post('prezime');

	   		$telefon = $this->input->post('telefon');
	   		$adresa = $this->input->post('adresa');

	   		$pol = $this->input->post('pol');

	   		$dan = $this->input->post('dan');
	   		$mesec = $this->input->post('mesec');
	   		$godina = $this->input->post('godina');

	   		$rez = $this->korisnik->postoji(array('E-mail' => $email, 'Lozinka' => $lozinka));
	   	
	   		if ($rez) {
	   			$this->session->set_flashdata('greske-igrac', 'Korisnik sa email adresom ' . $email .' je vec registrovan.');
			redirect('/');
	   		} else {
	   			$id = $this->korisnik->dodaj(array('E-mail' => $email, 'Lozinka' => $lozinka, 'Zabranjen' => 'N'));
	   			$this->igrac->dodaj(array('SifKor' => $id, 'Ime' => $ime, 'Prezime' => $prezime, 'Adresa' => $adresa, 'Telefon' => $telefon, 'DatumRodjenja' => $godina . '-' . $mesec . '-' . $dan, 'Pol' => $pol));
	   			echo "UPISAN NOVI KORISNIK";
	   		}

	   	}
	}

	function noviProdavac() {
		$this->load->library('form_validation');

		$this->form_validation->set_rules('naziv', 'Input', 'trim|required|alpha', array('required' => 'Niste uneli naziv firme.', 'alpha' => 'Naziv firme mora da sadrzi samo slova.'));
		$this->form_validation->set_rules('pib', 'Input', 'trim|required|numeric',  array('required' => 'Niste uneli PIB firme.', 'numeric' => 'PIB sadrzi samo cifre.'));

		$this->form_validation->set_rules('telefon', 'Mobile Number', 'trim|required|numeric', array('required' => 'Niste uneli telefon.', 'numeric' => 'Telefon sadrzi samo cifre.'));
		$this->form_validation->set_rules('adresa', 'Input', 'trim|required', array('required' => 'Niste uneli adresu.'));

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Niste uneli email.', 'valid_email' => 'Email nije korektno unet.'));
		$this->form_validation->set_rules('sifra', 'Password', 'trim|required', array('required' => 'Niste uneli lozinku.'));
		$this->form_validation->set_rules('ponovljena_sifra', 'Password Confirmation', 'trim|required|matches[sifra]',  array('required' => 'Niste uneli  ponovljenu lozinku.', 'matches[sifra]' => 'Ponovljena lozinka ne odgovara unetoj.'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('greske-prodavac', validation_errors());
			redirect('/');
	   	} else {
	   		$email = $this->input->post('email');
	   		$lozinka = $this->input->post('sifra');

	   		$naziv = $this->input->post('naziv');
	   		$pib = $this->input->post('pib');

	   		$telefon = $this->input->post('telefon');
	   		$adresa = $this->input->post('adresa');

	   		$rez = $this->korisnik->postoji(array('E-mail' => $email, 'Lozinka' => $lozinka));
	   	
	   		if ($rez) {
	   			$this->session->set_flashdata('greske-prodavac', 'Prodavac sa email adresom ' . $email .' je vec registrovan.');
			redirect('/');
	   		} else {
	   			$id = $this->korisnik->dodaj(array('E-mail' => $email, 'Lozinka' => $lozinka, 'Zabranjen' => 'N'));
	   			$this->prodavac->dodaj(array('SifKor' => $id, 'Naziv' => $naziv, 'PIB' => $pib, 'Adresa' => $adresa, 'Telefon' => $telefon));
	   			echo "UPISAN NOVI PRODAVAC";
	   		}
	   	}
	}

}

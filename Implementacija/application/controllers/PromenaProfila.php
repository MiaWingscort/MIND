<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PromenaProfila extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('igrac', '', TRUE);
		$this->load->model('kupovina', '', TRUE);
		$this->load->model('korisnik', '', TRUE);
		$this->load->model('interesovanje', '', TRUE);
		$this->load->model('ima', '', TRUE);
		$this->load->model('prodavac', '', TRUE);
		$this->load->model('administrator', '', TRUE);

		$this->load->helper(array('form', 'url','file'));
	}

	

	public function index(){
		$sess = $this->session->userdata('logged_in');
		$sifra = $sess['id'];
		$tip = $sess['tip_korisnika'];
		$email = $sess['email'];
		$this->load->helper('date');
		
		if ($tip == 'I'){
			$rezIgrac = $this->igrac->nadjiSaSifrom($sifra);
			$datum = $rezIgrac->DatumRodjenja;
			$datum = explode('-', $datum);
			$godina = $datum[0];
			$godina = ltrim($godina, '0');
			$mesec = $datum[1];
			$mesec = ltrim($mesec, '0');
			$dan  = $datum[2];
			$dan = ltrim($dan, '0');

			$rezKupovina = $this->kupovina->nadjiKomeKupacKupuje($sifra);
			$primalacIme;
			$primalacPrezime;
			$primalacId;
			if ($rezKupovina != false){
				$primalacId = $rezKupovina->Primalac;
				
				$imePrimaoca = $this->igrac->nadjiSaSifrom($rezKupovina->Primalac);
				$primalacIme = $imePrimaoca->Ime;
				$primalacPrezime = $imePrimaoca->Prezime;

			}else{
				$primalacId = -1;
				
				$primalacIme = 'Nije odabran!';
				$primalacPrezime = '';
			}

			$sess_array = array();

			$sess_array = array(
				'id' => $sifra, 
				'email' => $email,
				'tip_korisnika' => $tip,
				'primalacId' => $primalacId
				);

			$this->session->set_userdata('logged_in', $sess_array);

			$slika = $this->korisnik->nadjiSaEmailomKorisnik($sess['email']);
			$slikaPutanja = $slika->PutanjaDoProfilSlike;


			$rezIdInteresovanja = $this->ima->nadjiInteresovanjaZaKorisnika($sifra);
			$interesovanja = array();
			foreach ($rezIdInteresovanja as $row) {
				$temp = $this->interesovanje->nadjiInteresovanjePoSifri($row['SifInt']);
				$interesovanja[$temp->Naziv] = $temp->Naziv;
			}

			$rezSvaInteresovanja = $this->interesovanje->svaInteresovanja();
			$svaInteresovanja = array();

			foreach ($rezSvaInteresovanja as $row) {
				$svaInteresovanja[$row['Naziv']] = $row['Naziv'];
			}

			$data = array('PrimalacId' => $primalacId,'Ime' => $rezIgrac->Ime, 'Prezime' => $rezIgrac->Prezime, 'Dan' => $dan, 'Mesec' => $mesec, 'Godina' => $godina, 'Email' => $email, 'Pol' => $rezIgrac->Pol, 'Adresa' => $rezIgrac->Adresa, 'Telefon' => $rezIgrac->Telefon, 'PrimalacIme' => $primalacIme, 'PrimalacPrezime' => $primalacPrezime, 'Slika' => $slikaPutanja, 'MojaInteresovanja' => $interesovanja, 'SvaInteresovanja' => $svaInteresovanja);
			
			$this->load->view('promeni_profil_igraca', $data);
		}else if ($tip == 'P'){


			$rezultat = $this->prodavac->nadjiSaSifrom($sifra);

			$slika = $this->korisnik->nadjiSaEmailomKorisnik($email);
			$slikaPutanja = $slika->PutanjaDoProfilSlike;

			$rezIdInteresovanja = $this->ima->nadjiInteresovanjaZaKorisnika($sifra);
			$interesovanja = array();

			foreach ($rezIdInteresovanja as $row) {
				$temp = $this->interesovanje->nadjiInteresovanjePoSifri($row['SifInt']);
				$interesovanja[$temp->Naziv] = $temp->Naziv;
			}

			$rezSvaInteresovanja = $this->interesovanje->svaInteresovanja();
			$svaInteresovanja = array();



			foreach ($rezSvaInteresovanja as $row) {
				$svaInteresovanja[$row['Naziv']] = $row['Naziv'];

			}

			$data = array('Naziv' => $rezultat->Naziv, 'PIB' => $rezultat->PIB, 'Email' => $email, 'Adresa' => $rezultat->Adresa, 'Telefon' => $rezultat->Telefon, 'Website' => $rezultat->Website, 'Slika' => $slikaPutanja, 'MojaInteresovanja' => $interesovanja, 'SvaInteresovanja' => $svaInteresovanja);
			$this->load->view('promeni_profil_prodavca', $data);
		}else if ($tip == 'A'){

			$slika = $this->korisnik->nadjiSaEmailomKorisnik($email);
			$slikaPutanja = $slika->PutanjaDoProfilSlike;

			$rezAdmin = $this->administrator->nadjiSaSifrom($sifra);

			$data = array('Ime' => $rezAdmin->Ime, 'Prezime' => $rezAdmin->Prezime, 'Email' => $email, 'Slika' => $slikaPutanja);

			$this->load->view('promeni_profil_administratora', $data);
		}
	}


	public function promeniAdministratora(){

		$file_name;
		$ind;


		if(!file_exists($_FILES['userfile']['tmp_name']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
			$ind = 0;
		}else{

			$ind = 1;
			$config['upload_path']          = './uploads/profilne/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 4096;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;



			$this->load->library('upload');
			$this->upload->initialize($config);


			if ( !$this->upload->do_upload('userfile'))
			{
				$error = "Slika nije uploadovana.";
				redirect(base_url() . 'PromenaProfila');
			}else{
				$upload_data = $this->upload->data(); 
				$file_name = 'uploads/profilne/'.$upload_data['file_name'];

			}

		}

		$email = $this->input->post('email');
		$ime = $this->input->post('ime');
		$prezime = $this->input->post('prezime');



		$sess = $this->session->userdata('logged_in');
		$sifra = $sess['id'];
		$tip = $sess['tip_korisnika'];

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('ime', 'Input', 'trim|required', array('required' => 'Niste uneli ime.'));
		$this->form_validation->set_rules('prezime', 'Input', 'trim|required', array('required' => 'Niste uneli prezime.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Niste uneli e-mail.', 'valid_email' => 'Email nije korektno unet.'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('greske-administrator', validation_errors());
			redirect('PromenaProfila');
		}else{

			$nizAdmin;
			if($ind == 1){
				$nizAdmin = array('Ime' => $ime, 'Prezime' => $prezime, 'SifKor' => $sifra, 'Email' => $email, 'Slika' => $file_name);
				$this->korisnik->promeniEmailSlika($nizAdmin);
			}else{
				$nizAdmin = array('Ime' => $ime, 'Prezime' => $prezime, 'SifKor' => $sifra, 'Email' => $email);
				$this->korisnik->promeniEmail($nizAdmin);
			}

			$this->administrator->promeni($nizAdmin);
			

			$sess_array = array();

			$sess_array = array(
				'id' => $sifra, 
				'email' => $email,
				'tip_korisnika' => $tip
				);

			$this->session->set_userdata('logged_in', $sess_array);

			redirect('PregledProfila');
		}
	}

	public function promeniProdavca(){

		$file_name;
		$ind;


		if(!file_exists($_FILES['userfile']['tmp_name']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
			$ind = 0;
		}else{

			$ind = 1;
			$config['upload_path']          = './uploads/profilne/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 4096;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;



			$this->load->library('upload');
			$this->upload->initialize($config);


			if ( !$this->upload->do_upload('userfile'))
			{
				$error = "Slika nije uploadovana.";
				redirect(base_url() . 'PromenaProfila');
			}else{
				$upload_data = $this->upload->data(); 
				$file_name = 'uploads/profilne/'.$upload_data['file_name'];

			}

		}

		$email = $this->input->post('email');
		$naziv = $this->input->post('naziv');
		$PIB = $this->input->post('PIB');
		$adresa = $this->input->post('adresa');
		$telefon = $this->input->post('telefon');
		$website = $this->input->post('website');
		$interesovanja = $this->input->post('interesovanja');

		$sess = $this->session->userdata('logged_in');
		$sifra = $sess['id'];
		$tip = $sess['tip_korisnika'];

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('naziv', 'Input', 'trim|required', array('required' => 'Niste uneli naziv.'));
		$this->form_validation->set_rules('PIB', 'Input', 'trim|required|numeric', array('required' => 'Niste uneli PIB.', 'numeric' => 'PIB sadrzi samo cifre.'));
		$this->form_validation->set_rules('telefon', 'Mobile Number', 'trim|required|numeric', array('required' => 'Niste uneli telefon.', 'numeric' => 'Telefon sadrzi samo cifre.'));
		$this->form_validation->set_rules('adresa', 'Input', 'trim|required', array('required' => 'Niste uneli adresu.'));
		$this->form_validation->set_rules('website', 'Input', 'trim|required', array('required' => 'Niste uneli website.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Niste uneli email.', 'valid_email' => 'Email nije korektno unet.'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('greske-prodavac', validation_errors());
			redirect('PromenaProfila');
		}else{
			$nizProd;
			if ($ind == 1){
				$nizProd = array('Naziv' => $naziv, 'PIB' => $PIB, 'Adresa' => $adresa, 'Telefon' => $telefon, 'Website' => $website,
					'Interesovanja' => $interesovanja, 'Email' => $email, 'SifKor' => $sifra, 'Slika' => $file_name);
				$this->korisnik->promeniEmailSlika($nizProd);
			}else{
				$nizProd = array('Naziv' => $naziv, 'PIB' => $PIB, 'Adresa' => $adresa, 'Telefon' => $telefon, 'Website' => $website,
					'Interesovanja' => $interesovanja, 'Email' => $email, 'SifKor' => $sifra);
				$this->korisnik->promeniEmail($nizProd);
			}

			$this->prodavac->promeni($nizProd);
			$this->ima->osveziZaKorisnika($sifra,$interesovanja);

			$sess_array = array();

			$sess_array = array(
				'id' => $sifra, 
				'email' => $email,
				'tip_korisnika' => $tip
				);

			$this->session->set_userdata('logged_in', $sess_array);

			redirect('PregledProfila');
		}
	}

	public function promeniIgraca(){
		$file_name;
		$ind;


		if(!file_exists($_FILES['userfile']['tmp_name']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
			$ind = 0;
		}else{

			$ind = 1;
			$config['upload_path']          = './uploads/profilne/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 4096;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;



			$this->load->library('upload');
			$this->upload->initialize($config);


			if ( !$this->upload->do_upload('userfile'))
			{
				$error = "Slika nije uploadovana.";
				redirect(base_url() . 'PromenaProfila');
			}else{
				$upload_data = $this->upload->data(); 
				$file_name = 'uploads/profilne/'.$upload_data['file_name'];

			}

		}

		$email = $this->input->post('email');
		$ime = $this->input->post('ime');
		$prezime = $this->input->post('prezime');



		$dan = $this->input->post('dan');
		$mesec = $this->input->post('mesec');
		$godina = $this->input->post('godina');

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('ime', 'Input', 'trim|required', array('required' => 'Niste uneli ime.'));
		$this->form_validation->set_rules('prezime', 'Input', 'trim|required', array('required' => 'Niste uneli prezime.'));

		$this->form_validation->set_rules('telefon', 'Mobile Number', 'trim|required|numeric', array('required' => 'Niste uneli telefon.', 'numeric' => 'Telefon sadrzi samo cifre.'));
		$this->form_validation->set_rules('adresa', 'Input', 'trim|required', array('required' => 'Niste uneli adresu.'));
		$this->form_validation->set_rules('pol', 'Input', 'required', array('required' => 'Niste izabrali pol.'));

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array('required' => 'Niste uneli email.', 'valid_email' => 'Email nije korektno unet.'));

		$this->form_validation->set_rules('dan', 'Input', 'numeric|required', array('required' => 'Niste uneli dan rodenja.', 'numeric' => 'Niste izabrali dan rodjenja.'));
		$this->form_validation->set_rules('mesec', 'Input', 'numeric|required', array('required' => 'Niste uneli mesec rodjenja.', 'numeric' => 'Niste izabrali mesec rodjenja.'));
		$this->form_validation->set_rules('godina', 'Input', 'numeric|required', array('required' => 'Niste uneli godinu rodjenja.', 'numeric' => 'Niste izabrali godinu rodjenja.'));

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('greske-igrac', validation_errors());
			redirect('PromenaProfila');
		}else{

			$pol = $this->input->post('pol');		
			
			$dat = $godina."-".$mesec."-".$dan;
			
			$adresa = $this->input->post('adresa');
			$telefon = $this->input->post('telefon');
			$imePrezimePrimalac = $this->input->post('primalac');
			list($imePrimalac, $prezimePrimalac) = explode(" ", $imePrezimePrimalac);

			$interesovanja = $this->input->post('interesovanja');

			$sess = $this->session->userdata('logged_in');
			$sifra = $sess['id'];
			$tip = $sess['tip_korisnika'];
			$nizIgr;

			if ($ind == 1){
				$nizIgr = array('Ime' => $ime, 'Prezime' => $prezime, 'SifKor' => $sifra, 'Email' => $email, 'DatumRodjenja' => $dat,
					'Pol' => $pol, 'Adresa' => $adresa, 'Telefon' => $telefon, 'ImePrimaoca' => $imePrimalac, 'PrezimePrimaoca' => $prezimePrimalac, 'Interesovanja' => $interesovanja, 'Slika' => $file_name);
				$this->korisnik->promeniEmailSlika($nizIgr);
			}else{
				$nizIgr = array('Ime' => $ime, 'Prezime' => $prezime, 'SifKor' => $sifra, 'Email' => $email, 'DatumRodjenja' => $dat,
					'Pol' => $pol, 'Adresa' => $adresa, 'Telefon' => $telefon, 'ImePrimaoca' => $imePrimalac, 'PrezimePrimaoca' => $prezimePrimalac, 'Interesovanja' => $interesovanja);
				$this->korisnik->promeniEmail($nizIgr);
			}
			$this->igrac->promeni($nizIgr);
			$this->ima->osveziZaKorisnika($sifra,$interesovanja);
			$sess_array = array();

			$sess_array = array(
				'id' => $sifra, 
				'email' => $email,
				'tip_korisnika' => $tip
				);

			$this->session->set_userdata('logged_in', $sess_array);

			redirect('PregledProfila');
		}
	}

	


}

?>


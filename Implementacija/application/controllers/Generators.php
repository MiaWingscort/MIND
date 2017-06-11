<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generators extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('generator');
	}
	/*public function view($page='generator')
	{
		if(!file_exists(APPPATH.'/views/'.$page.'.php'))
		{
			show_404();
		}

		$data['title']= ucfirst($page);

		$this->load->view($page,$data);
	}
*/
	private function posaljiEmail($korisnik,$ime) {

		date_default_timezone_set('GMT');

		$this->load->helper('string');

		$config = Array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'mindteam.etf@gmail.com',
			'smtp_pass' => 'mind2017',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('mindteam.etf@gmail.com', 'Tajanstveni Deda Mraz');
		$this->email->to($korisnik);
		$this->email->subject('Kupovina poklona');
		$this->email->message('Dodelili smo vam osobu kojoj bi trebalo da kupite poklon! To je '. $ime);

		return $this->email->send();
	}

	public function rasporedi($imena,$mejlovi)
	{
		//$temp=array("Daca","Mina"); //ovo je jer mi shuffle ne radi dobro, pa da posalje odmah
		//$imena=array("Mina","Daca");
		//$mejlovi=array("granicmina95@gmail.com","danijelamijailovic5@gmail.com");
		

		$notOkay=TRUE;
		while($notOkay)									//shuffle dok ne budu svi razliciti
		{
			$notOkay=FALSE;
			$temp=$imena;
			shuffle($temp);
			foreach (array_combine($temp, $imena) as $kopija => $ime) {
        		if(strcmp($kopija, $ime)==0)
    			{
    				$notOkay=TRUE;
    				break;
    			}
    		}
			
		}
	foreach (array_combine($temp, $mejlovi) as $kopija => $mejl) {
			$this->posaljiEmail($mejl,$kopija);
		}
	}

	public function generisiIgru(){
		$mejlovi=array();
		$imena=array();
		$size = count($_POST);
		if($size<=3)
		{
			
			echo $size;
			show_404();
		}
		for($i=0;$i<$size/2;$i++)
		{
			array_push($mejlovi, $this->input->post('email_'.$i));
			array_push($imena, $this->input->post('ime_'.$i));
			echo $i;
		}
		//array_push($mejlovi, $this->input->post('email'));
		//array_push($imena, $this->input->post('ime'));
		if(count($mejlovi)!=2)
		{
			//show_404();
		}
		if(empty($mejlovi) || empty($imena))
		{
			//show_404();
		}
		$this->rasporedi($imena,$mejlovi);
		redirect('/Generators');

	}
}


<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public $css;
	public $html;
	public $js;
	public $body;

	function __construct(){
		parent::__construct();
		$this->load->helper('page_helper');
		$this->load->helper('file');
		$this->load->library('encrypt');
		$this->load->library('rsa');
		$this->load->model('user_accounts');
		$this->load->helper('validations_helper');
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->body[0] = 'main_stylesheet';
		$this->body[1] = 'login';

		$this->css[0] = 'main_stylesheet';
		$this->css[1] = 'login';

		load_header($this->css, $this->js, $this->html, $this->body);
		$this->load->view('login/login');
		load_footer();
	}

	public function login_validation()
	{
		$first = false;
		$second = false;

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		#$i = username_validation($username);
		#print_r($i);
		#die();
		$credentials = $this->user_accounts->get_credentials($username, $password);
		if(empty($credentials)) $first = false;
		else{
			$first = true;
		}
		$rsa = $this->input->post('rsa');
		$rsa = str_replace(" ", "", $rsa);

		$keys = $this->rsa->get_time_factor();

		for($ctr = 0; $ctr < sizeof($keys); $ctr++){
			$validation_string = $this->encrypt->decode($rsa,$password.$keys[$ctr]);
			if($ctr >= 3){
				$second = false;
				break;
			}
			if($validation_string == 'matilda'){
				$second = true;
				break;
			}
		}

		if($first && $second){
			echo 'logged in';
		}
		else{
			echo 'validation failed<br>';
			echo $first."-a<br>";
			echo $second."-b<br>";
		}
	}
}
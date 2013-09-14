<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_controller extends CI_Controller {

	public $css;
	public $html;
	public $js;
	public $body;

	function __construct(){
		parent::__construct();
		$this->load->helper('page_helper');
	}

	public function index()
	{
		$this->body[0] = 'main_stylesheet';
		$this->css[0] = 'main_stylesheet';
		$this->html[0] = 'base-controller';
		//$this->js[0] = '';

		load_header($this->css, $this->js, $this->html, $this->body);
		$this->load->view('base_views/template');
		load_footer();
	}

	public function override404(){
		$this->body[0] = '404';
		$this->css[0] = '404';

		load_header($this->css, $this->js, $this->html, $this->body);
		$this->load->view('base_views/404');
		load_footer();
	}
}
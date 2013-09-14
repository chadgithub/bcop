<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User_accounts extends CI_Model{
		public $key;
		function __construct(){
			parent::__construct();
			$this->load->database();
			$this->config->load('mx');
			$this->key = $this->config->item('sql_key');
		}

		function get_credentials($username, $password){
			$where = array('username' => $username, 'pasword' => 'decode('.$password.','.$this->key.')');
			$query = $this->db->get_where('user_accounts', array('username' => $username));
			$result = $query->result();
			if(empty($result)){
				return 0;
			}
			else{
				$result = $result[0];
				return $result;
			}
		}
	}
?>
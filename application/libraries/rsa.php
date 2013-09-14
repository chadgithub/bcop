<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rsa{

	public function get_time_factor()
	{
		$time_factor = date('U');
		$possible_keys = array();
		$ctr = 0;
		for($_x = 0;$_x <=60;$_x++){
			if(($time_factor-$_x) % 10 == 0){
				$possible_keys[$ctr] = $time_factor-$_x;
				$ctr++;
			}
		}		
		return $possible_keys;
	}
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$CI =& get_instance();
	$CI->load->helper('url');

	function load_header($css = '', $js = '', $html = '', $body = ''){
		echo '<!DOCTYPE html>';
		
		if(!empty($html)):
			echo '<html class="';
				for($ctr = 0;$ctr<sizeof($html);$ctr++){
					echo $html[$ctr].' ';
				}
			echo '">';
		else:
			echo '<html>';
		endif;

		echo '<head>';
			if(!empty($css)):
				for($ctr = 0;$ctr<sizeof($css);$ctr++){
					echo '<link rel="stylesheet" type="text/css" href="'.base_url().'webroot/css/'.$body[$ctr].'.css">';
				}
			endif;
			if(!empty($js)):
				for($ctr = 0;$ctr<sizeof($js);$ctr++){
					echo '<script type="text/javascript" src="'.base_url().$js[$ctr].'webroot/js/'.'.js"></script>';
				}	
			endif;
		echo '</head>';

		if(!empty($body)):
			echo '<body class="';
				for($ctr = 0;$ctr<sizeof($body);$ctr++){
					echo $body[$ctr].' ';
				}
			echo '">';
		else:
			echo '<body>';
		endif;
	}

	function load_footer(){
		echo '</body>';
		echo '</html>';
	}
?>
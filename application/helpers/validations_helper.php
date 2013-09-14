<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(! function_exists('minify_property')) {
	/*function to convert property name to a minify version*/
	function minify_property($marker = '_', $propertyName, $characterBefore = '', $characterAfter = '') {
		$arrName = explode($ma, $propertyName);
		$strPropName = '';
		if($arrName) {
			foreach ($arrName as $value) {
				$strPropName .= substr($value, 0,1);
			}
		}
		return $strPropName;
	}
}
if(!function_exists('username_validation')) {
	function username_validation($strEmail) {
		$trimmedEmail = trim($strEmail);
		if(strlen($trimmedEmail) > 0) {
			if(preg_match('/^[a-zA-Z].*[a-zA-Z0-9\.\_].*[a-zA-Z0-9\.\_]{8,16}$/', $trimmedEmail)) {
				return (object)array('valid'=>1, 'message'=>'Username valid');
			}
			else {
				return (object)array('valid'=>2, 'message'=>'Username invalid');
			}
		}
		else {
			return (object)array('valid'=>3, 'message'=>'Username required');
		}
	}
}
?>
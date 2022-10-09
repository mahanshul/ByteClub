<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('load_asset'))
{
	function load_asset($name, $vendor = false)
	{
		$CI =& get_instance();
		$CI->load->library(['asset']);
		return $CI->asset->load($name, $vendor);
	}
}

?>
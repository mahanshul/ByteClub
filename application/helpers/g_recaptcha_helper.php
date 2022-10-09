<?php

defined('BASEPATH') OR exit('No direct script access allowed');


if (! function_exists('g_recaptcha_site_key'))
{
	function g_recaptcha_site_key()
	{
		$CI =& get_instance();
		$CI->load->library('g_recaptcha');
		return $CI->g_recaptcha->site_key();
	}
}

?>
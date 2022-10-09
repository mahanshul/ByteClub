<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Gravatar
{
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper(['security']);
	}
	public function get_url($email, $s = 80, $d = '404', $r = 'g', $img = false, $atts = [])
	{
		$this->url = 'https://www.gravatar.com/avatar/';
		$this->url .= do_hash(strtolower(trim($email)), 'md5');
		$this->url .= "?s=$s&d=$d&r=$r";
		if ($img)
		{
			$this->url = '<img src="' . $this->url . '"';
			foreach ($atts as $key => $val)
			{
				$this->url .= ' ' . $key . '="' . $val . '"';
				$this->url .= ' />';
			}
		}
		return $this->url;
	}
}

?>
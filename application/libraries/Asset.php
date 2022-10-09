<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Asset
{
	public function __construct()
	{
		$this->CI =& get_instance();		
		$this->CI->load->helper(array('file'));
	}
	public function load($name, $vendor = false)
	{
		$this->link = '/public/';
		if ($vendor)
		{
			$this->link .=  'vendor/';
		}
		$this->link .= $name;
		$this->time = get_file_info(APPPATH . ".." . $this->link)['date'];
		$this->link .= '?t=' . $this->time;
		if (!empty($this->time))
		{
			return $this->link;			
		}
		return "";
	}
}

?>
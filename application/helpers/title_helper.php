<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('page_to_title'))
{
	function page_to_title($page)
	{
		$page = preg_replace("/[\/]/", " | ", $page);
		$page = preg_replace("/[_]/", " ", $page);
		$page = ucwords($page);
		return $page;
	}
}
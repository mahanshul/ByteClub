<?php

defined('BASEPATH') OR exit('No direct script access allowed');


if (! function_exists('component'))
{
	function component($component = "", $data = [])
	{
		$CI =& get_instance();
		$CI->load->helper(array('file'));

		$time = get_file_info(APPPATH . "views/components/{$component}.php")['date'];
		if ($time)
		{
			error_reporting(0);
			$CI->load->view("components/{$component}", $data, FALSE);
			$CI->load->clear_vars();
			error_reporting(-1);
		}
	}
}

if (! function_exists('timer_type'))
{
	function timer_type($name = "", $from = "", $to="")
	{
		$CI =& get_instance();
		$CI->load->helper(array('date'));

		if (strtotime($from) > now())
		{
			component("timer_countdown", array($from, $to));
		}
		else if (strtotime(($to)) > now())
		{
			component("timer_happening_{$name}");
		}
		else
		{
			component("timer_finished_{$name}");
		}
	}
}

if (! function_exists('member'))
{
	function member($data = [])
	{
		$CI =& get_instance();
		$CI->load->library(['asset', 'gravatar']);

		if (empty($data['name']))
		{
			$data['name'] = 'Fourofour Indiansurname';
		}
		if (empty($data['email']))
		{
			$data['email'] = '';
		}
		if (empty($data['post']))
		{
			$data['post'] = 'Member';
		}
		if (empty($data['image']))
		{
			$data['image'] = NULL;
		}
		$data['image'] = $CI->asset->load("images/members/{$data['image']}.jpg");
		if (!empty($data['image']))
		{
			$data['image'] = "src='{$data['image']}'";
		}
		else
		{
			$data['image'] = $CI->gravatar->get_url($data['email'], 400);
			$data['image'] = "src='{$data['image']}' alt=' '";
		}
		if (!empty($data['website']))
		{
			$data['website'] = "link' href='{$data['website']}'";
		}
		else
		{
			$data['website'] = "'";
		}
		component('member', $data);
	}
}

if (! function_exists('form_field'))
{
	function form_field($data = [])
	{
		if ((!empty($data['required'])) && ($data['required'] == 'true'))
		{
			$data['required'] = true;
		}
		else
		{
			$data['required'] = false;
		}
		if (empty($data['type']))
		{
			$data['type'] = 'text';
		}
		component('form_field', $data);
	}
}

if (! function_exists('form_field_textarea'))
{
	function form_field_textarea($data = [])
	{
		if ((!empty($data['required'])) && ($data['required'] == 'true'))
		{
			$data['required'] = true;
		}
		else
		{
			$data['required'] = false;
		}
		if (empty($data['rows']))
		{
			$data['rows'] = '1';
			$data['data_min_rows'] = '1';
		}
		else if (empty($data['data_min_rows']))
		{
			$data['data_min_rows'] = $data['rows'];
		}
		if (empty($data['auto_expand']))
		{
			$data['auto_expand'] = 'true';
		}
		if ($data['auto_expand'] == 'true')
		{
			$data['textarea_class'] = 'auto-expand';
		}
		else
		{
			$data['textarea_class'] = '';
		}
		component('form_field_textarea', $data);
	}
}


?>
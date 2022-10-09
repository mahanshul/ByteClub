<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class G_recaptcha
{

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->config->load('g_recaptcha');
		$this->site_key = $this->CI->config->item("site_key");
		$this->link = $this->CI->config->item("link");
		$this->secret = $this->CI->config->item("secret");
	}

	public function site_key()
	{
		return $this->site_key;
	}

	public function is_valid($g_recaptcha_response)
	{
		$options = [
			"secret" => $this->secret,
			"response" => $g_recaptcha_response,
			"remoteip" => $this->CI->input->ip_address(),
		];
		$this->response = Requests::post($this->link, [], $options);
		return json_decode($this->response->body)->success;
	}
}

?>
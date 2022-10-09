<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['message_model']);
		$this->load->helper(['email', 'form', 'url','string']);
		$this->load->library(['form_validation', 'g_recaptcha']);
		$this->response = [];
	}
	public function message()
	{
		$this->response["overall_success"] = false;
		$this->form_validation->set_rules([
			[
				"field" => "name",
				"label" => "Name",
				"rules" => [
					"reduce_multiple_spaces",
					"required",
					"min_length[3]",
					"max_length[64]",
					"regex_match[/^[a-zA-Z][a-zA-Z\.\'\-\ ]+$/]",
				],
			],
			[
				"field" => "email",
				"label" => "E-Mail ID",
				"rules" => [					
					"reduce_multiple_spaces",
					"required",
					"min_length[5]",
					"max_length[254]",
					"valid_email",
				],
			],
			[
				"field" => "subject",
				"label" => "Subject",
				"rules" => [
					"reduce_multiple_spaces",
					"required",
					"min_length[1]",
					"max_length[140]",
				],
			],
			[
				"field" => "body",
				"label" => "Body",
				"rules" => [
					"reduce_multiple_spaces",
					"required",
					"min_length[1]",
					"max_length[63206]",
				],
			]
		]);
		$this->response["form_valid"] = $this->form_validation->run();
		if ($this->response["form_valid"])
		{
			$this->response["g_recaptcha_valid"] = $this->g_recaptcha->is_valid($this->input->post('g-recaptcha-response'));
			if ($this->response["g_recaptcha_valid"])
			{
				$this->response["overall_success"] = $this->message_model->store();
				if ($this->response["overall_success"])
				{
					$this->output_response(true);
					$this->message_model->send_unsent_emails();
				}
		}
		if (!$this->response["overall_success"])
		{
			$this->output_response();
		}
	}
	private function output_response($flush = false)
	{
		echo json_encode($this->response);
		if ($flush)
		{
			header('Connection: close');
			header('Content-Length: '.ob_get_length());
			ob_end_flush();
			if( ob_get_level() > 0 ) ob_flush();
			flush();
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['rule']);
	}
	public function index()
	{
		$data["rules"] = $this->rule->process( $this->rule->load("views/rules/input.xml") );
		$this->load->view("pages/rules", $data);
	}
}
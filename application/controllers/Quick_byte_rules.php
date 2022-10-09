<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quick_byte_rules extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['rule']);
	}
	public function index()
	{
		$data["rules"] = $this->rule->process( $this->rule->load("views/qb_rules/input.xml") );
		$this->load->view("pages/quick_byte_rules", $data);
	}
}
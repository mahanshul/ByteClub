<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctff extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['request_model']);
		$this->load->helper(['email', 'form', 'url','string']);
		$this->load->library(['form_validation']);
		$this->response = [];
	}
	public function view($page = "home", $dir = "", $data = [])
	{
		$this -> load -> library(array("session"));
		if($page === "")
		{
			$this -> load -> helper('url');
			redirect("/byte_it/home");
		}
		$this->load->helper(['html', 'menu', 'component', 'asset', 'form', 'security', 'g_recaptcha', 'title']);
	
		if (!file_exists(APPPATH . "views/pages/byte_it/{$page}.php"))
		{
			#show_404();
		}

		$data["theme"] = "default";
		if ($page == "home")
		{
			if (empty($dir))
			{
				$data["title"] = "Byte.IT | Byte Club";						
			}
			else
			{
				$data["title"] = page_to_title($dir)." | Byte.IT";
			}
		}
		else
		{
			$data["title"] = page_to_title($page)." | Byte.IT";
		}
		if($page == "events")
		{
			$this -> load -> library(['rule']);
			$data["rules"] = $this->rule->process( $this->rule->load("views/rules/input.xml"));
		}
		$data["page"] = $page;
		if (!empty($dir))
		{
			$data["page"] = "{$dir}/{$data['page']}";
		}
		$data["page"] = "byte_it/{$data['page']}";
		$data["page_css"] = $page;
		$data["containsforjs"] = true;
		if (!empty($dir))
		{
			$data["page_css"] = "{$dir}-{$data['page_css']}";
		}
		$data["page_css"] = "byte_it-{$data['page_css']}";
		$data["special_css"] = "byte_it";
		$data['csrf'] = ['name'=>$this->security->get_csrf_token_name(), 'hash'=>$this->security->get_csrf_hash()];

		$data["logged_in"] = false;
		$data["logged_in"] = $this -> session -> logged_in;
		$data["event_started"] = false;

		$this->load->view("html/header", $data);
		$this -> load -> view("themes/default/header", $data);
		$this -> load -> view("themes/byte_it/sidebar", $data);
		$this->load->view("html/main_open");
		$this->load->view("pages/byte_it/{$page}.php", $data);
		$this->load->view("html/main_close");
		$this -> load -> view("themes/default/footer", $data);
		$this->load->view("html/footer", $data);
	}

	public function ctf(){
		$indices = $this -> input -> post("keys&dicts"); 
		if(isset($indices)){
			echo "hello";
			$this->view('_frozen_importlib_external.FileFinderodict_iteratorzipcode_collections._tuplegetterkeys');
		}else if($indices == "9820793517068"){
			echo " hi";
			redirect('byte_it/admin');
		}else{
			$this->view('_frozen_importlib_external.FileFinderodict_iteratorzipcode_collections._tuplegetterkeys');
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quick_byte extends CI_Controller
{	
	public function __construct()
	{
		parent::__construct();
		$this->response = [];
	}
	public function register()
	{
		$this -> load -> helper('url');
		redirect("https://goo.gl/forms/MxVVVgTKKUhtZHKy2");
	}
	public function view($page = "home", $dir = "", $data = [])
	{
		if($page === "")
		{
			$this -> load -> helper('url');
			redirect("/quick_byte/home");
		}
		$this->load->helper(['html', 'menu', 'component', 'asset', 'form', 'security', 'g_recaptcha', 'title']);
	
		if (!file_exists(APPPATH . "views/pages/quick_byte/{$page}.php"))
		{
			show_404();
		}

		$data["theme"] = "default";
		if ($page == "home")
		{
			if (empty($dir))
			{
				$data["title"] = "Quick Byte | Byte Club";						
			}
			else
			{
				$data["title"] = page_to_title($dir)." | Quick Byte";
			}
		}
		else
		{
			$data["title"] = page_to_title($page)." | Quick Byte";
		}
		if($page == "events")
		{
			$this -> load -> library(['rule']);
			$data["rules"] = $this->rule->process( $this->rule->load("views/qb_rules/input.xml"));
		}
		$data["page"] = $page;
		if (!empty($dir))
		{
			$data["page"] = "{$dir}/{$data['page']}";
		}
		$data["containsforjs"] = true;
		$data["page"] = "quick_byte/{$data['page']}";
		$data["page_css"] = $page;
		if (!empty($dir))
		{
			$data["page_css"] = "{$dir}-{$data['page_css']}";
		}
		$data["page_css"] = "quick_byte-{$data['page_css']}";
		$data["special_css"] = "quick_byte";
		$data['csrf'] = ['name'=>$this->security->get_csrf_token_name(), 'hash'=>$this->security->get_csrf_hash()];

		$data["logged_in"] = false;
		$data["event_started"] = false;

		$this->load->view("html/header", $data);
		$this -> load -> view("themes/default/header", $data);
		$this -> load -> view("themes/quick_byte/sidebar", $data);
		$this->load->view("html/main_open");
		$this->load->view("pages/quick_byte/{$page}.php", $data);
		$this->load->view("html/main_close");
		$this -> load -> view("themes/default/footer", $data);
		$this->load->view("html/footer", $data);
	}

	

}

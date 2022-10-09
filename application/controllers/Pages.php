<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['html', 'menu', 'component', 'date', 'form', 'g_recaptcha', 'asset']);
	}
	public function view(...$page)
	{
		$page = implode($page, '/');
		$page = ((empty($page))?("home"):($page));
		if (!file_exists(APPPATH . "views/pages/{$page}.php"))
		{
			show_404();
		}
		else
		{
			$ini_file = APPPATH . "views/pages/{$page}.ini";
			if (file_exists($ini_file))
			{
				$data = parse_ini_file($ini_file);
			}
			$data['title'] = ((!isset($data['title']))?(ucfirst($page)):($data['title'])) . " | Byte Club";
			$data['theme'] = (!isset($data['theme']))?("default"):($data['theme']);

			$data['page'] = $page;
			$data['page_css'] = preg_replace('[\/]', '-', $page);
			$data['special_css'] = "";
			$data['csrf'] = ['name'=>$this->security->get_csrf_token_name(), 'hash'=>$this->security->get_csrf_hash()];

			$data["logged_in"] = false;
			$data["containsforjs"] = false;
			$data['year'] = get_date();

			if ($page == 'byte_it') 
			{
				$this->load->library(['rule']);
				$data["rules"] = $this->rule->process( $this->rule->load("views/rules/input.xml"));
			}

			$this -> load -> view("html/header", $data);
			if (file_exists(APPPATH . "views/themes/{$data['theme']}/header.php"))
			{
				$this -> load -> view("themes/{$data['theme']}/header", $data);				
			}
			$this -> load -> view("html/main_open");
			$this -> load -> view("pages/{$page}", $data);
			$this -> load -> view("html/main_close");
			if (file_exists(APPPATH . "views/themes/{$data['theme']}/footer.php"))
			{
				$this -> load -> view("themes/{$data['theme']}/footer", $data);				
			}
			$this -> load -> view("html/footer", $data);
		}
	}
}
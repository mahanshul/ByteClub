<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libre extends CI_Controller
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
			redirect("/libre/home");
		}
		$this->load->helper(['html', 'menu', 'component', 'asset', 'form', 'security', 'g_recaptcha', 'title']);
	
		if (!file_exists(APPPATH . "views/pages/lmarathon/{$page}.php"))
		{
			show_404();
		}

		$data["theme"] = "default";
		if ($page == "home")
		{
			if (empty($dir))
			{
				$data["title"] = "Home | Libre";						
			}
			else
			{
				$data["title"] = page_to_title($dir)." | Libre";
			}
		}
		else
		{
			$data["title"] = page_to_title($page)." | Libre";
		}
		if($page == "home")
		{
			$this -> load -> library(['rule']);
			$data["rules"] = $this->rule->process( $this->rule->load("views/rules/inputli.xml"));
		}
		$data["page"] = $page;
		if (!empty($dir))
		{
			$data["page"] = "{$dir}/{$data['page']}";
		}
		$data["page"] = "libre/{$data['page']}";
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
		$this -> load -> view("themes/default/header_libre", $data);
		$this->load->view("html/main_open");
		$this->load->view("pages/lmarathon/{$page}.php", $data);
		$this->load->view("html/main_close");
		$this -> load -> view("themes/default/footer", $data);
		$this->load->view("html/footer", $data);
	}
	public function home()
	{
		$this->load->library('session');
 	  	if($this -> session -> has_userdata('logged_in_team') AND $this->session->userdata('logged_in_team')){
 	  		$id = $this->session->userdata('currentid');
 	  		$this->load->model('libre_model');
 	  		$data_raw = $this->libre_model->taskdata($id);
			$fields = ["t1", "t2", "t3", "t4", "t5", "t6", "t7", "t8", "t9", "t10", "t11", "t12"];
			$data = ["pop" => []];
			$data["id"] = $id;

			 foreach ($fields as $field) {
				 $this->session->set_userdata($field, $data_raw[$field]);
				 $data["pop"][$field] = $this->session->userdata($field);
			 }

 	  		$this -> view('home', "", $data);
 	  	}
 	  	else if($this -> session -> has_userdata('logged_in_admin') AND $this->session->userdata('logged_in_admin')){
 	  		redirect('/libre/portal');
 	  	}
 	  	else{
 	  		redirect('/libre/login');
 	  	}
	}

	public function admin(){
		$this->load->library('session');
		if($this -> session -> has_userdata('logged_in_admin') AND $this->session->userdata('logged_in_admin')){
 	  		redirect('/libre/portal');
 	  	}else{
 	  		$username = $this -> input -> post("username"); 
 	  		$password = $this -> input -> post("password"); 
 	  		if($username === "saintrms" AND $password === "_p455w0rd_lelo_like_aloo_") {
 	  			
 	  			$this->session->set_userdata(["logged_in_admin" => TRUE]);
 	  			redirect("/libre/portal");
 	  		}
 	  	}
 	  	$this->view('admin');
	}
	public function portal(){
		$this->load->model('libre_model');
	     	$success = $this->libre_model->get_all_data();
	     	$rows = $this->libre_model->get_num_rows();
	     	$fields = ["id","t1", "t2", "t3", "t4", "t5", "t6", "t7", "t8", "t9", "t10", "t11", "t12","total"];

	     	foreach($fields as $field){
	     		$data[$field] = array();
	     	}
	     	for($i=0; $i<$rows; $i++){
	     		foreach($fields as $field){
		     			if($field == "id" OR $field == "total"){
		     				continue;
		     			}else if($success[$i][$field] == "1"){
		     				echo "chala";		
		     				array_push($data[$field], $i);
		     				print_r($data[$field]);	

		     			}else{
		     				echo "chalaa";
		     			}
	     			}
	     		echo $i;
	     	}
	     	echo $rows;
	     	echo $success[0]["id"][0];
	     	print_r($success);
	     	$this->view('portal', "", $data);
	}
	public function login()
	{
		$this->load->helper(['email', 'form', 'string']);
		$this->load->library(['form_validation', 'session']);
		$this->response = [];
		$this->form_validation->set_rules([
			[
				"field" => "userid",
				"label" => "Team ID",
				"rules" => [
					"reduce_multiple_spaces",
					"required",
					"min_length[3]",
					"max_length[64]",
				],
			],
			[
				"field" => "pass",
				"label" => "Password",
				"rules" => [					
					"required",
					"min_length[5]",
					"max_length[254]",
				],
			],
			
		]);
		$this->response["form_valid"] = $this->form_validation->run();
		if ($this->response["form_valid"] == FALSE)
		{ 
			$this->view('login');
		} 
	     else{
	     	$this->load->model('libre_model');
	     	$success = $this->libre_model->loginn($this->input->post('userid'), $this->input->post('pass'));
	     	if($success != FALSE){
	     		$this->session->set_userdata(["logged_in_team" => TRUE]);
	     		$this->session->set_userdata(["currentid" => $success]);
	     		redirect('libre/home');
	     	}
	     	else {
	     		$this->view('login');
	     	}
		}
	}
	public function submit()
	{
		$this->load->library(['session']);
		if($this -> session -> has_userdata('logged_in_team') AND $this->session->userdata('logged_in_team')){
			$this->load->helper(['email', 'form', 'string']);
		$this->load->library(['form_validation', 'session']);
		$this->response = [];
		$this->form_validation->set_rules([
			[
				"field" => "tasks",
				"label" => "Task",
				"rules" => [
					"reduce_multiple_spaces",
					"required",
					"min_length[3]",
					"max_length[64]",
				],
			],
			
		]);
		$this->response["form_valid"] = $this->form_validation->run();
		if ($this->response["form_valid"] == FALSE)
		{ 
			$this->load->helper(["component"]);
			$id = $this->session->userdata('currentid');
 	  		$this->load->model('libre_model');
 	  		$data_raw = $this->libre_model->taskdata($id);
 	  		unset($data_raw["id"]);
 	  		$fields = ["t1", "t2", "t3", "t4", "t5", "t6", "t7", "t8", "t9", "t10", "t11", "t12"];
 	  		$data = ["pop" => []];
			$data["id"] = $id;

			 foreach ($fields as $field) {
			 	if($data_raw[$field] == 0){
			 	 $add = explode("t",$field);
				 $fieldd = "Task" . $add[1];
				 $data["pop"][$fieldd] = "true";
				}else{
				 $add = explode("t",$field);
				 $fieldd = "Task" . $add[1];
				 $data["pop"][$fieldd] = "false";

				}
			 }

			$this->view('submit', "", $data);
		}
		else{
			$id = $this->session->userdata('currentid');
			$currenttask = $this->input->post("tasks");
			$edit = explode("sk", $currenttask);
			$t = "t" . $edit[1];
			$this->load->model('libre_model');
 	  		$status = $this->libre_model->submit($t, $id);
 	  		if ($status) {
 	  			redirect('libre/home');
 	  		}
		}
	}else{
			redirect('libre/home');
		}

	
}


}
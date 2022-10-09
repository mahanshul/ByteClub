<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Byte_it extends CI_Controller
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

	public function team($page = "home")
	{
		$this->view($page, "team");
	}
	public function ctf(){
		$indices = $this -> input -> post("keys&dicts"); 
		if(isset($indices) AND $indices != "9820793517068"){
			$this->view('_frozen_importlib_external.FileFinderodict_iteratorzipcode_collections._tuplegetterkeys');
		}else if($indices == "9820793517068"){
			$data["flag"]["zero"] = "flag{N07rEvN0RcRYp70_jU57519h71N'}";
			$this->view('_frozen_importlib_external.FileFinderodict_iteratorzipcode_collections._tuplegetterkeys', "", $data);
		}else{
			$this->view('_frozen_importlib_external.FileFinderodict_iteratorzipcode_collections._tuplegetterkeys');
		}
	}
	public function request()
	{
	    $this->load->helper(['email', 'form', 'string']);
		$this->load->library(['form_validation']);
		$this->response = [];
		$this->form_validation->set_rules([
			[
				"field" => "school",
				"label" => "School",
				"rules" => [
					"reduce_multiple_spaces",
					"required",
					"min_length[3]",
					"max_length[64]",
				],
			],
			[
				"field" => "semail",
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
				"field" => "pemail",
				"label" => "E-Mail ID",
				"rules" => [					
					"reduce_multiple_spaces",
					"required",
					"min_length[5]",
					"max_length[254]",
					"valid_email",
				],
			],
			
		]);
		$this->response["form_valid"] = $this->form_validation->run();
		if ($this->response["form_valid"] == FALSE)
		{ 
			$this->view('request');
		} 
	     else{
	     	$this->load->model('request_model');
	     	$success = $this->request_model->store($this->input->post('school'), $this->input->post('semail'), $this->input->post('pemail'));
	     	if($success){
	     		$this->view('request_success');
	     	}
	     	else {
	     		$this->view('request_failure');
	     	}
	        
	}

}
	public function admin(){
		$this->load->library('session');
 	  	if($this -> session -> has_userdata('logged_in') AND $this->session->userdata('logged_in')){
 	  		redirect("byte_it/portal");
 	  	}
 	  	else {
 	  		$username = $this -> input -> post("username"); 
 	  		$password = $this -> input -> post("password"); 
 	  		if($username === "saintrms" AND $password === "_p455w0rd_lelo_like_aloo_") {
 	  			
 	  			$this->session->set_userdata(["logged_in" => TRUE]);
 	  			redirect("/byte_it/portal");
 	  		}
 	  	}
 	  	$this->view("admin");
	}
	public function portal()
	{
        parent::__construct();
		$this->load->model(['request_model', 'register_model']);
		$this->response = [];
		$this->load->library(['table', 'session']);
		$template = array(
			'table_open' => '<table id="request" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="request_table">'
		);
		$this->table->set_template($template);
		$this->table->set_heading('ID', 'School', 'School Email ID', 'Student Email ID', 'Time', 'IP Address');
		$request_query = $this-> request_model -> get_rows();
		$request_table = $this->table->generate($request_query);
		$data["request_table"] = $request_table;
		//------------------------------------------------------------
		$template_register = array(
			'table_open' => '<table id="register" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="register_table">'
		);
		$this->table->set_template($template_register);
		$this->table->set_heading('ID', 'Code', 'School', 'Teacher', 'School Email', 'Teacher\'s email', 'Teacher\'s mobile', 'Student in charge', 'Student in charge email', 'Student in charge mobile', 'Attendance');
		$register_query = $this-> register_model -> get_rows();
		$register_table = $this->table->generate($register_query);
		$data["register_table"] = $register_table;
		//------------------------------------------------------------
		$template_events = array(
			'table_open' => '<table id="events" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="events_table">'
		);
		$this->table->set_template($template_events);
		$this->table->set_heading('Code', 'School', 'Cre P 1', 'Cre P 1 Email', 'Cre P 2 ', 'Cre P 2 Email', 'Cre P 3 ', 'Cre P 3 Email', 'Cre P 4',  'Cre P 4 Email', 'Pro P 1', 'Pro P 1 Email', 'Pro P 1 HR' ,'Pro P 2','Pro P 2 Email', 'Pro P 2 HR' ,'3D P 1', '3D P 1 Email', '3D P 2', '3D P 2 Email','Qu P 1', 'Qu P 1 Email','Qu P 2', 'Qu P 2 Email','GD P 1', 'GD P 1 Email','Tinker P 1', 'Tinker P 1 Email','Photo P 1', 'Photo P 1 Email','JD P 1', 'JD P 1 Email', 'JD P 2 ', 'JD P 2 Email', 'Pre P 1', 'Pre P 1 Email', 'Sur P 1', 'Sur P 1 Email', 'Sur P 2', 'Sur P 2 Email','Game P 1', 'Game P 1 Email', 'Time','IP');
		$events_query = $this-> register_model -> get_events_rows();
		$events_table = $this->table->generate($events_query);
		$data["events_table"] = $events_table;
		//------------------------------------------------------------
		$template_cre = array(
			'table_open' => '<table id="cre" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="cre_table">'
		);
		$this->table->set_template($template_cre);
		$this->table->set_heading('Code', 'School', 'Cre P 1', 'Cre P 1 Email', 'Cre P 2 ', 'Cre P 2 Email', 'Cre P 3 ', 'Cre P 3 Email', 'Cre P 4',  'Cre P 4 Email','Time','IP');
		$cre_query = $this-> register_model -> get_cre_rows();
		$cre_table = $this->table->generate($cre_query);
		$data["cre_table"] = $cre_table;
		//------------------------------------------------------------
		$template_prog = array(
			'table_open' => '<table id="prog" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="prog_table">'
		);
		$this->table->set_template($template_prog);
		$this->table->set_heading('Code', 'School', 'Prog P 1', 'Prog P 1 Email', 'Prog P 1 HR ', 'Prog P 2','Prog P 2 Email', 'Prog P 2 HR','Time','IP');
		$prog_query = $this-> register_model -> get_prog_rows();
		$prog_table = $this->table->generate($prog_query);
		$data["prog_table"] = $prog_table;
		//------------------------------------------------------------
		$template_qu = array(
			'table_open' => '<table id="qu" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="qu_table">'
		);
		$this->table->set_template($template_qu);
		$this->table->set_heading('Code', 'School', 'Qu P 1', 'Qu P 1 Email', 'Qu P 2 ', 'Qu P 2 Email', 'Time','IP');
		$qu_query = $this-> register_model -> get_qu_rows();
		$qu_table = $this->table->generate($qu_query);
		$data["qu_table"] = $qu_table;
		//------------------------------------------------------------
		$template_gd = array(
			'table_open' => '<table id="gd" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="gd_table">'
		);
		$this->table->set_template($template_gd);
		$this->table->set_heading('Code', 'School', 'GD P 1', 'GD P 1 Email', 'Time','IP');
		$gd_query = $this-> register_model -> get_gd_rows();
		$gd_table = $this->table->generate($gd_query);
		$data["gd_table"] = $gd_table;
		//------------------------------------------------------------
		$template_tk = array(
			'table_open' => '<table id="tk" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="tk_table">'
		);
		$this->table->set_template($template_tk);
		$this->table->set_heading('Code', 'School', 'TK P 1', 'TK P 1 Email', 'TK P 2', 'TK P 2 Email', 'Time','IP');
		$tk_query = $this-> register_model -> get_tk_rows();
		$tk_table = $this->table->generate($tk_query);
		$data["tk_table"] = $tk_table;
		//------------------------------------------------------------
		$template_rob = array(
			'table_open' => '<table id="rob" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="rob_table">'
		);
		$this->table->set_template($template_rob);
		$this->table->set_heading('Code', 'School', 'Snap P 1', 'Snap P 1 Email','Time','IP');
		$rob_query = $this-> register_model -> get_rob_rows();
		$rob_table = $this->table->generate($rob_query);
		$data["rob_table"] = $rob_table;
		//------------------------------------------------------------
		$template_game = array(
			'table_open' => '<table id="game" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="game_table">'
		);
		$this->table->set_template($template_game);
		$this->table->set_heading('Code', 'School', 'Pres P 1', 'Pres P 1 Email','Time','IP');
		$game_query = $this-> register_model -> get_game_rows();
		$game_table = $this->table->generate($game_query);
		$data["game_table"] = $game_table;
		//------------------------------------------------------------
		$template_sur = array(
			'table_open' => '<table id="sur" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="sur_table">'
		);
		$this->table->set_template($template_sur);
		$this->table->set_heading('Code', 'School', 'sur P 1', 'sur P 1 Email', 'sur P 2 ', 'sur P 2 Email','Time','IP');
		$sur_query = $this-> register_model -> get_sur_rows();
		$sur_table = $this->table->generate($sur_query);
		$data["sur_table"] = $sur_table;
		//------------------------------------------------------------
		$template_fm = array(
			'table_open' => '<table id="fm" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="fm_table">'
		);
		$this->table->set_template($template_fm);
		$this->table->set_heading('Code', 'School', 'J Des P 1', 'J Des P 1 Email', 'J Des P 2 ', 'J Des P 2 Email','Time','IP');
		$fm_query = $this-> register_model -> get_fm_rows();
		$fm_table = $this->table->generate($fm_query);
		$data["fm_table"] = $fm_table;
		//------------------------------------------------------------
		$template_hh = array(
			'table_open' => '<table id="hh" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="hh_table">'
		);
		$this->table->set_template($template_hh);
		$this->table->set_heading('Code', 'School', 'Game P 1', 'Game P 1 Email','Time','IP');
		$hh_query = $this-> register_model -> get_hh_rows();
		$hh_table = $this->table->generate($hh_query);
		$data["hh_table"] = $hh_table;
		//------------------------------------------------------------
		$template_mm = array(
			'table_open' => '<table id="mm" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="mm_table">'
		);
		$this->table->set_template($template_mm);
		$this->table->set_heading('Code', 'School', '3D P 1', '3D P 1 Email','Time','IP');
		$mm_query = $this-> register_model -> get_mm_rows();
		$mm_table = $this->table->generate($mm_query);
		$data["mm_table"] = $mm_table;
		//------------------------------------------------------------
		$template_filtered = array(
			'table_open' => '<table id="filtered" border="0" cellpadding="4" cellspacing="0">',
	        'tbody_open' => '<tbody id="filtered_table">'
		);
		$this->table->set_template($template_filtered);
		$this->table->set_heading('Team Number', 'Code', 'School', 'Status');
		$filtered_query = $this-> register_model -> filtered();
		$filtered_table = $this->table->generate($filtered_query);
		$data["filtered_table"] = $filtered_table;
		//------------------------------------------------------------

		if($this -> session -> has_userdata('logged_in') AND $this->session->userdata('logged_in'))
		{
			$this->view("portal", "" , $data);
		}
		else {
			redirect("byte_it/admin");
		}

	}
	public function confirm_attendance(){
		$this->load->library('session');
		if($this -> session -> has_userdata('logged_in') AND $this->session->userdata('logged_in'))
		{
			// parent::__construct();
			$this->load->model(['request_model']);
			$this->response = [];
			// $schools = $this->request_model->get_schools();
			// $this->session->set_userdata('var', $schools);
			// $this->view("confirm_attendance", "" , array('schools' => $this->session->userdata('var')));
			$data['school_name'] = $this->request_model->get_schools();
			$this->view("confirm_attendance", '', $data);
		}
		else {
			redirect("byte_it/admin");
		}
		$school = $this->input->post("school_name");
		$this->load->model(['request_model']);
		$status = $this->request_model->confirm_attendance($school);
		echo $status;
		//add success and error pages!

	}
	public function logout()
	{
		$this->load->library('session');
		if($this->session->has_userdata('logged_in')){
			$this->session->unset_userdata('logged_in');
			redirect("byte_it/admin");
		}else{
			redirect('error_404');
		}
		
	}
	public function generate()
	{

		parent::__construct();
		$this->load->model(['register_model']);
		$this->response = [];
		$this->load->library(['table', 'session']);
		$this -> load -> helper('file');
		if($this -> session -> has_userdata('logged_in') AND $this->session->userdata('logged_in'))
		{
			$file = "db/reg.txt";
			if (!(fopen($file, 'r+'))) {
				$data = 1;
				write_file($file, $data, 'w+');
				/*echo "nahi chala";*/
			} else {
				$int = 0;
				$data = read_file($file);
				$int = intval($data);
				$current = $this->register_model->generate_codes($int);
				// $n = $current . ",";
				// echo $n;
				write_file($file, ",", 'a');
				write_file($file, $current, 'a');
				
			}
			redirect("/byte_it/portal");
		}
	}
	public function register(){
		$this->load->helper(['email', 'form', 'string']);
		$this->load->library(['form_validation', 'session']);
		$this->response = [];
		$this->form_validation->set_rules([
			[
				"field" => "hash",
				"label" => "Hash",
				"rules" => [
					"reduce_multiple_spaces",
					"required",
					"min_length[19]",
					"max_length[19]",
				],
			],
			
		]);
		$this->response["form_valid"] = $this->form_validation->run();
		if ($this->response["form_valid"] == FALSE)
		{ 
			$this->view('register');
		} 
	     else{
	     	$hash = $this->input->post('hash');
	     	$this->load->model('register_model');
	     	$code_valid = $this->register_model->register_check($this->input->post('hash'));
	     	
	     	if($code_valid){
	     		$this->session->set_userdata('hash', $hash);
	     		$this->session->set_userdata('correct', TRUE);
				$this->register_form_school($this->session->userdata('hash'), TRUE);
				// 'correct' => "TRUE", 'hash'=> $this->session->userdata('hash'))
		 	}
	     	else {
	     		$this->view('register', '' , array('error' => "Invalid registration code"));
	     	}
	        
	}
	}
	public function register_form_school($hash, $status){
		$this->load->model(['request_model']);
		$this->load->library('session');
		if($this->session->has_userdata('correct') AND $this->session->userdata('correct')){
			 $raw_values = $this->request_model->get_school_data($this->session->userdata('hash'));

			 $fields = ["school_name", "school_email_id", "teacher_name", "teacher_email_id", "teacher_mobile", "student_incharge_name", "student_incharge_email_id", "student_incharge_mobile"];
			 $data = ["pop" => []];

			 foreach ($fields as $field) {
				 $this->session->set_userdata($field, $raw_values[$field]);
				 $data["pop"][$field] = $this->session->userdata($field);
			 }
			 $data["hash"] = $this->session->userdata("hash");
			 
			$this->view('register_form_school','',$data);
			 // echo $data["values"];
		}
		else{
			redirect("/byte_it/register");
		}

	}
	public function register_school(){
			$this->load->helper(['email', 'form', 'string']);
			$this->load->library(['form_validation', 'session']);
			$this->response = [];
			$this->form_validation->set_rules([
				[
					"field" => "hash",
					"label" => "Registration Code",
					"rules" => [
						"reduce_multiple_spaces",
						"min_length[19]",
						"max_length[19]",
					],
				],
				[
					"field" => "school",
					"label" => "School Name",
					"rules" => [
						"reduce_multiple_spaces",
						"required",
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "school_email_id",
					"label" => "School Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						"required",
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "teacher",
					"label" => "Teacher Name",
					"rules" => [
						"reduce_multiple_spaces",
						"required",
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "teacher_email_id",
					"label" => "Teacher Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						"required",
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "teacher_mobile",
					"label" => "Teacher Mobile",
					"rules" => [
						"reduce_multiple_spaces",
						"required",
						"min_length[10]",
						"max_length[10]",
						"regex_match[/^[0-9]{10}$/]",
					],
				],
				[
					"field" => "student",
					"label" => "Student Name",
					"rules" => [
						"reduce_multiple_spaces",
						"required",
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "student_email_id",
					"label" => "Student Email ID",
					"rules" => [
						"reduce_multiple_spaces",
						"required",
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "student_mobile",
					"label" => "Student Mobile",
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
				/*$this->view('register_form_school', '' , array('correct' => "TRUE"));*/
				$fields = ["school_name", "school_email_id", "teacher_name", "teacher_email_id", "teacher_mobile", "student_incharge_name", "student_incharge_email_id", "student_incharge_mobile"];
				$data = ["correct" => "TRUE", "hash"=> $this->session->userdata("hash"), "pop" => []];
				foreach ($fields as $field) {
					$data["pop"][$field] = $this->session->userdata($field);
				}
				$this->view('register_form_school','', $data);
			} 
		     else{
		     	$data = array(
		     		"registration_code" => $this->session->userdata('hash'),
		     		"school_name" => $this->input->post("school"),
		     		"school_email_id" => $this->input->post("school_email_id"),
		     		"teacher_name" => $this->input->post("teacher"),
		     		"teacher_email_id" => $this->input->post("teacher_email_id"),
		     		"teacher_mobile" => $this->input->post("teacher_mobile"),
		     		"student_incharge_name" => $this->input->post("student"),
		     		"student_incharge_email_id" => $this->input->post("student_email_id"),
		     		"student_incharge_mobile" => $this->input->post("student_mobile")
		     	);
				$this->load->model(['register_model']);
				$this->response = [];
				$this->register_model->register_school($data, $this->session->userdata('hash'));
				$this->session->set_userdata('schooldone', TRUE);
	     		$this->session->set_userdata('school_name', $data["school_name"]);
				redirect("/byte_it/register_form_events");
			}
	}
	public function register_form_events(){
		$this->load->library('session');
		if($this->session->has_userdata('schooldone') AND $this->session->userdata('schooldone')){
			
			$raw_values = $this->request_model->get_events_data($this->session->userdata('hash'));

			$fields = ["c_1", "c_1_email", "c_2", "c_2_email", "c_3", "c_3_email", "c_4","c_4_email", "p_1", "p_1_email", "p_1_hr", "p_2", "p_2_email", "p_2_hr", "m_1", "m_1_email","m_2","m_2_email", "s_1", "s_1_email", "s_2", "s_2_email", "q_1", "q_1_email", "q_2", "q_2_email", "gd_1", "gd_1_email", "gd_2", "gd_2_email","r_1", "r_1_email", "f_1", "f_1_email", "f_2", "f_2_email", "g_1", "g_1_email", "h_1", "h_1_email"];
			 $data = ["pop" => []];

			 foreach ($fields as $field) {
				 $this->session->set_userdata($field, $raw_values[$field]);
				 $data["pop"][$field] = $this->session->userdata($field);
			 }
			 $data["hash"] = $this->session->userdata("hash");
			 $data["school_name"] = $this->session->userdata("school_name");


			$this->view('register_form_events','', $data);
		}
		else{
			redirect("/byte_it/register");
		}

	}
	public function register_events(){
			$this->load->helper(['email', 'form', 'string','date']);
			$this->load->library(['form_validation', 'session']);
			$this->response = [];
			$this->form_validation->set_rules([
				[
					"field" => "hash",
					"label" => "Hash",
					"rules" => [
						"reduce_multiple_spaces",
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "school",
					"label" => "School",
					"rules" => [
						"reduce_multiple_spaces",
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "c_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "c_1_email",
					"label" => "Participant 1 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "c_2",
					"label" => "Participant 2 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "c_2_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "c_3",
					"label" => "Participant 3 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "c_3_email",
					"label" => "Participant 3 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "c_4",
					"label" => "Participant 4 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "c_4_email",
					"label" => "Participant 4 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "p_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "p_1_email",
					"label" => "Participant 1 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "p_1_hr",
					"label" => "Participant 1 Hacker Rank ID",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
								[
					"field" => "p_2",
					"label" => "Participant 2 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "p_2_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "p_2_hr",
					"label" => "Participant 2 Hacker Rank ID",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "m_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "m_1_email",
					"label" => "Participant 1 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "m_2",
					"label" => "Participant 2 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "m_2_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "s_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "s_1_email",
					"label" => "Participant 1 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "s_2",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "s_2_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "q_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "q_1_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "q_2",
					"label" => "Participant 2 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "q_2_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "gd_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "gd_1_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "gd_2",
					"label" => "Participant 2 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "gd_2_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "r_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "r_1_email",
					"label" => "Participant 1 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "f_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "f_1_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
				[
					"field" => "f_2",
					"label" => "Participant 2 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "f_2_email",
					"label" => "Participant 2 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],

				[
					"field" => "g_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "g_1_email",
					"label" => "Participant 1 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],

				[
					"field" => "h_1",
					"label" => "Participant 1 Name",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[3]",
						"max_length[64]",
					],
				],
				[
					"field" => "h_1_email",
					"label" => "Participant 1 Email Id",
					"rules" => [
						"reduce_multiple_spaces",
						
						"min_length[5]",
						"max_length[254]",
						"valid_email",
					],
				],
			]);
			$this->response["form_valid"] = $this->form_validation->run();
			if ($this->response["form_valid"] == FALSE)
			{ 

				$fields = ["c_1", "c_1_email", "c_2", "c_2_email", "c_3", "c_3_email", "c_4","c_4_email", "p_1", "p_1_email", "p_1_hr", "p_2", "p_2_email", "p_2_hr", "m_1", "m_1_email","m_2","m_2_email", "s_1", "s_1_email", "s_2", "s_2_email", "q_1", "q_1_email", "q_2", "q_2_email", "gd_1", "gd_1_email", "gd_2", "gd_2_email","r_1", "r_1_email", "f_1", "f_1_email", "f_2", "f_2_email", "g_1", "g_1_email", "h_1", "h_1_email"];
				$data = ["correct" => "TRUE", "hash"=> $this->session->userdata("hash"), "school_name"=> $this->session->userdata("school_name"), "formerror" => "TRUE", "pop" => []];
				foreach ($fields as $field) {
					$data["pop"][$field] = $this->session->userdata($field);
				}

				$this->view('register_form_events','', $data);
			} 
		     else{
		     	$data = array(
		     		"registration_code" => $this->session->userdata('hash'),
		     		"school_name" => $this->session->userdata("school_name"),
		     		"c_1" => $this->input->post("c_1"),
		     		"c_1_email" => $this->input->post("c_1_email"),
		     		"c_2" => $this->input->post("c_2"),
		     		"c_2_email" => $this->input->post("c_2_email"),
					"c_3" => $this->input->post("c_3"),
		     		"c_3_email" => $this->input->post("c_3_email"),
					"c_4" => $this->input->post("c_4"),
		     		"c_4_email" => $this->input->post("c_4_email"),
		     		"p_1" => $this->input->post("p_1"),
		     		"p_1_email" => $this->input->post("p_1_email"),
		     		"p_1_hr" => $this->input->post("p_1_hr"),
		     		"p_2" => $this->input->post("p_2"),
		     		"p_2_email" => $this->input->post("p_2_email"),
		     		"p_2_hr" => $this->input->post("p_2_hr"),
		     		"m_1" => $this->input->post("m_1"),
		     		"m_1_email" => $this->input->post("m_1_email"),
		     		"m_2" => $this->input->post("m_2"),
		     		"m_2_email" => $this->input->post("m_2_email"),
		     		"s_1" => $this->input->post("s_1"),
		     		"s_1_email" => $this->input->post("s_1_email"),
		     		"s_2" => $this->input->post("s_2"),
		     		"s_2_email" => $this->input->post("s_2_email"),
		     		"q_1" => $this->input->post("q_1"),
		     		"q_1_email" => $this->input->post("q_1_email"),
		     		"q_2" => $this->input->post("q_2"),
		     		"q_2_email" => $this->input->post("q_2_email"),
		     		"gd_1" => $this->input->post("gd_1"),
		     		"gd_1_email" => $this->input->post("gd_1_email"),
		     		"gd_2" => $this->input->post("gd_2"),
		     		"gd_2_email" => $this->input->post("gd_2_email"),
		     		"r_1" => $this->input->post("r_1"),
		     		"r_1_email" => $this->input->post("r_1_email"),
		     		"f_1" => $this->input->post("f_1"),
		     		"f_1_email" => $this->input->post("f_1_email"),
		     		"f_2" => $this->input->post("f_2"),
		     		"f_2_email" => $this->input->post("f_2_email"),
		     		"g_1" => $this->input->post("g_1"),
		     		"g_1_email" => $this->input->post("g_1_email"),
		     		"h_1" => $this->input->post("h_1"),
		     		"h_1_email" => $this->input->post("h_1_email"),
		     		"ip" => $this->input->ip_address(),
					"time" => get_date()
		     	);
				$this->load->model(['register_model']);
				$this->response = [];
				$register_events_done = $this->register_model->register_events($data, $this->session->userdata('hash'));
				echo "chal raha hai";
				if($register_events_done){
					$this->session->set_userdata('eventsdone', TRUE);
					redirect("/byte_it/register_events_success");
				}else{
					$this->session->set_userdata('eventsdone', TRUE);
					redirect("/byte_it/register_events_success");

				}
			}
	}
	public function register_events_success(){
		$this->load->library('session');
		if($this->session->has_userdata('eventsdone') AND $this->session->userdata('eventsdone')){
			$this->session->unset_userdata(['hash', 'eventsdone', 'schooldone', 'correct']);
			$this->view('register_events_success');
		}
		else{
			redirect("/byte_it/register_form_events");
		}
	}

	public function scoreboard() {
		$this->load->helper('url');
		redirect('https://docs.google.com/spreadsheets/d/1wnbWrVkKa1QFknMyGDll04rxH8jtVxzmpVnMsK_ru3A/edit?usp=sharing');
	}
	public function registration_codes($key){
		if($key === "saintrms"){
			$this->load->model(['register_model']);
			$codes = $this -> register_model -> get_registration_codes();
			$str_code = "";
			foreach($codes as $code){
				if( $code != end( $codes ) ){
					$str_code.= $code->registration_code . ",";
				} else{
					$str_code.= $code->registration_code;
				}
			}
			// $this->response($str_code, REST_Controller::HTTP_OK);
			header('Content-Type: text/plain'); 
			header('Response-Code: 200');
			return $this -> output -> set_content_type('text/plain') ->set_status_header(200) ->set_output($str_code);
			
		}
	}
	public function discord(){
		$this->load->helper('url');
		redirect("https://discord.gg/eYEwFtH7qH");
	}
	public function brochure(){
		$this->load->helper('url');
		redirect("public\documents\Byte_IT_Invite_Final.pdf");
	}
	public function build_prelim(){
		$this->load->helper('url');
		redirect("https://docs.google.com/document/d/1veHhQWdBVmz5gGF6vRnW6pqFC8-4L305DCqpRkTiXWc/view");
	}
	public function gd_prelim(){
		$this->load->helper('url');
		redirect("https://docs.google.com/document/d/1AphTq1H1XaACF4z4GnL1Zk-W41SjFC1voUpdtGN5NiU/view");
	}
	public function threeD_prelim(){
		$this->load->helper('url');
		redirect("https://docs.google.com/document/d/1Y86SiBtUbnUzLL0mbsQ59H6dlSxIS7WOKm77LX1NflE/view");
	}
	public function snap_prelim(){
		$this->load->helper('url');
		redirect("https://docs.google.com/document/d/1E_Qs0jMeKY3FZkUESLWqmxpHP4mbZcj7Otf5dnyDb2g/view");
	}
	public function jrdes_prompt(){
		$this->load->helper('url');
		redirect("https://docs.google.com/document/d/1BB7VuU73eUMs5KvUsghtiraeb6ATkiieCIrrNNIAgjY/view");
	}
	public function present_prelim(){
		$this->load->helper('url');
		redirect("https://docs.google.com/document/d/1f-T7XZ9yJdbzP4fQKTG6juzuasuVqTpiVK9Vp_0EgPc/view");
	}
}

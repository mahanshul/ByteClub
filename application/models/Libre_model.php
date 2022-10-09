<?php 
class Libre_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['date']);
		$this->load->library('email');
	}
	public function loginn($userid, $password)
	{
		$query = $this->db->query("SELECT * FROM libre WHERE teamid = \"$userid\"");
		$pas = $query->row_array();
		if($pas['password'] == $password){
			return $pas['id'];
		}else{
			return FALSE;
		}
		// return $query;
	}
	public function taskdata($id)
	{
		$query = $this->db->query("SELECT * FROM libretasks WHERE id = \"$id\"");
		// $raw = 
		return $query->row_array();
	}
	public function submit($task, $id)
	{
		$t = [$task=>"1"];
		$this->db->where(array('id'=>$id));
		$this->db->update("libretasks", $t);
		if($this->db->affected_rows() > 0){
        	return TRUE;
        }else{
        	return FALSE;
        }
	}
	public function get_all_data()
	{
		$query = $this->db->query('SELECT * FROM libretasks');
		return $query->result_array();
	}
	public function get_num_rows()
	{
		$query = $this->db->query('SELECT * FROM libretasks');
		return $query->num_rows();
	}
	public function get_rows(){
        $query = $this->db->query('SELECT * FROM request_invite');
		return $query->result_array();
	}
	public function get_schools(){
		$query = $this->db->query('SELECT school_name FROM schools WHERE attendance = 0');
		// foreach($query->result() as $row ){
  //       //this sets the key to equal the value so that
  //       //the pulldown array lists the same for each
  //       $array[$row->school_name] = $row->school_name;
  //   }
  //   return $array;
		return $query->result_array();
		
	}
	public function confirm_attendance($school){
		// $query = $this->db->query('UPDATE schools SET attendance = 1 WHERE ')
		$attendance = ['attendance'=>"1"];
	$this->db->where(array('school_name' => $school));
        $this->db->update("schools", $attendance);
        if($this->db->affected_rows() > 0){
        	return TRUE;
        }else{
        	return FALSE;
        }
	}
	public function get_school_data($hash){
		$query = $this->db->query("SELECT * FROM schools WHERE registration_code = \"$hash\"");
		return $query->row_array();
	}
	public function get_events_data($hash){
		$query = $this->db->query("SELECT * FROM events WHERE registration_code = \"$hash\"");
		return $query->row_array();
	}
}
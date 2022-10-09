<?php 
class Register_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['date']);
	}
	public function generate_codes($num)
	{
		
				$data = ["registration_code" =>  strtoupper(sprintf( '%04x-%04x-%04x-%04x',
		        mt_rand( 0, 0xffff ), 
		        mt_rand( 0, 0x0C2f ) | 0x4000,
		        mt_rand( 0, 0x3fff ) | 0x8000,
		        mt_rand( 0, 0x2Aff ) ))];
		    
		         $this->db->insert('schools', $data);
			return $data["registration_code"];
		
		
		
	}
	public function get_rows(){
        $query = $this->db->query('SELECT * FROM schools');
		return ($query);
	}
	public function get_events_rows(){
        $query = $this->db->query('SELECT * FROM events');
		return ($query);
	}
	public function get_cre_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,c_1,c_1_email,c_2,c_2_email,c_3,c_3_email,c_4, c_4_email,time,ip FROM events');
		return ($query);
	}
	public function get_prog_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,p_1,p_1_email,p_1_hr,p_2,p_2_email,p_2_hr,time,ip FROM events');
		return ($query);
	}
	public function get_qu_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,q_1,q_1_email,q_2,q_2_email,time,ip FROM events');
		return ($query);
	}
	public function get_gd_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,gd_1,gd_1_email,time,ip FROM events');
		return ($query);
	}
	public function get_tk_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,gd_2,gd_2_email,m_2,m_2_email,time,ip FROM events');
		return ($query);
	}
	public function get_rob_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,r_1,r_1_email,time,ip FROM events');
		return ($query);
	}
	public function get_game_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,g_1,g_1_email,time,ip FROM events');
		return ($query);
	}
	public function get_sur_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,s_1,s_1_email,s_2,s_2_email,time,ip FROM events');
		return ($query);
	}
	public function get_fm_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,f_1,f_1_email,f_2,f_2_email,time,ip FROM events');
		return ($query);
	}
	public function get_hh_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,h_1,h_1_email,time,ip FROM events');
		return ($query);
	}
	public function get_mm_rows(){
        $query = $this->db->query('SELECT registration_code,school_name,m_1,m_1_email,time,ip FROM events');
		return ($query);
	}
	public function filtered(){
        $query = $this->db->query('SELECT id,registration_code,school_name,attendance FROM schools WHERE attendance = 1');
		return ($query);
	}
	public function register_check($hash){
		$query = $this->db->get_where('schools', array('registration_code' => $hash));
		if($query-> num_rows() > 0){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function register_school($data, $hash){
		$this->db->where(array('registration_code' => $hash));
        $this->db->update("schools", $data);
        if($this->db->affected_rows() > 0){
        	return TRUE;
        }else{
        	return FALSE;
        }
	}
	public function register_events($data, $hash){
        $query = $this->db->query("SELECT * FROM events");

        if($query->num_rows() >0){
			$this->db->where(array('registration_code' => $hash));
			$query_new = $this->db->query("SELECT * FROM events WHERE registration_code=" . "\"". $hash ."\"");

			if($query_new->num_rows() > 0){
				$this->db->where(array('registration_code' => $hash));
				$this->db->update("events", $data);
			}else{
				$this->db->insert("events", $data);
			}
        	
        }
        else {
        	$this->db->insert("events", $data);
        }

        return true;
		        
	}
	public function get_registration_codes(){
		$query = $this->db->query("SELECT registration_code FROM schools");
		return($query->result());
	}
}
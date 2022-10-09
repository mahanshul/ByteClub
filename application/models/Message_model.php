<?php

class Message_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper(['date']);
		$this->load->library('email');
	}
	public function store()
	{
		$data = [
			"name" => $this->input->post('name'),
			"email" => $this->input->post('email'),
			"subject" => $this->input->post('subject'),
			"body" => $this->input->post('body'),
			"ip" => $this->input->ip_address(),
			"time" => get_date(),
			"sent" => 0
		];
		$this->db->insert('messages', $data);
		return ($this->db->affected_rows() > 0);
	}
	public function send_unsent_emails()
	{
		$this->db->select('message_id, name, email, subject, body');
		$query = $this->db->get_where('messages', ['sent' => '0']);
		$result = $query->result();
		foreach ($result as $row)
		{
			$this->send_email($row->message_id, $row->name, $row->email, $row->subject, $row->body);
		}
	}
	private function send_email($id, $name, $email, $subject, $body)
	{
		$config["useragent"] = "Byte Club Contact Page";
		$config["protocol"] = "smtp";
		$config["smtp_host"] = "mbox.freehostia.com";
		$config["smtp_user"] = "info@byteclub.me";
		$config["smtp_pass"] = "J59Mrz1Gd@";
		$config["smtp_port"] = "465";
		$config["newline"] = "\r\n";
		$config["crlf"] = "\r\n";
		$config["mailtype"] = "html";

		$this->email->initialize($config);
		$this->email->from($email, $name);
		$this->email->to("byteclub@pp.balbharati.org");
		$this->email->reply_to($email);
		$this->email->subject($subject);

		$data = compact('name', 'email', 'subject', 'body');
		$data["body"] = html_escape($data["body"]);

		$this->email->message($this->load->view('email/message', $data, true));

		if ($this->email->send())
		{
			$this->db->update('messages', ['sent'=>'1'], ['message_id'=>$id]);
		}
	}
}
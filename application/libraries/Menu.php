<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu
{
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper(['url']);		

		$this->items = [];
		$this->links = [];
		$this->current_url_main = "";
	}
	public function generate($file, $level = 1)
	{
		$this->links = parse_ini_file(APPPATH."/views/pages/{$file}.ini");
		for ($i = 1; $i <= $level; $i++)
		{
			if (!empty($this->CI->uri->segment($i)))
			{
				$this->current_url_main .= "/".$this->CI->uri->segment($i);
			}
			else
			{
				break;
			}
		}
		if (empty($this->current_url_main))
		{
			$this->current_url_main = "/";
		}
		foreach ($this->links as $text => $link)
		{
			$item = new Menu_Item($link, $text, $this->current_url_main);
			array_push($this->items, $item);
		}
	}
	public function get_items()
	{
		return $this->items;
	}
}

class Menu_Item
{
	public function __construct($link, $text, $current_url_main)
	{
		$this->class = "";

		$this->link = $link;
		$this->text = $text;
		if ($current_url_main == $this->link)
		{
			$this->class = "current";
		}
	}
}


?>
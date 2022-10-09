<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule
{
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper(['xml']);
	}
	public function load($x)
	{
		return simplexml_load_file(APPPATH . $x);
	}
	public function process($x)
	{
		$y = "";
		foreach ($x->children() as $child)
		{
			$tagname = strtolower($child->getName());
			if ($tagname == "event")
			{
				$y .= "<details class='details'> \n";
				$y .= "<summary class='details__summary'> \n";
				$y .= $child->attributes()["name"];
				if (isset($child->attributes()["type"]))
				{
					$y .= "&nbsp;<span class='info type'>";
					$y .= $child->attributes()["type"];
					$y .= "</span>";
				}
				if (isset($child->attributes()["category"]))
				{
					$y .= "&nbsp;<span class= info category>";
					$y .= $child->attributes()["category"];
					$y .= "</span>";
				}
				$y .= "</summary>\n";
				$y .= "<div class='details__content'>\n";
				$y .= trim($child) . $this->process($child);
				$y .= "</div>\n";
				$y .= "</details> \n";
			}
			else if($tagname == "brief")
			{
				$y .= "<p>";
				$y .= trim($child) . $this->process($child);
				$y .= "</p>";
			}
			else if ($tagname == "list")
			{
				if (isset($child->attributes()["name"]))
				{
					$y .= "<h4>" . $child->attributes()["name"] . "</h4>\n";
				}
				$y .= "<ul>\n";
				$y .= trim($child) . $this->process($child);
				$y .= "</ul>\n";
			}
			else if ($tagname == "r")
			{
				$y .= "<li>";
				$y .= trim($child) . $this->process($child);
				$y .= "</li>\n";
			}
			else if ($tagname == "link")
			{
				$y .= " &nbsp;";
				$y .= "<a href=\"";
				$y .= "";
				if (isset($child->attributes()["url"]))
				{
					$y .= $child->attributes()["url"];
				}
				$y .= "\">";
				$y .= trim($child) . $this->process($child);
				$y .= "</a>";
			}
		}
		return $y;
	}
}

?>
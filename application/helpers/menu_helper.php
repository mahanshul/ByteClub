<?php

defined('BASEPATH') OR exit('No direct script access allowed');


if (! function_exists('menu'))
{
	function menu($file, $level = 1)
	{
		$CI =& get_instance();
		$CI->load->library(['menu']);

		$menu = new $CI->menu();
		$menu->generate($file, $level);
		$items = $menu->get_items();
		$return = "";
		foreach ($items as $item)
		{
			if($item -> text != "Updates"){
				$return .= "<li><a href='{$item->link}' class='{$item->class}'>{$item->text}</a></li>";
			}else{
				$return .= "<li><a href='{$item->link}' class='{$item->class}'>{$item->text}</a></li>";
			}
			
		}
		return $return;
	}
}


?>
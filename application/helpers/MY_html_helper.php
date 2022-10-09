<?php
if ( ! function_exists('link_tag'))
{
	function link_tag($href = '', $vendor = false, $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE)
	{
		$CI =& get_instance();
		$CI->load->library(['asset']);
		$tag = '<link href="';

		$link = $CI->asset->load($href, $vendor);

		$tag .= $link . '" ';
		$tag .= 'rel="'.$rel.'" type="'.$type.'" ';

		if ($media !== '')
		{
			$tag .= 'media="'.$media.'" ';
		}

		if ($title !== '')
		{
			$tag .= 'title="'.$title.'" ';
		}

		$tag .= "/>\n";

		if (!empty($link))
		{
			return $tag;			
		}
	}
}

if (!function_exists('style_link_tag'))
{
	function style_link_tag($name = '', $vendor = false)
	{
		$CI =& get_instance();
		$link = "";
		if (!$vendor)
		{
			$link .= "stylesheets/";
		}
		$link .= $name . ".css";
		return link_tag($link, $vendor);
	}
}

if ( ! function_exists('script_tag'))
{
	function script_tag($src =	 '', $vendor = false, $type = 'text/javascript')
	{
		$CI =& get_instance();
		$CI->load->helper(array('asset'));
		$tag = '<script src="';

		$link = "";

		if (!$vendor)
		{
			$link = 'scripts/';
		}
		$link .= $src . '.js';
		$link = load_asset($link, $vendor);
		$tag .= $link . '" ';
		$tag .= 'type="'.$type.'" ';
		$tag .= "></script>\n";

		if (!empty($link))
		{
			return $tag;			
		}
	}
}
?>
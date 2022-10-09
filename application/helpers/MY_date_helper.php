<?php

if (! function_exists('unix_to_mysql'))
{
	function unix_to_mysql($date)
	{
		return date("Y-m-d H:i:s", $date);
	}
}

if (! function_exists('get_date'))
{
	function get_date()
	{
		return unix_to_mysql(now());
	}

}

if (! function_exists('to_date'))
{
	function to_date($date, $timezone)
	{
		return unix_to_human(gmt_to_local(mysql_to_unix($date), $timezone));		
	}
}

if (! function_exists('to_date_india'))
{
	function to_date_india($date)
	{
		return 	to_date($date, 'UP55');
	}
}

?>
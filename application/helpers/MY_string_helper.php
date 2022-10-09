<?php defined('BASEPATH') OR exit('No direct script access allowed');

function reduce_multiple_spaces($value)
{
	return reduce_multiples($value, " ", true);
}
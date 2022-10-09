<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['byte_it/registration_codes_private/(:any)'] = 'byte_it/registration_codes/$1';

$route['byte_it/brochure'] = 'byte_it/brochure';
$route['byte_it/scoreboard'] = 'byte_it/scoreboard';
$route['byte_it/register_events'] = 'byte_it/register_events';
$route['byte_it/register_form_events'] = 'byte_it/register_form_events';
$route['byte_it/register_events_success'] = 'byte_it/register_events_success';
$route['byte_it/register_school'] = 'byte_it/register_school';
$route['byte_it/register_form_school'] = 'byte_it/register_form_school';
$route['byte_it/generate'] = 'byte_it/generate';
$route['byte_it/logout'] = 'byte_it/logout';
$route['byte_it/portal'] = 'byte_it/portal';
$route['byte_it/confirm_attendance'] = 'byte_it/confirm_attendance';
$route['byte_it/_frozen_importlib_external.FileFinderodict_iteratorzipcode_collections._tuplegetterkeys'] = 'byte_it/ctf';
$route['byte_it/ctf'] = 'byte_it/ctf';
$route['byte_it/admin'] = 'byte_it/admin';
$route['byte_it/register'] = 'byte_it/register';
$route['byte_it/request'] = 'byte_it/request';
$route['byte_it/discord'] = 'byte_it/discord';

$route['byte_it/build_prelim'] = 'byte_it/build_prelim';
$route['byte_it/gd_prelim'] = 'byte_it/gd_prelim';
$route['byte_it/threeD_prelim'] = 'byte_it/threeD_prelim';
$route['byte_it/snap_prelim'] = 'byte_it/snap_prelim';
$route['byte_it/jrdes_prompt'] = 'byte_it/jrdes_prompt';
$route['byte_it/present_prelim'] = 'byte_it/present_prelim';

$route['byte_it/(:any)'] = 'byte_it/view/$1';
$route['byte_it'] = 'byte_it/view/';

$route['libre/portal'] = 'libre/portal';
$route['libre/admin'] = 'libre/admin';
$route['libre/submit'] = 'libre/submit';
$route['libre/login'] = 'libre/login';
$route['libre/home'] = 'libre/home';
$route['libre/(:any)'] = 'libre/view/$1';
$route['libre'] = 'libre/view/';

$route['quick_byte/register'] = 'quick_byte/register';
$route['quick_byte/request'] = 'quick_byte/request';
$route['quick_byte/(:any)'] = 'quick_byte/view/$1';
$route['quick_byte'] = 'quick_byte/view/';

$route['mail/(:any)'] = 'mail/$1';
$route['mail/(:any)/(:any)'] = 'mail/$1/$2';

$route['([A-Za-z0-9_\/]+)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
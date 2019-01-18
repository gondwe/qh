<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['about'] = 'Home/about';
$route['test'] = 'Systems/tests';
$route['test/(:any)'] = 'Systems/tests/$1';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

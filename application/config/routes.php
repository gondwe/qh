<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['about'] = 'home/about';
$route['test'] = 'systems/tests';
$route['test/(:any)'] = 'systems/tests/$1';
// $route['classes'] = 'config/classes';
// $route['institution'] = 'config/institution';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

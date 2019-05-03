<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['categories/create'] = 'Categories/create';
$route['categories/posts/(:any)'] = 'Categories/posts/$1';
$route['categories'] = 'Categories/index';
$route['posts/update'] = 'Posts/update';
$route['posts/create'] = 'Posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'Posts/index';
$route['default_controller'] = 'Pages/view';
$route['(:any)'] = 'Pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

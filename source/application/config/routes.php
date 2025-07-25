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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['news'] = 'news';
$route['news/create'] = 'news/create';
$route['news/edit'] = 'news/edit';
$route['news/delete'] = 'news/delete';
$route['news/(:any)'] = 'news/view/$1';

$route['news/admin/all'] = 'news/admin/all/$1';

$route['news/type/all'] = 'news/type/all/$1';

$route['toys'] = 'toys';
$route['toys/create'] = 'toys/create';
$route['toys/edit/(:any)'] = 'toys/edit/$1';
$route['toys/delete'] = 'toys/delete';
$route['toys/(:any)'] = 'toys/view/$1';


$route['toys/admin/all'] = 'toys/admin/all/$1';

$route['toys/type/all'] = 'toys/type/all/$1';
$route['toys/type/rabbits'] = 'toys/type/rabbits/$1';
$route['toys/type/bears'] = 'toys/type/bears/$1';
$route['toys/type/other'] = 'toys/type/other/$1';

$route['posts'] = 'posts';
$route['posts/create'] = 'posts/create';
$route['posts/edit'] = 'posts/edit';
$route['posts/delete'] = 'posts/delete';
$route['posts/(:any)'] = 'posts/view/$1';

$route['posts/admin/all'] = 'posts/admin/all/$1';

$route['about'] = 'about';
$route['about/page'] = 'about/page';
$route['about/edit/(:any)'] = 'about/edit/$1';

$route['search'] = 'search';
$route['search/(:any)'] = 'search/$1';

$route['contacts'] = 'contacts';
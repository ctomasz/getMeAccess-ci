<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['auth/signin'] = 'AuthController/signin';
$route['auth/signup'] = 'AuthController/signup';
$route['auth/forgotpassword'] = 'welcome/wip';

$route['lists'] = 'ListController';
$route['list/create'] = 'ListController/create';
$route['list/store'] = 'ListController/store';
$route['list/destroy/(:num)'] = 'ListController/destroy/$1';
$route['list/show/(:num)'] = 'ListController/show/$1';
$route['list/request'] = 'welcome/wip';

$route['item/create/(:num)'] = 'ItemController/create/$1';
$route['item/store'] = 'ItemController/store';
$route['item/show/(:num)'] = 'ItemController/show/$1';
$route['item/edit/(:num)'] = 'ItemController/edit/$1';
$route['item/save'] = 'ItemController/save';

$route['command/migrate'] = 'Command/migrate';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
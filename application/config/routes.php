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
$route['default_controller'] = 'Login';
$route['login.htm'] = 'Login/index';
$route['reset.htm'] = "Login/reset_pass";
//$route['home.htm'] = "Login/home_view";
$route['logout.htm'] = "Login/logout";
$route['dash.htm'] = "Dashboard_controller";
$route['students.htm'] = "Dashboard_controller/add_std";
$route['student_details.htm/(:any)'] = "Dashboard_controller/details_std/$1";
$route['student_details.htm'] = "Dashboard_controller/details_std";
$route['student_edit/(:any)'] = "Dashboard_controller/update_student_view/$1";
$route['updated.htm'] ="Dashboard_controller/update_student_data";

$route['classes.htm'] = "Dashboard_controller/add_cls";
$route['by_class.htm'] = "Dashboard_controller/load_std_by_classes";
$route['classes_details_only.htm'] =	"Dashboard_controller/details_only_cls";
$route['classes_edit.htm/(:any)'] = "Dashboard_controller/update_class_view/$1";
$route['update.htm'] ="Dashboard_controller/update_class_data";

$route['classes_grp.htm'] = "Dashboard_controller/add_grp";
$route['classes_details.htm'] = "Dashboard_controller/details_cls";
$route['group_edit/(:any)'] = "Dashboard_controller/update_group_view/$1";
$route['group_update.htm'] = "Dashboard_controller/update_group_data";

//$route['updatec.htm/(:any)']['put'] = "Dashboard_controller/update_class_data/$1";

$route['fees.htm'] = 'Dashboard_controller/add_fees';
$route['fee_taken/(:any)'] = "Dashboard_controller/paying_std_fee_view/$1";
$route['fee_details.htm'] = "Dashboard_controller/load_students_in_fee";
$route['fee_paid.htm'] = "Dashboard_controller/paid_std_fee_data";
$route['std_report.htm'] = "Dashboard_controller/fee_report_student";
$route['fee_report_print/(:any)'] = "Dashboard_controller/fee_report_even_print/$1";
$route['report.htm'] = "Login/generate_report";
$route['get/class'] = "Details/students";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

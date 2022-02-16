<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'userlogincontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Page routes
$route['dashboard'] = 'dashboardcontroller/index';
$route['customerinfo'] = 'customerinfocontroller/index';
$route['payments'] = 'paymentscontroller/index';
$route['requireddocuments'] = 'requireddocumentscontroller/index';

// Userlogin routes
$route['logintypical'] = 'userlogincontroller/logintypical';

// Payment routes
$route['newpayment'] = 'paymentscontroller/newpayment';
$route['savepayment'] = 'paymentscontroller/savepayment';
$route['archivepayment/(:any)'] = 'paymentscontroller/archivepayment/$1';

// School and Program routes
$route['schools'] = 'schoolsprogramscontroller/schools';
$route['programs'] = 'schoolsprogramscontroller/programs';

// Applications routes
$route['applications'] = 'applicationscontroller/index';

// Forms routes
$route['clientform'] = 'formscontroller/clientform';
$route['saveclientform'] = 'formscontroller/saveclientform';
$route['success'] = 'formscontroller/success';
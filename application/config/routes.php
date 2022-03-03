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
$route['newschool'] = 'schoolsprogramscontroller/newschool';
$route['saveschool'] = 'schoolsprogramscontroller/saveschool';
$route['newprogram'] = 'schoolsprogramscontroller/newprogram';
$route['saveprogram'] = 'schoolsprogramscontroller/saveprogram';

// Applications routes
$route['applications'] = 'applicationscontroller/index';
$route['newapplication'] = 'applicationscontroller/newapplication';
$route['getprogramfromschool/(:any)'] = 'applicationscontroller/getprogramfromschool/$1';
$route['saveapplication'] = 'applicationscontroller/saveapplication';

// Forms routes
$route['clientform'] = 'formscontroller/clientform';
$route['saveclientform'] = 'formscontroller/saveclientform';
$route['success'] = 'formscontroller/success';

// Admin maintenance routes
$route['adminmaintenance'] = 'adminmaintenancecontroller/index';
$route['newregion'] = 'adminmaintenancecontroller/newregion';
$route['saveregion'] = 'adminmaintenancecontroller/saveregion';
$route['newofficer'] = 'adminmaintenancecontroller/newofficer';
$route['saveofficer'] = 'adminmaintenancecontroller/saveofficer';
$route['newassignment'] = 'adminmaintenancecontroller/newassignment';
$route['saveassignment'] = 'adminmaintenancecontroller/saveassignment';

// Scholarship routes
$route['scholarships'] = 'scholarshipcontroller/index';
$route['newscholarshipfile'] = 'scholarshipcontroller/newscholarshipfile';
$route['savescholarshipfile'] = 'scholarshipcontroller/savescholarshipfile';
$route['newscholarshipallocation'] = 'scholarshipcontroller/newscholarshipallocation';
$route['savescholarshipallocation'] = 'scholarshipcontroller/savescholarshipallocation';
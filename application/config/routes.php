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
$route['signout'] = 'userlogincontroller/signout';


// Client Information
$route['editclientinfo/(:any)'] = 'customerinfocontroller/editclientinfo/$1';
$route['editclientinfo2/(:any)'] = 'customerinfocontroller/editclientinfo2/$1';

// Payment routes
$route['newpayment/(:any)'] = 'paymentscontroller/newpayment/$1';
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
$route['newapplication/(:any)'] = 'applicationscontroller/newapplication/$1';
$route['getprogramfromschool/(:any)'] = 'applicationscontroller/getprogramfromschool/$1';
$route['saveapplication'] = 'applicationscontroller/saveapplication';

// Forms routes
$route['clientform'] = 'formscontroller/clientform';
$route['saveclientform'] = 'formscontroller/saveclientform';
$route['saveinquiries'] = 'formscontroller/saveinquiries';
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
$route['newscholarshipallocation/(:any)'] = 'scholarshipcontroller/newscholarshipallocation/$1';
$route['savescholarshipallocation'] = 'scholarshipcontroller/savescholarshipallocation';

// Visa routes
$route['newvisaapplication/(:any)'] = 'visacontroller/newvisaapplication/$1';
$route['newvisaeoi/(:any)'] = 'visacontroller/newvisaeoi/$1';
$route['newvisaaccount/(:any)/(:any)'] = 'visacontroller/newvisaaccount/$1/$2';
$route['savevisaapplication'] = 'visacontroller/savevisaapplication';
$route['savevisaeoi'] = 'visacontroller/savevisaeoi';
$route['savevisaaccount'] = 'visacontroller/savevisaaccount';
$route['editvisaapplication/(:any)'] = 'visacontroller/editvisaapplication/$1';
$route['editvisaeoi/(:any)'] = 'visacontroller/editvisaeoi/$1';
$route['editvisaaccount/(:any)/(:any)'] = 'visacontroller/editvisaaccount/$1/$2';
$route['updatevisaapplication'] = 'visacontroller/updatevisaapplication';
$route['updatevisaeoi'] = 'visacontroller/updatevisaeoi';
$route['updatevisaaccount'] = 'visacontroller/updatevisaaccount';

// Reports routes
$route['reports'] = 'reportscontroller/index';
$route['generatereportdefault'] = 'reportscontroller/generatereportdefault';
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
$route['savefirebasefile'] = 'customerinfocontroller/savefirebasefile';
$route['assignofficer'] = 'customerinfocontroller/assignofficer';

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
$route['editschool/(:any)'] = 'schoolsprogramscontroller/editschool/$1';
$route['updateschool'] = 'schoolsprogramscontroller/updateschool';
$route['editprogram/(:any)'] = 'schoolsprogramscontroller/editprogram/$1';
$route['updateprogram'] = 'schoolsprogramscontroller/updateprogram';

// Applications routes
$route['applications'] = 'applicationscontroller/index';
$route['newapplication/(:any)'] = 'applicationscontroller/newapplication/$1';
$route['getprogramfromschool/(:any)'] = 'applicationscontroller/getprogramfromschool/$1';
$route['saveapplication'] = 'applicationscontroller/saveapplication';
$route['editapplication/(:any)'] = 'applicationscontroller/editapplication/$1';
$route['updateapplication'] = 'applicationscontroller/updateapplication';

// Forms routes
$route['clientform'] = 'formscontroller/clientform';
$route['saveclientform'] = 'formscontroller/saveclientform';
$route['do_upload'] = 'formscontroller/do_upload';
$route['success'] = 'formscontroller/success';
$route['programoptionform/(:any)'] = 'formscontroller/programoptionform/$1';

// Admin maintenance routes
$route['adminmaintenance'] = 'adminmaintenancecontroller/index';
$route['newregion'] = 'adminmaintenancecontroller/newregion';
$route['saveregion'] = 'adminmaintenancecontroller/saveregion';
$route['newofficer'] = 'adminmaintenancecontroller/newofficer';
$route['saveofficer'] = 'adminmaintenancecontroller/saveofficer';
$route['newassignment'] = 'adminmaintenancecontroller/newassignment';
$route['saveassignment'] = 'adminmaintenancecontroller/saveassignment';
$route['saveemailcontent'] = 'adminmaintenancecontroller/saveemailcontent';
$route['saveparameters'] = 'adminmaintenancecontroller/saveparameters';
$route['updatepriviledge'] = 'adminmaintenancecontroller/updatepriviledge';
$route['newevent'] = 'eventscontroller/newevent';

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
$route['student_application_report'] = 'reportscontroller/student_application_report';
$route['visa_application_report'] = 'reportscontroller/visa_application_report';
$route['visa_eoi'] = 'reportscontroller/visa_eoi';
$route['visa_account'] = 'reportscontroller/visa_account';

// Inquiries routes
$route['inquiries'] = 'inquiriescontroller/index';
$route['deleteinquiry/(:any)'] = 'inquiriescontroller/deleteinquiry/$1';
$route['transferinquirytoclient/(:any)'] = 'inquiriescontroller/transferinquirytoclient/$1';
$route['getsingleinquiry/(:any)'] = 'inquiriescontroller/getsingleinquiry/$1';

// Program Options routes
$route['newprogramoption/(:any)'] = 'programoptionscontroller/newprogramoption/$1';
$route['saveprogramoptions'] = 'programoptionscontroller/saveprogramoptions';
$route['editprogramoptions/(:any)'] = 'programoptionscontroller/editprogramoption/$1';
$route['updateprogramoptions'] = 'programoptionscontroller/updateprogramoptions';
$route['newprogramoptiondetails/(:any)'] = 'programoptionscontroller/newprogramoptiondetails/$1';
$route['saveprogramoptiondetails'] = 'programoptionscontroller/saveprogramoptiondetails';
$route['editprogramoptiondetails/(:any)'] = 'programoptionscontroller/editprogramoptiondetails/$1';
$route['updateprogramoptiondetails'] = 'programoptionscontroller/updateprogramoptiondetails';

// Required documents routes
$route['adddocuments'] = 'requireddocumentscontroller/adddocuments';
$route['getdocuments/(:any)'] = 'requireddocumentscontroller/getdocuments/$1';
$route['deletedocuments/(:any)'] = 'requireddocumentscontroller/deletedocuments/$1';

// Messages routes
$route['messages'] = 'messagescontroller/index';
$route['getconversation/(:any)'] = 'messagescontroller/getconversation/$1';
$route['updatethreads/(:any)'] = 'messagescontroller/updatethreads/$1';
$route['savefilechat'] = 'messagescontroller/savefilechat';
$route['savetextchat'] = 'messagescontroller/savetextchat';
$route['createthread'] = 'messagescontroller/createthread';
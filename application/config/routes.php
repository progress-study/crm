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
$route['forgotpassword'] = 'userlogincontroller/forgotpassword';
$route['forgotpasswordsend'] = 'userlogincontroller/forgotpasswordsend';

// Client Information
$route['editclientinfo/(:any)'] = 'customerinfocontroller/editclientinfo/$1';
$route['editclientinfo2/(:any)'] = 'customerinfocontroller/editclientinfo2/$1';
$route['savefirebasefile'] = 'customerinfocontroller/savefirebasefile';
$route['assignofficer'] = 'customerinfocontroller/assignofficer';
$route['enterclientinfo/(:any)'] = 'customerinfocontroller/enterclientinfo/$1';
$route['resetphoto/(:any)'] = 'customerinfocontroller/resetphoto/$1';
$route['deactivateclient/(:any)'] = 'customerinfocontroller/deactivateclient/$1';

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
$route['deleteschool/(:any)'] = 'schoolsprogramscontroller/deleteschool/$1';
$route['deleteprogram/(:any)'] = 'schoolsprogramscontroller/deleteprogram/$1';

// Applications routes
$route['applications'] = 'applicationscontroller/index';
$route['newapplication/(:any)'] = 'applicationscontroller/newapplication/$1';
$route['getprogramfromschool/(:any)'] = 'applicationscontroller/getprogramfromschool/$1';
$route['saveapplication'] = 'applicationscontroller/saveapplication';
$route['editapplication/(:any)'] = 'applicationscontroller/editapplication/$1';
$route['updateapplication'] = 'applicationscontroller/updateapplication';
$route['deleteapplication/(:any)'] = 'applicationscontroller/deleteapplication/$1';
$route['deleteapplicationfromcinfo/(:any)/(:any)'] = 'applicationscontroller/deleteapplicationfromcinfo/$1/$2';

// Forms routes
$route['clientform'] = 'formscontroller/clientform';
$route['saveclientform'] = 'formscontroller/saveclientform';
$route['do_upload'] = 'formscontroller/do_upload';
$route['success'] = 'formscontroller/success';
$route['programoptionform/(:any)'] = 'formscontroller/programoptionform/$1';
$route['sendemail'] = 'formscontroller/sendemail';
$route['checkexistingemail/(:any)'] = 'formscontroller/checkexistingemail/$1';

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
$route['editofficer/(:any)'] = 'adminmaintenancecontroller/editofficer/$1';
$route['editregion/(:any)'] = 'adminmaintenancecontroller/editregion/$1';
$route['updateregion'] = 'adminmaintenancecontroller/updateregion';
$route['editassignment/(:any)'] = 'adminmaintenancecontroller/editassignment/$1';
$route['updateassignment'] = 'adminmaintenancecontroller/updateassignment';
$route['editevent/(:any)'] = 'eventscontroller/editevent/$1';
$route['deactivateofficer/(:any)'] = 'adminmaintenancecontroller/deactivateofficer/$1';
$route['deactivateassignment/(:any)'] = 'adminmaintenancecontroller/deactivateassignment/$1';
$route['deleteregion/(:any)'] = 'adminmaintenancecontroller/deleteregion/$1';
$route['deleteevent/(:any)'] = 'adminmaintenancecontroller/deleteevent/$1';

// Scholarship routes
$route['scholarships'] = 'scholarshipcontroller/index';
$route['newscholarshipfile'] = 'scholarshipcontroller/newscholarshipfile';
$route['savescholarshipfile'] = 'scholarshipcontroller/savescholarshipfile';
$route['newscholarshipallocation/(:any)'] = 'scholarshipcontroller/newscholarshipallocation/$1';
$route['savescholarshipallocation'] = 'scholarshipcontroller/savescholarshipallocation';
$route['deactivateschofile/(:any)'] = 'scholarshipcontroller/deactivateschofile/$1';
$route['deactivateschoallo/(:any)'] = 'scholarshipcontroller/deactivateschoallo/$1';
$route['editscholarshipfile/(:any)'] = 'scholarshipcontroller/editscholarshipfile/$1';
$route['updatescholarshipfile'] = 'scholarshipcontroller/updatescholarshipfile';

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
$route['deletevisaapplication/(:any)/(:any)'] = 'visacontroller/deletevisaapplication/$1/$2';
$route['deletevisaeoi/(:any)/(:any)'] = 'visacontroller/deletevisaeoi/$1/$2';
$route['deletevisaaccount/(:any)/(:any)'] = 'visacontroller/deletevisaaccount/$1/$2';

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
$route['transferinquirytoclientfromdashboard/(:any)'] = 'inquiriescontroller/transferinquirytoclientfromdashboard/$1';

// Program Options routes
$route['newprogramoption/(:any)'] = 'programoptionscontroller/newprogramoption/$1';
$route['saveprogramoptions'] = 'programoptionscontroller/saveprogramoptions';
$route['editprogramoptions/(:any)'] = 'programoptionscontroller/editprogramoption/$1';
$route['updateprogramoptions'] = 'programoptionscontroller/updateprogramoptions';
$route['newprogramoptiondetails/(:any)'] = 'programoptionscontroller/newprogramoptiondetails/$1';
$route['saveprogramoptiondetails'] = 'programoptionscontroller/saveprogramoptiondetails';
$route['editprogramoptiondetails/(:any)'] = 'programoptionscontroller/editprogramoptiondetails/$1';
$route['updateprogramoptiondetails'] = 'programoptionscontroller/updateprogramoptiondetails';
$route['acceptpo'] = 'programoptionscontroller/acceptpo';
$route['rejectpo/(:any)'] = 'programoptionscontroller/rejectpo/$1';
$route['posuccess'] = 'programoptionscontroller/posuccess';
$route['saveclientfeedback'] = 'programoptionscontroller/saveclientfeedback';
$route['deletepo/(:any)/(:any)'] = 'programoptionscontroller/deletepo/$1/$2';

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
$route['savetoclientdocuments'] = 'messagescontroller/savetoclientdocuments';

// Client routes
$route['clientlogin'] = 'clientlogincontroller/index';
$route['clientlogintypical'] = 'clientlogincontroller/clientlogintypical';
$route['clientsignout'] = 'clientlogincontroller/clientsignout';
$route['clientforgotpassword'] = 'clientlogincontroller/clientforgotpassword';
$route['clientforgotpasswordsend'] = 'clientlogincontroller/clientforgotpasswordsend';

// Dashboard routes
$route['archivetasklist/(:any)'] = 'dashboardcontroller/archivetasklist/$1';
$route['donetasklist/(:any)'] = 'dashboardcontroller/donetasklist/$1';
$route['markasread'] = 'dashboardcontroller/markasread';

$route['programoptionform2/(:any)'] = 'formscontroller/programoptionform2/$1';
$route['newprogramoptiondetailwithoutdependent/(:any)'] = 'programoptionscontroller/newprogramoptiondetailwithoutdependent/$1';
$route['saveprogramoptiondetailwithoutdependent'] = 'programoptionscontroller/saveprogramoptiondetailwithoutdependent';
$route['deleteprogramoptiondetailwithoutdependent/(:any)/(:any)'] = 'programoptionscontroller/deleteprogramoptiondetailwithoutdependent/$1/$2';
$route['newprogramoptiondetailwithdependent/(:any)'] = 'programoptionscontroller/newprogramoptiondetailwithdependent/$1';
$route['saveprogramoptiondetailwithdependent'] = 'programoptionscontroller/saveprogramoptiondetailwithdependent';
$route['deleteprogramoptiondetailwithdependent/(:any)/(:any)'] = 'programoptionscontroller/deleteprogramoptiondetailwithdependent/$1/$2';
$route['newprogramoptiondetaileipwithoutdependent/(:any)'] = 'programoptionscontroller/newprogramoptiondetaileipwithoutdependent/$1';
$route['saveprogramoptiondetaileipwithoutdependent'] = 'programoptionscontroller/saveprogramoptiondetaileipwithoutdependent';
$route['deleteprogramoptiondetaileipwithoutdependent/(:any)/(:any)'] = 'programoptionscontroller/deleteprogramoptiondetaileipwithoutdependent/$1/$2';
$route['newprogramoptiondetaileipwithdependent/(:any)'] = 'programoptionscontroller/newprogramoptiondetaileipwithdependent/$1';
$route['saveprogramoptiondetaileipwithdependent'] = 'programoptionscontroller/saveprogramoptiondetaileipwithdependent';
$route['deleteprogramoptiondetaileipwithdependent/(:any)/(:any)'] = 'programoptionscontroller/deleteprogramoptiondetaileipwithdependent/$1/$2';
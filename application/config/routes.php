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
$route['default_controller'] = 'welcome';
$route['tournaments'] = 'welcome/tournaments';
$route['profile-page'] = 'welcome/profile_page';
$route['contact-us'] = 'welcome/contact_game';
$route['features'] = 'welcome/features';
$route['contact'] = 'welcome/contact';
$route['login'] = 'welcome/login';
$route['sign_up'] = 'welcome/sign_up';
$route['forgotPassword'] = 'welcome/forgotPassword';
$route['contact-form'] = 'welcome/contact_form';
$route['reset-password/(:any)/(:any)'] = 'welcome/reset_password/$1/$2';
$route['search-tournament'] = 'welcome/search_tournament';
$route['user-profile/(:any)'] = 'welcome/other_user/$1';
$route['deposite-money/(:any)'] = 'welcome/deposite_money/$1';
$route['paypal-amount'] = 'welcome/paypal_amount';
$route['paypal/(:any)'] = 'welcome/paypal/$1';
$route['order-response'] = 'online_wallet/order_response';
$route['online-wallet'] = 'online_wallet/index';
$route['deposite-money'] = 'online_wallet/deposite_money';
$route['switch-currency'] = 'online_wallet/switch_currency';
$route['request-payout'] = 'online_wallet/request_payout';

$route['imgs_upload'] = 'crop/imgs_upload/';

         /* Admin section  */
$route['administrator'] = 'administrator/home/index';
$route['administrator/login_check'] = "administrator/home/sign_in";
$route['administrator/dashboard'] = "administrator/dashboard/dashboard";
$route['administrator/disable/(:any)'] = "administrator/Manage_user/disable/$1";
$route['administrator/disable-tournament/(:any)'] = "administrator/tournament/disable/$1";
$route['administrator/disable-game/(:any)'] = "administrator/game/disable/$1";
$route['administrator/logout'] = "administrator/dashboard/signout";
$route['administrator/users-manage'] = "administrator/manage_user";
$route['administrator/adduser'] = "administrator/Manage_user/add_user";
$route['administrator/payment_detail'] = "administrator/Manage_user/payment_detail";
$route['administrator/viewuser/(:any)'] = "administrator/Manage_user/view_user/$1";
$route['administrator/edit-user/(:any)'] = "administrator/Manage_user/edit_user/$1";
$route['administrator/delete-user/(:any)'] = "administrator/Manage_user/delete_user/$1";


$route['administrator/manage-schedule']   = "administrator/schedule";
$route['administrator/addschedule']     = "administrator/schedule/add_schedule";


$route['administrator/viewschedule/(:any)'] = "administrator/schedule/view_schedule/$1";
$route['administrator/edit-schedule/(:any)'] = "administrator/schedule/edit_schedule/$1";
$route['administrator/delete-schedule/(:any)'] = "administrator/schedule/delete_schedule/$1";

$route['administrator/manage-text']   = "administrator/textitem";
$route['administrator/addtext']     = "administrator/textitem/add_text";
$route['administrator/viewtext/(:any)'] = "administrator/textitem/view_text/$1";
$route['administrator/edit-text/(:any)'] = "administrator/textitem/edit_text/$1";
$route['administrator/delete-text/(:any)'] = "administrator/textitem/delete_text/$1";

$route['administrator/manage-video']   = "administrator/video";
$route['administrator/addvideo']     = "administrator/video/add_video";
$route['administrator/viewvideo/(:any)'] = "administrator/video/view_video/$1";
$route['administrator/edit-video/(:any)'] = "administrator/video/edit_video/$1";
$route['administrator/delete-video/(:any)'] = "administrator/video/delete_video/$1";




$route['administrator/manage-web']   = "administrator/web";
$route['administrator/addweb']     = "administrator/web/add_web";
$route['administrator/viewweb/(:any)'] = "administrator/web/view_web/$1";
$route['administrator/edit-web/(:any)'] = "administrator/web/edit_web/$1";
$route['administrator/delete-web/(:any)'] = "administrator/web/delete_web/$1";


$route['administrator/manage-imageitem']   = "administrator/imageitem";
$route['administrator/addimage']     = "administrator/imageitem/add_image";
$route['administrator/viewimage/(:any)'] = "administrator/imageitem/view_image/$1";
$route['administrator/edit-image/(:any)'] = "administrator/imageitem/edit_image/$1";
$route['administrator/delete-image/(:any)'] = "administrator/imageitem/delete_image/$1";

$route['administrator/manage-cell']   = "administrator/cell";
$route['administrator/addcell']     = "administrator/cell/add_cell";
$route['administrator/viewcell/(:any)'] = "administrator/cell/view_cell/$1";
$route['administrator/edit-cell/(:any)'] = "administrator/cell/edit_cell/$1";
$route['administrator/delete-cell/(:any)'] = "administrator/cell/delete_cell/$1";


 
$route['administrator/manage-section']   = "administrator/section";
$route['administrator/addsection']     = "administrator/section/add_section";
$route['administrator/viewsection/(:any)'] = "administrator/section/view_section/$1";
$route['administrator/edit-section/(:any)'] = "administrator/section/edit_section/$1";
$route['administrator/delete-section/(:any)'] = "administrator/section/delete_section/$1";



$route['administrator/manage-match'] = "administrator/match";
$route['administrator/addmatch'] = "administrator/match/add_match";
$route['administrator/edit-match/(:any)'] = "administrator/match/edit_match/$1";
$route['administrator/view-match/(:any)'] = "administrator/match/view_match/$1";
$route['administrator/disable-match/(:any)'] = "administrator/match/disable_match/$1";
$route['administrator/delete-match/(:any)'] = "administrator/match/delete_match/$1";


$route['administrator/manage-feature'] = "administrator/Feature";
$route['administrator/add-feature'] = "administrator/Feature/add_feature";
$route['administrator/viewfeature/(:any)'] = "administrator/Feature/view_feature/$1";
$route['administrator/edit-feature/(:any)'] = "administrator/Feature/edit_feature/$1";
$route['administrator/delete-feature/(:any)'] = "administrator/Feature/delete_feature/$1";
$route['administrator/disable-feature/(:any)'] = "administrator/Feature/disable/$1";

$route['administrator/manage-prize'] = "administrator/Prize";
$route['administrator/addprize'] = "administrator/Prize/add_prize";
$route['administrator/edit-prize/(:any)'] = "administrator/Prize/edit_prize/$1";
$route['administrator/disable-prize/(:any)'] = "administrator/Prize/disable/$1";
$route['administrator/delete-prize/(:any)'] = "administrator/Prize/delete_prize/$1";

$route['administrator/manage-bracket'] = "administrator/manage_bracket/index";

$route['administrator/manage-participation'] = "administrator/participations";
$route['administrator/addbracket'] = "administrator/manage_bracket/addbracket";
$route['administrator/edit_bracket/(:any)'] = "administrator/manage_bracket/edit_bracket/$1";
$route['administrator/viewbracket/(:any)'] = "administrator/manage_bracket/view_bracket/$1";
$route['administrator/deletebracket/(:any)'] = "administrator/manage_bracket/delete_bracket/$1";

//$route['administrator/manage-prize-Poll'] = "administrator/prize_poll"; 

$route['administrator/tournament_rules'] = 'administrator/tournament_rules/index';
$route['administrator/addrule'] = 'administrator/tournament_rules/addrule';
$route['administrator/editrule/(:any)'] = 'administrator/tournament_rules/editrule/$1';
$route['administrator/viewrule/(:any)'] = 'administrator/tournament_rules/viewrule/$1';
$route['administrator/deleterule/(:any)'] = 'administrator/tournament_rules/deleterule/$1';
$route['administrator/participant-chat'] = "administrator/Participations/participant_chat";


$route['administrator/manage-game'] = "administrator/game";
$route['administrator/addgame'] = "administrator/game/add_game";
$route['administrator/edit-game/(:any)'] = "administrator/game/edit_game/$1";
$route['administrator/viewgame/(:any)'] = "administrator/game/view_game/$1";
$route['administrator/delete-game/(:any)'] = "administrator/game/delete_game/$1";




$route['administrator/manage-audio']                = "administrator/audio";
$route['administrator/addAudio']                    = "administrator/audio/add_audio";
$route['administrator/edit-audio/(:any)']           = "administrator/audio/edit_audio/$1";

$route['administrator/viewAudio/(:any)']            = "administrator/audio/view_audio/$1";
$route['administrator/delete-audio/(:any)']         = "administrator/audio/delete_audio/$1";


$route['administrator/manage-user-sound']                = "administrator/User_sound";
$route['administrator/addUserAudio']                         = "administrator/User_sound/add_audio";
$route['administrator/delete-user-audio/(:any)']                = "administrator/User_sound/delete_audio/$1";



$route['administrator/manage-version']                       = "administrator/version";
$route['administrator/addVersion']                           = "administrator/version/add_version";

$route['administrator/edit-version/(:any)']              = "administrator/version/edit_version/$1";
$route['administrator/delete-version/(:any)']             = "administrator/version/delete_version/$1";

//$route['administrator/delete-user-audio/(:any)']             = "administrator/User_sound/delete_audio/$1";



$route['administrator/manage-user-schedule']                       = "administrator/User_schedule";
$route['administrator/addUserSchedule']                            = "administrator/User_schedule/add_schedule";

$route['administrator/delete-user-schedule/(:any)']                = "administrator/User_schedule/delete_schedule/$1";



$route['webservices/sound-display'] = "webservices/sound_display";

$route['webservices/apk-update']    = "webservices/apk_update";

$route['webservices/time-refresh']    = "webservices/time_refresh";



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//  webservice

$route['webservices/poll-service'] = "webservices/poll_service";

$route['webservices/poll-service2'] = "webservices/poll_service2";

$route['webservices/reg_key'] = "webservices/reg_key";






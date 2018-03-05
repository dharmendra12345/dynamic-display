<?php
/** 
 * Sandbox / Test Mode
 * -------------------------
 * TRUE means you'll be hitting PayPal's sandbox/test servers.  FALSE means you'll be hitting the live servers.
 */
//$config['Sandbox'] = FALSE; 
$config['Sandbox'] = TRUE;
/* 
 * PayPal API Version
 * ------------------
 * The library is currently using PayPal API version 98.0.  
 * You may adjust this value here and then pass it into the PayPal object when you create it within your scripts to override if necessary.
 */
$config['APIVersion'] = '98.0';

/*
 * PayPal Gateway API Credentials
 * ------------------------------
 * These are your PayPal API credentials for working with the PayPal gateway directly.
 * These are used any time you're using the parent PayPal class within the library.
 * 
 * We're using shorthand if/else statements here to set both Sandbox and Production values.
 * Your sandbox values go on the left and your live values go on the right.
 * 
 * You may obtain these credentials by logging into the following with your PayPal account: https://www.paypal.com/us/cgi-bin/webscr?cmd=_login-api-run
 */

/*$api_username = $sandbox ? 'SANDBOX_USERNAME_GOES_HERE' : 'LIVE_USERNAME_GOES_HERE';
$api_password = $sandbox ? 'SANDBOX_PASSWORD_GOES_HERE' : 'LIVE_PASSWORD_GOES_HERE';
$api_signature = $sandbox ? 'SANDBOX_SIGNATURE_GOES_HERE' : 'LIVE_SIGNATURE_GOES_HERE';
*/
$config['ENDPoint'] =  $config['Sandbox'] ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
$config['APIUsername'] = $config['Sandbox']? 'sandbo_1215254764_biz_api1.angelleye.com' : 'PRODUCTION_USERNAME_GOES_HERE';
$config['APIPassword'] = $config['Sandbox'] ? '1215254774' : 'PRODUCTION_PASSWORD_GOES_HERE';
$config['APISignature'] = $config['Sandbox']  ? 'AiKZhEEPLJjSIccz.2M.tbyW5YFwAb6E3l6my.pY9br1z2qxKx96W18v' : 'PRODUCTION_SIGNATURE_GOES_HERE';

$config['CancelURL'] = 'http://votivephp.in/e_sport/order-response';

$config['ReturnURL'] = 'http://votivephp.in/e_sport/order-response';
$config['CanceltournamentURL'] = 'http://votivephp.in/e_sport/online_wallet/join_tournament_order';

$config['ReturntournamentURL'] = 'http://votivephp.in/e_sport/online_wallet/join_tournament_order';
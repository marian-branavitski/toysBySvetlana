<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| DX Auth Config
| -------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Website details
|--------------------------------------------------------------------------
|
| These details are used in email sent by DX Auth library.
|
*/

$config['DX_website_name'] = 'toysbysvetlana.com:80';
$config['DX_webmaster_email'] = 'webmaster@yourhost.com';

/*
|--------------------------------------------------------------------------
| Database table
|--------------------------------------------------------------------------
|
| Determines table that used by DX Auth.
|
| 'DX_table_prefix' allows you to specify table prefix that will be use by the rest of the table. 
|
| For example specifying 'DX_' in 'DX_table_prefix' and 'users' in 'DX_users_table',
| will make DX Auth user 'DX_users' as users table.
|
*/

$config['DX_table_prefix'] = '';
$config['DX_users_table'] = 'users';
$config['DX_user_profile_table'] = 'user_profile';
$config['DX_user_temp_table'] = 'user_temp';
$config['DX_user_autologin'] = 'user_autologin';
$config['DX_roles_table'] = 'roles';
$config['DX_permissions_table'] = 'permissions';
$config['DX_login_attempts_table'] = 'login_attempts';

/*
|--------------------------------------------------------------------------
| Password salt
|--------------------------------------------------------------------------
|
| You can add major salt to be hashed with password. 
| For example, you can get salt from here: https://www.grc.com/passwords.htm
|
| Note: 
|
| Keep in mind that if you change the salt value after user registered, 
| user that previously registered cannot login anymore.
|
*/

$config['DX_salt'] = '';

/*
|--------------------------------------------------------------------------
| Registration related settings
|--------------------------------------------------------------------------
|
| 'DX_email_activation' = Requires user to activate their account using email after registration.
| 'DX_email_activation_expire' = Time before users who don't activate their account getting deleted from database. Default is 48 Hours (60*60*24*2).
| 'DX_email_account_details' =  Email account details after registration, only if 'DX_email_activation' is FALSE.
|
*/
 
$config['DX_email_activation'] = TRUE; 
$config['DX_email_activation_expire'] = 60*60*24*2; 
$config['DX_email_account_details'] = TRUE; 

/*
|--------------------------------------------------------------------------
| Login settings
|--------------------------------------------------------------------------
|
| 'DX_login_using_username' = Determine if user can use username in username field to login.
| 'DX_login_using_email' = Determine if user can use email in username field to login.
|
| You have to set at least one of settings above to TRUE. 
|
| 'DX_login_record_ip' = Determine if user IP address should be recorded in database when user login.
| 'DX_login_record_time' = Determine if time should be recorded in database when user login.
|
*/

$config['DX_login_using_username'] = TRUE;
$config['DX_login_using_email'] = TRUE;
$config['DX_login_record_ip'] = TRUE;
$config['DX_login_record_time'] = TRUE;

/*
|--------------------------------------------------------------------------
| Auto login settings
|--------------------------------------------------------------------------
|
| 'DX_autologin_cookie_name' = Determine auto login cookie name.
| 'DX_autologin_cookie_life' = Determine auto login cookie life before expired. Default is 2 months (60*60*24*31*2).
|
*/

$config['DX_autologin_cookie_name'] = 'autologin';
$config['DX_autologin_cookie_life'] = 60*60*24*31*2;

/*
|--------------------------------------------------------------------------
| Login attempts
|--------------------------------------------------------------------------
|
| 'DX_count_login_attempts' = Determine if DX Auth should count login attempt when user failed to login.
| 'DX_max_login_attempts' =  Determine max login attempt before function is_login_attempt_exceeded() returning TRUE.
|
*/

$config['DX_count_login_attempts'] = TRUE;
$config['DX_max_login_attempts'] = 3; 

/*
|--------------------------------------------------------------------------
| Forgot password settings
|--------------------------------------------------------------------------
|
| 'DX_forgot_password_expire' = Time before forgot password key become invalid. Default is 15 minutes (900 seconds).
|
*/

$config['DX_forgot_password_expire'] = 900;



/*
|--------------------------------------------------------------------------
| reCAPTCHA
|--------------------------------------------------------------------------
|
| If you are planning to use reCAPTCHA function, you have to set reCAPTCHA key here
| You can get the key by registering at http://recaptcha.net
|
*/

$config['DX_recaptcha_public_key'] = '5BSNO9IWHDBCOMAAHcRoGVQp1ZG56RDNdnwH3MyuBqU'; 
$config['DX_recaptcha_private_key'] = '5BSDDLNO9WHDBCOMZDA3MeF9o2YIlAovWwvi2T-qArz0DE';


/*
|--------------------------------------------------------------------------
| URI
|--------------------------------------------------------------------------
|
| Determines URI that used for redirecting in DX Auth library.
| 'DX_deny_uri' = Forbidden access URI.
| 'DX_login_uri' = Login form URI.
| 'DX_activate_uri' = Activate user URI.
| 'DX_reset_password_uri' = Reset user password URI.
|
| These value can be accessed from DX Auth library variable, by removing 'DX_' string.
| For example you can access 'DX_deny_uri' by using $this->dx_auth->deny_uri in controller.
|
*/

$config['DX_deny_uri'] = '/auth/deny/';
$config['DX_login_uri'] = '/auth/login/';
$config['DX_banned_uri'] = '/auth/banned/';
$config['DX_activate_uri'] = '/auth/activate/';
$config['DX_reset_password_uri'] = '/auth/reset_password/';


/*
|--------------------------------------------------------------------------
| Helper configuration
|--------------------------------------------------------------------------
|
| Configuration below is actually not used in function in DX_Auth library.
|	They just used to help you coding more easily in controller.
|	You can set it to blank if you don't need it, or even delete it.
|
| However they can be accessed from DX Auth library variable, by removing 'DX_' string.
| For example you can access 'DX_register_uri' by using $this->dx_auth->register_uri in controller.
|
*/

// Registration
$config['DX_allow_registration'] = TRUE; 
$config['DX_captcha_registration'] = FALSE;

// Login
$config['DX_captcha_login'] = FALSE;

// URI Locations
$config['DX_logout_uri'] = '/Auth/logout/';
$config['DX_register_uri'] = '/Auth/register/';
$config['DX_forgot_password_uri'] = '/Auth/forgot_password/';
$config['DX_change_password_uri'] = '/Auth/change_password/';
$config['DX_cancel_account_uri'] = '/Auth/cancel_account/';

// Forms view
$config['DX_login_view'] = 'Auth/login_form';
$config['DX_register_view'] = 'Auth/register_form';
$config['DX_forgot_password_view'] = 'Auth/forgot_password_form';
$config['DX_change_password_view'] = 'Auth/change_password_form';
$config['DX_cancel_account_view'] = 'Auth/cancel_account_form';

// Pages view
$config['DX_deny_view'] = 'Auth/general_message';
$config['DX_banned_view'] = 'Auth/general_message';
$config['DX_logged_in_view'] = 'Auth/general_message';
$config['DX_logout_view'] = 'Auth/general_message';

$config['DX_register_success_view'] = 'Auth/general_message';
$config['DX_activate_success_view'] = 'Auth/general_message';
$config['DX_forgot_password_success_view'] = 'Auth/general_message';
$config['DX_reset_password_success_view'] = 'Auth/general_message';
$config['DX_change_password_success_view'] = 'Auth/general_message';

$config['DX_register_disabled_view'] = 'Auth/general_message';
$config['DX_activate_failed_view'] = 'Auth/general_message';
$config['DX_reset_password_failed_view'] = 'Auth/general_message';

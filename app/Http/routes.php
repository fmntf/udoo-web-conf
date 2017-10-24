<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$app->get('/', function () use ($app) {
//    return $app->make('view')->make('home');
//});

$app->get('/', [
    'as' => 'index', 'uses' => 'IndexController@index'
]);

$app->get('/dashboard', [
    'as' => 'dashboard', 'uses' => 'IndexController@dashboard'
]);

$app->get('/login', [
    'as' => 'login', 'uses' => 'LoginController@index'
]);

$app->post('/login', [
    'as' => 'login', 'uses' => 'LoginController@login'
]);

$app->get('/logout', [
    'as' => 'logout', 'uses' => 'LoginController@logout'
]);

$app->get('/terminal', [
    'as' => 'terminal', 'uses' => 'TerminalController@index'
]);


/* ARDUINO */

$app->get('/arduino/samples', [
    'as' => 'arduino-samples', 'uses' => 'ArduinoController@samples'
]);

$app->get('/arduino/webide', [
    'as' => 'arduino-webide', 'uses' => 'ArduinoController@webide'
]);

$app->get('/arduino/appinventor', [
    'as' => 'arduino-appinventor', 'uses' => 'ArduinoController@appinventor'
]);

$app->get('/arduino/ardublockly', [
    'as' => 'arduino-ardublockly', 'uses' => 'ArduinoController@ardublockly'
]);

$app->post('/arduino/ardublocklycompile', [
    'as' => 'arduino-ardublocklycompile', 'uses' => 'ArduinoController@ardublocklycompile'
]);

$app->get('/arduino/uploadsketch/{sketch:[A-Za-z]+}', [
    'as' => 'arduino-upload', 'uses' => 'ArduinoController@uploadsketch'
]);

$app->post('/arduino/compilesketch', [
    'as' => 'arduino-compilesketch', 'uses' => 'ArduinoController@compilesketch'
]);


/* SETTINGS */


$app->get('/settings/base', [
    'as' => 'settings-base', 'uses' => 'SettingsController@base'
]);

$app->post('/settings/change-password', [
    'as' => 'settings-changepassword', 'uses' => 'SettingsController@changepassword'
]);

$app->post('/settings/set-hostname', [
    'as' => 'settings-sethostname', 'uses' => 'SettingsController@sethostname'
]);

$app->get('/settings/network', [
    'as' => 'settings-network', 'uses' => 'SettingsController@network'
]);

$app->get('/settings/wifi-networks', [
    'as' => 'settings-wifinetworks', 'uses' => 'SettingsController@wifinetworks'
]);

$app->post('/settings/wifi-connect', [
    'as' => 'settings-wificonnect', 'uses' => 'SettingsController@wificonnect'
]);

$app->get('/settings/regional', [
    'as' => 'settings-regional', 'uses' => 'SettingsController@regional'
]);

$app->get('/settings/regional-languages/{lang:[A-Za-z]+}', [
    'as' => 'settings-regionallanguages', 'uses' => 'SettingsController@regionallanguages'
]);

$app->post('/settings/regional-update', [
    'as' => 'settings-regionalupdate', 'uses' => 'SettingsController@regionalupdate'
]);

$app->get('/settings/advanced', [
    'as' => 'settings-advanced', 'uses' => 'SettingsController@advanced'
]);

$app->post('/settings/set-video', [
    'as' => 'settings-setvideo', 'uses' => 'SettingsController@setvideo'
]);

$app->post('/settings/set-m4', [
    'as' => 'settings-setm4', 'uses' => 'SettingsController@setm4'
]);

$app->post('/settings/set-http-port', [
    'as' => 'settings-sethttpport', 'uses' => 'SettingsController@sethttpport'
]);


/* IOT */
$app->get('/iot/register', [
    'as' => 'iot-register', 'uses' => 'IotController@register'
]);


/* POWER */
$app->get('/power/reboot', [
    'as' => 'power-reboot', 'uses' => 'PowerController@reboot'
]);

$app->get('/power/reboot-action', [
    'as' => 'power-reboot-action', 'uses' => 'PowerController@rebootaction'
]);

$app->get('/power/poweroff', [
    'as' => 'power-poweroff', 'uses' => 'PowerController@poweroff'
]);

$app->get('/power/poweroff-action', [
    'as' => 'power-poweroff-action', 'uses' => 'PowerController@poweroffaction'
]);


/* UPDATES */
$app->get('/updates/check', [
    'as' => 'updates-check', 'uses' => 'UpdatesController@check'
]);

$app->get('/settings/advanced-install', [
    'as' => 'updates-install', 'uses' => 'UpdatesController@install'
]);

/* SERVICES */

$app->get('/services/websocket', [
    'as' => 'services-websocket', 'uses' => 'ServicesController@websocket'
]);

$app->get('/services/terminal', [
    'as' => 'services-terminal', 'uses' => 'ServicesController@terminal'
]);

$app->get('/services/updates', [
    'as' => 'services-updates', 'uses' => 'ServicesController@updates'
]);

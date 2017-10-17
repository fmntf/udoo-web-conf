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

$app->get('/login', [
    'as' => 'login', 'uses' => 'LoginController@index'
]);

$app->post('/login', [
    'as' => 'login', 'uses' => 'LoginController@login'
]);

$app->get('/logout', [
    'as' => 'logout', 'uses' => 'LoginController@logout'
]);

$app->get('/arduino/samples', [
    'as' => 'arduino-samples', 'uses' => 'ArduinoController@samples'
]);

$app->get('/arduino/webide', [
    'as' => 'arduino-webide', 'uses' => 'ArduinoController@webide'
]);

$app->get('/arduino/appinventor', [
    'as' => 'arduino-appinventor', 'uses' => 'ArduinoController@appinventor'
]);

$app->get('/arduino/uploadsketch/{sketch:[A-Za-z]+}', [
    'as' => 'arduino-upload', 'uses' => 'ArduinoController@uploadsketch'
]);

$app->post('/arduino/compilesketch', [
    'as' => 'arduino-compilesketch', 'uses' => 'ArduinoController@compilesketch'
]);

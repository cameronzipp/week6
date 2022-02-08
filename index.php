<?php
//turn on output buffering
ob_start();
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//start session
session_start();
var_dump($_SESSION);

//require autoload file
require_once('vendor/autoload.php');

//create instance of the base class
$f3 = Base::instance();

//define default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/info.html');
});

//Define route for the summary
$f3->route('GET /summary', function() {
    $view = new Template();
    echo $view->render('views/summary.html');

    //clear session data
    session_destroy();
});

//run fat-free
$f3->run();

//send output to the browser
ob_flush();
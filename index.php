<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');

//create instance of the base class
$f3 = Base::instance();

//define default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/info.html');
});

//run fat-free
$f3->run();
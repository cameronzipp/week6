<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require autoload file
require_once('vendor/autoload.php');
require('model/data-layer.php');

//create instance of the base class
$f3 = Base::instance();

//define default route
$f3->route('GET /', function($f3) {

    //Save data to the hive
    $f3->set('username', 'jshmo');
    $f3->set('password', sha1('Password01'));
    $f3->set('title', 'Working with Templates');
    $f3->set('color', 'Black');

    $fruits = array('apple', 'banana', 'orange');
    $f3->set('fruits', $fruits);

    $f3->set('desserts', getDesserts());

    $f3->set('colors', getColors());


    $view = new Template();
    echo $view->render('views/info.html');
});

//run fat-free
$f3->run();
<?php
//Turn on error reporting -- this is critical
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require("vendor/autoload.php");
require_once "model/validation-functions.php";

//Instantiate fat free
$f3 = Base::instance();

session_start();
//Define default route

//instanciate new controller
$controller = new PetController($f3);
$f3->set('colors', array('pink', 'green', 'blue'));

$f3->route('GET /', function () {
    global $controller;
    $controller->home();
});

//Define default route
$f3->route('GET|POST /order', function ($f3) {
    global $controller;
    $controller->order();
});

//Define default route
$f3->route('POST|GET /order2', function ($f3) {
    global $controller;
    $controller->order2();
    /*echo "<h1>My Pets</h1>";*/
    //echo "<a href='order'>Order a Pet</a>";
});

$f3->route('GET|POST /results', function ($f3) {
    global $controller;
    $controller->result();
});


$f3->route('GET /@item', function ($f3, $params) {
    $item = $params['item'];
    echo "<p>Your animal is $item</p>";

    if ($item == "dog") {
        echo "<p>bark</p>";
    } else if ($item == "cat") {
        echo "<p>Meow</p>";
    } else if ($item == "cow") {
        echo "<p>Moo</p>";
    } else if ($item == "goat") {
        echo "<p>bleet</p>";
    } else if ($item == "pig") {
        echo "<p>oink</p>";
    } else {
        $f3->error(404);
    }
});


//Run fat free
$f3->run();

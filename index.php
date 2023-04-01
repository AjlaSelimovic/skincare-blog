<?php
require 'flight/Flight.php';
require "../vendor/autoload.php";

//Method routing
Flight::route('GET/', function(){
    echo 'I recieved a GET request';
});

Flight::route('POST/', function(){
    echo 'I recieved a POST request!';
});

// Mapping  method
Flight::map('hello', function($name){
  echo "hello $name!";
});

// Calling custom method
Flight::hello('Ajla');

//Named parameters
Flight::route('/@name/@id', function($name, $id){
  echo "hello, $name ($id)!";
});

// Registering class
Flight::register('user', 'User');

// Get an instance of your class
$user = Flight::user();

//Overriding
Flight::map('notFound', function(){
  // Display custom 404 page
  include 'errors/404.html';
});

// Saveing variable
Flight::set('id', 123);

// Elsewhere in your application
$id = Flight::get('id');

//Redirect current request
Flight::redirect('/new/location');

//Requests
$request = Flight::request();

//To access the query,data
$id = Flight::request()->query->id;

//JSON input
Flight::json(array('id' => 123));


Flight::start();
?>
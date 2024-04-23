<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require dirname(__FILE__).'/../vendor/autoload.php';
require dirname(__FILE__).'/dao/UserDao.class.php';
require dirname(__FILE__).'/dao/ProductDao.class.php';
require dirname(__FILE__).'/dao/ReviewDao.class.php';

require dirname(__FILE__).'/services/UserService.php';
require dirname(__FILE__).'/services/ProductService.php';
require dirname(__FILE__).'/services/ReviewService.php';

Flight::map('query', function($name, $default_value = NULL){
  $request = Flight::request();
  $query_param = @$request->query->getData()[$courseName];
  $query_param = $query_param ? $query_param : $default_value;
  return $query_param;
});

/* Register Business Logic layer services */
Flight::register('userService', 'UserService');
Flight::register('productService', 'ProductService');
Flight::register('reviewService', 'ReviewService');

/* Include all routes */
require_once dirname(__FILE__)."/routes/UserRoutes.php";
require_once dirname(__FILE__)."/routes/ProductRoutes.php";
require_once dirname(__FILE__)."/routes/ReviewRoutes.php";


Flight::start();
?>
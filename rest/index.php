<?php
require "../vendor/autoload.php";
require "services/UsersService.php";
require "services/PostsService.php";

Flight::register('users_service', "UsersService");
Flight::register('posts_service', "PostsService");

require_once 'routes/UsersRoutes.php';
require_once 'routes/PostsRoutes.php';

Flight::start();
?>
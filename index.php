<?php

declare(strict_types=1);

use App\Controllers\UserController;
use App\Models\User;

require "vendor/autoload.php";

$router = new App\Router\Router();

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$router->add("/", function () {
  echo "Welcome to the home page!";
});

$router->add("/user", function () {
  echo "Get user";
});

$router->add("/user/create", function () {
  $user = new User("John", "john@example.com", "123", "Jonh123", date('c'));

  $user_controller = new UserController($user);
  //$user_controller->getUser($user);
});

$router->add("/getuser/{id}", function ($id) {
  echo "get user with id: {$id}";
});

$router->add("/product", function () {
  echo "Get product";
});

$router->dispatch($path);

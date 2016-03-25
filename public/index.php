<?php

  include( __DIR__ . "/../bootstrap/start.php");
  Dotenv::load( __DIR__ . "/../");
  include( __DIR__ . "/../bootstrap/db.php");
  include( __DIR__ . "/../routes.php");

  // $router->map('GET', '/', function() {
  //   include( __DIR__ . '/../views/home.php');
  // });
  //
  // $router->map('GET', '/register', function() {
  //   include( __DIR__ . '/../views/register.php');
  // });
  //
  // $router->map('GET', '/login', function() {
  //   include( __DIR__ . '/../views/login.php');
  // });
  //
  // $match = $router->match();
  //
  // if ($match && is_callable($match['target'])) {
  //   call_user_func_array($match['target'], $match['params']);
  // } else {
  //   // No matching route found
  //   header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
  // }

  $match = $router->match();

  list($controller, $method) = explode("@", $match['target']);

  if (is_callable(array($controller, $method))) {
    $object = new $controller();
    call_user_func_array(array($object, $method), array($match['params']));
  } else {
    echo "Cannot find $controller->$method";
    exit();
  }

<?php

  require( __DIR__ . "/../vendor/autoload.php");
  echo __DIR__ . "<br>";

  $whoops = new \Whoops\Run;
  $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
  $whoops->register();

  $okay = true;

  $first_name = "";
  $last_name = "";
  $username = "";
  $verify_username = "";
  $password = "";
  $verify_password = "";

  $first_name = $_REQUEST['first_name'];
  $last_name = $_REQUEST['last_name'];
  $username = $_REQUEST['username'];
  $verify_username = $_REQUEST['verify_username'];
  $password = $_REQUEST['password'];
  $verify_password = $_REQUEST['verify_password'];

  // $whatever = $_REQUEST['whatever'];

  if ( ($first_name == "") || ($last_name == "") || ($username == "")
  || ($verify_username == "") || ($password == "") || ($verify_password == "") )  {
    $okay = false;
  }

  if (strlen($first_name) < 3 ) {
    $okay = false;
  }

  if (strlen($last_name) < 3 ) {
    $okay = false;
  }

  if ($username != $verify_username) {
    $okay = false;
  }

  if ($password != $verify_password) {
    $okay = false;
  }

  if (!$okay) {
    $msg = "You missed some form data. Please re-enter and try again.";
    $_SESSION['msg'] = $msg;
    header("Location: /modphp/register.php");
    exit();
  }

  // write all values to scree
  echo "First name: " . $first_name . "<br>";
  echo "Last name: " . $last_name . "<br>";
  echo "Username: " . $username . "<br>";
  echo "Verify username: " . $verify_username . "<br>";
  echo "Password: " . $password . "<br>";
  echo "Verify password: " . $verify_password . "<br>";

  echo "<br><br>";

  foreach ($_REQUEST as $name => $value) {
    echo $name . " = " . $value . "<br>";
  }

<?php

// Registration Routes
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');

// login/logout Routes
$router->map('GET', '/login', 'Acme\Controllers\AuthenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\Controllers\AuthenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\Controllers\AuthenticationController@getLogOut', 'logout');
$router->map('GET', '/testuser', 'Acme\Controllers\AuthenticationController@getTestUser', 'testuser');

// Page Routes
$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/page-not-found', 'Acme\Controllers\PageController@getShow404', '404' );
$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'generic_page' );

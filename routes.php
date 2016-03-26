<?php

$router->map('GET', '/', 'Acme\Controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/register', 'Acme\Controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\Controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/login', 'Acme\Controllers\RegisterController@getShowLoginPage', 'login');
$router->map('GET', '/[*]', 'Acme\Controllers\PageController@getShowPage', 'generic_page' );
// $router->map('GET', '/test', function() {
//     $testimonials = Acme\models\User::find(2)->testimonials()->get();
//     // $testimonials = $user->testimonials()->get();
//     dd($testimonials);
// });

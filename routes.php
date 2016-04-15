<?php

// Registration Routes
$router->map('GET', '/register', 'Acme\controllers\RegisterController@getShowRegisterPage', 'register');
$router->map('POST', '/register', 'Acme\controllers\RegisterController@postShowRegisterPage', 'register_post');
$router->map('GET', '/verify-account', 'Acme\controllers\RegisterController@getVerifyAccount', 'verify_account');

// Testimonial Routes
$router->map('GET', '/testimonials', 'Acme\controllers\TestimonialController@getShowTestimonials', 'testimonials');

// -- Logged in user routes
if (Acme\Auth\LoggedIn::user()) {
    $router->map('GET', '/add-testimonial', 'Acme\controllers\TestimonialController@getShowAdd', 'add_testimonial');
    $router->map('POST', '/add-testimonial', 'Acme\controllers\TestimonialController@postShowAdd', 'add_testimonial_post');
}

// login/logout Routes
$router->map('GET', '/login', 'Acme\controllers\AuthenticationController@getShowLoginPage', 'login');
$router->map('POST', '/login', 'Acme\controllers\AuthenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'Acme\controllers\AuthenticationController@getLogOut', 'logout');

// admin routes
if ((Acme\Auth\LoggedIn::user()) && (Acme\Auth\LoggedIn::user()->access_level == 2)) {
    $router->map('POST', '/admin/page/edit', 'Acme\controllers\AdminController@postSavePage', 'save_page');
    $router->map('GET', '/admin/page/add', 'Acme\controllers\AdminController@getAddPage', 'add_page');
}

// Page Routes
$router->map('GET', '/', 'Acme\controllers\PageController@getShowHomePage', 'home');
$router->map('GET', '/page-not-found', 'Acme\controllers\PageController@getShow404', '404' );
$router->map('GET', '/[*]', 'Acme\controllers\PageController@getShowPage', 'generic_page' );

<?php

namespace Acme\controllers;

use duncan3dc\Laravel\BladeInstance;
use Acme\Models\User;

class PageController extends BaseController
{
    public function getShowHomePage()
    {
        // include __DIR__.'/../../views/home.php';
        // echo $this->twig->render('home.html');

        // $_SESSION['test'] = "<strong>I hope this works</strong>";
        echo $this->blade->render('home');
    }
}

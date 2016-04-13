<?php

namespace Acme\controllers;

use duncan3dc\Laravel\BladeInstance;
use Acme\models\Page;

class PageController extends BaseController
{
    public function getShowHomePage()
    {
        // include __DIR__.'/../../views/home.php';
        // echo $this->twig->render('home.html');

        // $_SESSION['test'] = "<strong>I hope this works</strong>";
        echo $this->blade->render('home');
    }

    public function getShowPage()
    {
        $browser_title = '';
        $page_content = '';
        $page_id = 0;

        // echo 'foo';
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $target = $uri[1];

        $page = Page::where('slug', '=', $target)->get();

        foreach( $page as $item)
        {
            $browser_title = $item->browser_title;
            $page_content = $item->page_content;
            $page_id = $item->id;
        }

        if (strlen($browser_title) == 0) {
            header("Location: /page-not-found");
            exit();
        }

        echo $this->blade->render('generic-page', [
            'browser_title' => $browser_title,
            'page_content'  => $page_content,
            'page_id'       => $page_id,
        ]);
    }

    public function getShow404()
    {
        header("HTTP/1.0 404 Not Found");
        echo $this->blade->render('page-not-found');
    }
}

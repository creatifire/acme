<?php

namespace Acme\controllers;

use Acme\Models\Page;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;

class AdminController extends BaseController
{
    public function postSavePage()
    {
        $page_id = $_REQUEST['page_id'];
        $page_content = $_REQUEST['thedata'];

        $page = Page::find($page_id);
        $page->page_content = $page_content;
        $page->save();
        echo "OK";
    }
}

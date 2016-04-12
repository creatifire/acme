<?php

namespace Acme\controllers;

// use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Kunststube\CSRFP\SignatureGenerator;

class BaseController
{
    protected $blade;
    protected $signer;

    public function __construct()
    {
        $this->signer = new SignatureGenerator(getenv('CSRF_SECRET'));
        // $this->signer = new SignatureGenerator("afasfasf");
        $this->blade = new BladeInstance("/vagrant/views", "/vagrant/cache/views");

    }
}

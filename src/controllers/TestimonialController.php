<?php

namespace Acme\controllers;

use Acme\Models\Testimonial;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;
use Acme\Auth\LoggedIn;

class TestimonialController extends BaseController
{
    public function getShowTestimonials() {
        $testimonials = Testimonial::all();

        echo $this->blade->render('testimonials', [
            'testimonials' => $testimonials
        ]);
    }
    public function getShowAdd()
    {
        echo $this->blade->render('add-testimonial');
    }

    public function postShowAdd()
    {
        $errors = [];

        $validation_data = [
            'title' => 'min:3',
            'testimonial' => 'min:10',
        ];
        $validator = new Validator();

        $errors = $validator->isValid($validation_data);

        if (sizeof($errors) > 0) {
            $_SESSION['msg'] = $errors;
            // echo $this->twig->render('register.html', ['errors' => $errors]);
            echo $this->blade->render('add-testimonial');
            unset($_SESSION['msg']);
            exit();
        }

        $testimonial = new Testimonial();
        $testimonial->title = $_REQUEST['title'];
        $testimonial->testimonial = $_REQUEST['testimonial'];
        $testimonial->user_id = LoggedIn::user()->id;
        $testimonial->save();

        header("Location: /testimonial-saved");
        exit();
    }
}

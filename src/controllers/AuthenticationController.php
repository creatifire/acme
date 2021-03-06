<?php

namespace Acme\controllers;

use Acme\Models\User;
use Acme\Validation\Validator;
use duncan3dc\Laravel\BladeInstance;

class AuthenticationController extends BaseController
{
    public function getShowLoginPage()
    {
        echo $this->blade->render('login');
    }

    public function postShowLoginPage()
    {
        $okay = true;
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        // lookup User
        $user = User::where('email', '=', $email)
            ->first();

        if ($user != null) {
            // validate credentials
            if (!password_verify($password, $user->password)) {
                $okay = false;
            }
        } else {
            $okay = false;
        }

        if ($okay) {
            $_SESSION['user'] = $user;
            header('Location: /');
            exit();
        } else {
            $_SESSION['msg'] = ["Invalid login"];
            echo $this->blade->render('login');
            unset($_SESSION['msg']);
            exit();
        }
    }

    public function getLogOut()
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /login');
        exit();
    }

    public function getTestUser()
    {
        $user = $_SESSION['user'];
        dd($user->testimonials);
    }
}

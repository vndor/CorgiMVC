<?php

namespace Controllers;

use Models\User;
use aphp\XPDO\Database;
use CorgiMVC;

class Auth
{
    public function index($corgi)
    {
        $message = '';

        if (isSet($corgi[0]) && $corgi[0] == "failed") {
            $message = "Login Failed!";
        }

        $data = [
            'message' => $message
        ];

        return CorgiMVC::getView($data);
    }

    public function login($corgi)
    {   
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = User::loadWithField('username', $username);

        if (password_verify($password, $user->password)) {
            $_SESSION["user"] = $user;
            CorgiMVC::redirect('/index.php/home/dashboard');
        } else {
            CorgiMVC::redirect('/index.php/auth/index/failed');
        }

    }

    public function logout()
    {
        session_destroy();
        CorgiMVC::redirect('/index.php/auth');
    }
}

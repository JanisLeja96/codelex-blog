<?php

namespace App\Controllers;

class LoginController
{

    public function __construct()
    {
        if (isset($_SESSION['auth_id'])) {
            header('Location: /');
        }
    }

    public function login()
    {
        return require_once __DIR__ . '/../Views/UsersLoginView.php';
    }

    public function authorize()
    {
        $response = query()->select('*')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $_POST['email'])
            ->execute()
            ->fetchAssociative();

        if (!$response) {
            $error = "<h2 style='color: red'>User not found</h2>";
            require_once __DIR__ . '/../Views/UsersLoginView.php';
        } else if (!password_verify($_POST['password'], $response['password'])) {
            $error = "<h2 style='color: red'>Incorrect password</h2>";
            require_once __DIR__ . '/../Views/UsersLoginView.php';
        } else {
            $_SESSION['auth_id'] = (int) $response['id'];
            return header('Location: /');
        }
    }

    public function logout()
    {
        session_destroy();
        return require_once __DIR__ . '/../Views/UsersLoginView.php';
    }
}
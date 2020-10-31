<?php

namespace App\Controllers;

use App\Models\User;
use Respect\Validation\Validator;

class RegistrationController
{

    public function __construct()
    {
        if (isset($_SESSION['auth_id'])) {
            header('Location: /');
        }
    }
    public function registrationForm()
    {
        return require_once __DIR__ . '/../Views/UsersRegisterView.php';
    }

    public function register()
    {
        $validName = $_POST['name'] !== '';
        $validEmail = Validator::email()->validate($_POST['email']);
        $validPassword = $_POST['password'] !== '' &&  $_POST['confirm_password'] == $_POST['password'];

        if ($validName && $validEmail && $validPassword) {

            if ($_GET['r']) {
                $referrerId = query()->select('id')
                    ->from('users')
                    ->where('referral_code = ?')
                    ->setParameter(0, $_GET['r'])
                    ->execute()
                    ->fetchAssociative();

                $user = User::create($_POST, $referrerId['id']);
            } else {
                $user = User::create($_POST);
            }
            $query = query();
            $query->insert('users')
                ->values([
                    'name' => ':name',
                    'email' => ':email',
                    'password' => ':password',
                    'referral_code' => ':referral_code',
                    'referred_by' => ':referred_by'
                ])
                ->setParameters($user->toArray())
                ->execute();
            $_SESSION['auth_id'] = (int) $query->getConnection()->lastInsertId();

            return header('Location: /');
        }

        return header('Location: /register');
    }

    public static function validateEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    private function setSession(array $userData): bool
    {
        $sessionData = [
            'LoginTrue' => true,
            'id' => $userData[0]['id'],
            'name' => $userData[0]['name'],
            'username' => $userData[0]['username'],
            'email' => $userData[0]['email'],
            'role' => $userData[0]['role'],
            'created_at' => $userData[0]['created_at'],
        ];
    
        session()->set($sessionData);
    
        return true;
    }

    public function home()
    {
        return view('pages/auth/signIn', ['page' => 'Sign In']);
    }

    public function signIn()
    {
        $model = new UsersModel();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $username = $this->request->getPost('username');
            $checkpointData = $model->usernameOrEmail($username);

            if (empty($checkpointData)) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Peringatan!',
                    'text' => 'Invalid user.',
                ]);
            }

            $password = $this->request->getPost('password');
            $isValidPassword = password_verify($password, $checkpointData[0]['password']);

            if (!$isValidPassword) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Peringatan!',
                    'text' => 'Invalid password.',
                ]);
            }

            $this->setSession($checkpointData);

            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Berhasil login!',
                'text' => 'Anda akan diarahkan dalam 3 detik.',
            ]);
        }

        // else, return the sign in view
        return view('pages/auth/signIn', ['page' => 'Sign In']);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{
    // Fungsi untuk menyimpan data pengguna dalam sesi
    private function setSession(array $userData): bool
    {
        // Buat array data sesi dari data pengguna
        $sessionData = [
            'LoginTrue' => true,
            'id' => $userData[0]['id'],
            'name' => $userData[0]['name'],
            'username' => $userData[0]['username'],
            'email' => $userData[0]['email'],
            'role' => $userData[0]['role'],
            'created_at' => $userData[0]['created_at'],
        ];
        // Simpan data sesi
        session()->set($sessionData);
        // Kembalikan nilai benar untuk menandakan penyimpanan sesi berhasil
        return true;
    }

    // Fungsi untuk menampilkan halaman sign in
    public function home()
    {
        // Tampilkan halaman sign in dan kirimkan data judul halaman
        return view('pages/auth/signIn', ['page' => 'Sign In']);
    }

    // Fungsi untuk memproses login pengguna
    public function signIn()
    {
        $model = new UsersModel();
        // Jika permintaan dari AJAX dan metode POST
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            // Ambil username dari permintaan
            $username = $this->request->getPost('username');

            // Cari data pengguna dengan username yang diberikan
            $checkpointData = $model->usernameOrEmail($username);

            // Jika data pengguna tidak ditemukan
            if (empty($checkpointData)) {
                // Kembalikan pesan error
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Peringatan!',
                    'text' => 'Invalid user.',
                ]);
            }

            // Ambil password dari permintaan
            $password = $this->request->getVar('password');

            // Periksa apakah password yang diberikan cocok dengan password yang disimpan
            $isValidPassword = password_verify($password, $checkpointData[0]['password']);

            // Jika password tidak cocok
            if (!$isValidPassword) {
                // Kembalikan pesan error
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Peringatan!',
                    'text' => 'Invalid password.',
                ]);
            }

            // Jika login berhasil, simpan data pengguna dalam sesi
            $this->setSession($checkpointData);

            // Kembalikan pesan sukses
            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Berhasil login!',
                'text' => 'Anda akan diarahkan dalam 3 detik.',
            ]);
        }

        // Jika permintaan bukan dari AJAX atau metode bukan POST, tampilkan halaman sign in
        return view('pages/auth/signIn', ['page' => 'Sign In']);
    }
}

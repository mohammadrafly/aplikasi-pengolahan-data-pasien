<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        helper('uuid');
        $model = new UsersModel();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST'){
            $data = $this->request->getPost([
                'username',
                'email',
                'password',
                'name',
                'role',
                'jenis_kelamin',
                'alamat'
            ]);

            $existingUser = $model->whereIn('username', [$data['username'], $data['email']])
                                ->orWhereIn('email', [$data['username'], $data['email']])
                                ->first();

            if ($existingUser) {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Error!',
                    'text' => ($existingUser->username == $data['username']) ? 'Username telah digunakan.' : 'Email telah digunakan.'
                ]);
            }

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['created_at'] = date('Y-m-d');
            $data['updated_at'] = date('Y-m-d');
            if ($data['role'] === 'pasien') {
                $prefix = 'PSN_';
                $data['kode_pasien'] = uniqid($prefix) . rand(00001, 99999);
                $model->insert($data);
            } else {
                $model->insert($data);
            }
            
            
            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil daftar.'
            ]);
        } else {
            return view('pages/dashboard/userDashboard', [
                'page' => 'Users List',
                'data' => $model->findAll(),
            ]);
        }
    }

    public function getUsers()
    {
        $model = new UsersModel();
        return $this->response->setJSON($model->findDataByRole('pasien'));
    }

    public function update($id)
    {
        $model = new UsersModel();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = $this->request->getPost([
                'username',
                'email',
                'password',
                'name',
                'role',
                'jenis_kelamin',
                'alamat'
            ]);

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['updated_at'] = date('Y-m-d H:i:s');
            if ($model->update($id, $data)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil menyimpan data user.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal menyimpan data user.',
                ]);
            }
        } elseif($this->request->isAJAX() && $this->request->getMethod(true) === 'GET') {
            return $this->response->setJSON([
                'data' => $model->where('id', $id)->first(),
            ]);
        }
    }

    public function delete($id)
    {
        $model = new UsersModel();
        if ($this->request->isAJAX()) {
            if ($model->where('id', $id)->delete($id)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil hapus data user.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal hapus data user.',
                ]);
            }
        }
    }
}

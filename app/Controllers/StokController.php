<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StokModel;

class StokController extends BaseController
{
    public function index()
    {
        $model = new StokModel();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = $this->request->getPost([
                'name',
                'quantity',
                'price',
            ]);
            $data['created_at'] = date('Y-m-d');
            $data['updated_at'] = date('Y-m-d');
            $model->insert($data);
            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil insert stok.'
            ]);
        } else {
            return view('pages/dashboard/stokDashboard', [
                'page' => 'Stok List',
                'data' => $model->findAll()
            ]);
        }
    }

    public function getStok()
    {
        $model = new StokModel();
        return $this->response->setJSON($model->getStokArray());
    }

    public function update($id)
    {
        $model = new StokModel();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = $this->request->getPost([
                'name',
                'quantity',
                'price',
            ]);
            $data['updated_at'] = date('Y-m-d');
            $model->update($id, $data);
            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil menyimpan data stok.',
            ]);
        } elseif ($this->request->isAJAX() && $this->request->getMethod(true) === 'GET') {
            return $this->response->setJSON([
                'data' => $model->where('id', $id)->first(),
            ]);
        }
    }

    public function delete($id)
    {
        $model = new StokModel();
        if ($this->request->isAJAX()) {
            if ($model->where('id', $id)->delete($id)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil hapus data stok.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal hapus data stok.',
                ]);
            }
        }
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\ItemModel;
use App\Models\KunjunganModel;
use App\Models\StokModel;
use App\Models\UsersModel;
use Dompdf\Dompdf;

class PasienController extends BaseController
{
    public function delete($id)
    {
        $model = new KunjunganModel();
        if ($this->request->isAJAX()) {
            if ($model->where('id', $id)->delete($id)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil hapus data kunjungan.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal hapus data kunjungan.',
                ]);
            }
        }
    }
    public function detail($id)
    {
        $model = new KunjunganModel();
        return $this->response->setJSON($model->getAssociateDataById($id));
    }

    public function kunjungan()
    {
        $modelKunjungan = new KunjunganModel();
        $modelItem = new ItemModel();
        $modelGejala = new GejalaModel();
        $modelStok = new StokModel();

        $requestBody = file_get_contents('php://input');
        $requestData = json_decode($requestBody, true);
    
        $pasien = $requestData['pasien'];
        $gejala = $requestData['gejala'];
        $diagnosa = $requestData['diagnosa'];
        $idStok = $requestData['id_stok'];
        $quantity = $requestData['quantity'];
        $resep = $requestData['resep'];
        $kode_kunjungan = $this->generateRandomCode();

        $data = [
            'kode_kunjungan' => $kode_kunjungan,
            'kode_pembayaran' => null,
            'diagnosa' => $diagnosa,
            'resep' => $resep,
            'kode_pasien' => $pasien,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ];

        if (!$modelKunjungan->insert($data)) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal membuat kunjungan.'
            ]); 
        }
 
        $gejalaSuccess = true;
        $idStokSuccess = true;

        foreach ($gejala as $gejalaItem) {
            $insertGejala = $modelGejala->insert([
                'kode_kunjungan' => $kode_kunjungan,
                'gejala' => $gejalaItem,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ]);

            if (!$insertGejala) {
                $gejalaSuccess = false;
                break;
            }
        }

        foreach ($idStok as $index => $idStokItem) {
            $insertItem = $modelItem->insert([
                'kode_kunjungan' => $kode_kunjungan,
                'id_stok' => $idStokItem,
                'quantity' => $quantity[$index],
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ]);
        
            if (!$insertItem) {
                $idStokSuccess = false;
                break;
            } else {
                // Reduce stock based on ID and quantity
                $stock = $modelStok->find($idStokItem);
                if ($stock) {
                    $updatedQuantity = $stock['quantity'] - $quantity[$index];
                    $modelStok->update($idStokItem, [
                        'quantity' => $updatedQuantity,
                        'updated_at' => date('Y-m-d'),
                    ]);
                }
            }
        }        

        if (!$gejalaSuccess || !$idStokSuccess) {
            return $this->response->setJSON([
                'status' => false,
                'icon' => 'error',
                'title' => 'Error!',
                'text' => 'Gagal membuat kunjungan.'
            ]);
        }

        return $this->response->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Success!',
            'text' => 'Berhasil membuat kunjungan.'
        ]);      
    }

    public function index()
    {
        $model = new KunjunganModel();
        $modelUser = new UsersModel();
        $modelStok = new StokModel();

        return view('pages/dashboard/pasienDashboard', [
            'page' => 'Kunjungan Pasien',
            'data' => $model->getAssociateData(),
            'pasien' => $modelUser->findDataByRole('pasien'),
            'stok' => $modelStok->findAll(),
        ]);
    }

    private function generateRandomCode()
    {
        $code = '';
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        for ($i = 0; $i < 8; $i++) {
            $code .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $code;
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosaModel;
use App\Models\KunjunganModel;
use App\Models\PembayaranModel;
use App\Models\ResepModel;
use App\Models\StokModel;
use App\Models\UsersModel;

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

    public function index()
    {
        $model = new KunjunganModel();
        $modelUser = new UsersModel();
        $modelStok = new StokModel();
        $modelDiagnosa = new DiagnosaModel();
        $modelResep = new ResepModel();

        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $pasien = $this->request->getPost('pasien');
            $chars_to_remove = array('[', ']', '{', '}', ':', '"', 'value');
            $newPasien = str_replace($chars_to_remove, '', $pasien);
            $saperator = ' ';
            $newPasien2 = substr($newPasien, 0, strpos($newPasien, $saperator));
            $data = [
                'kode_pasien' => $newPasien2,
                'diagnosa' => $this->request->getPost('diagnosa'),
                'resep' => $this->request->getPost('resep'), 
            ];

            $random_code = $this->generateRandomCode();
            $data['kode_kunjungan'] = $random_code;
            $gejala = $this->request->getPost('gejala[]');
            $stok = $this->request->getPost('id_stok[]');

            $newGejala = str_replace($chars_to_remove, '', $gejala);
            $arrayGejala = explode(", ", $newGejala);

            $insertedId = $this->insertData($model, $data, $random_code);
            $diagnosaData = $this->prepareDiagnosaData($arrayGejala, $insertedId);
            $resepData = $this->prepareStokData($stok, $insertedId);

            $this->insertBatchData($modelResep, $resepData);
            $this->insertBatchData($modelDiagnosa, $diagnosaData);

            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil membuat kunjungan.'
            ]);

        } else {
            return view('pages/dashboard/pasienDashboard', [
                'page' => 'Kunjungan Pasien',
                'data' => $model->getAssociateData(),
                'pasien' => $modelUser->findDataByRole('pasien'),
                'stok' => $modelStok->findAll(),
            ]);
        }
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

    private function insertData($model, $data, $random_code)
    {
        if ($model->insert($data)) {
            return $model->where('kode_kunjungan', $random_code)->first('id');
        } else {
            return false;
        }
    }

    private function prepareDiagnosaData($stringGejala, $insertedId)
    {
        $data = [];
        for ($i = 0; $i < count($stringGejala); $i++) {
            $data[$i] = [
                'id_kunjungan' => $insertedId['id'],
                'gejala' => $stringGejala[$i]
            ];
        }
        return $data;
    }

    private function prepareStokData($stringIdStok, $insertedId)
    {
        $data = [];
        for ($i = 0; $i < count($stringIdStok); $i++) {
            $data[$i] = [
                'id_kunjungan' => $insertedId['id'],
                'id_stok' => $stringIdStok[$i]
            ];
        }
        return $data;
    }


    private function insertBatchData($model, $data)
    {
        $model->insertBatch($data);
    }
}

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

    public function pembayaran($id)
    {
        helper('number');
        $modelKunjungan = new KunjunganModel();
        $modelItem = new ItemModel();

        if ($this->request->getMethod(true) !== 'POST') {
            return;
        } else {
            if ($modelKunjungan->where('kode_kunjungan', $this->request->getPost('kode_kunjungan'))->first()) {
                $data = [
                    'items' => $modelItem->getAssociateItems($id),
                ];

                $filename = date('Y-m-d'). $this->request->getPost('kode_kunjungan');

                // instantiate and use the dompdf class
                $dompdf = new Dompdf();

                // load HTML content
                $dompdf->loadHtml(view('invoice/invoice', $data));

                // (optional) setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // render html as PDF
                $dompdf->render();

                // output the generated pdf
                $dompdf->stream($filename);
            } else {
                $prefix = 'PAY_';
                $kode_unik = $prefix . uniqid(rand(00000, 99999)); 
                $data = [
                    'kode_pembayaran' => $kode_unik,
                ];
        
                if (!$modelKunjungan->update($id,$data)) {
                    return;
                }
        
                $data = [
                    'items' => $modelItem->getAssociateItems($id),
                ];

                $filename = date('Y-m-d'). $this->request->getPost('kode_kunjungan');

                // instantiate and use the dompdf class
                $dompdf = new Dompdf();

                // load HTML content
                $dompdf->loadHtml(view('invoice/invoice', $data));

                // (optional) setup the paper size and orientation
                $dompdf->setPaper('A4', 'landscape');

                // render html as PDF
                $dompdf->render();

                // output the generated pdf
                $dompdf->stream($filename);
            }
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
}

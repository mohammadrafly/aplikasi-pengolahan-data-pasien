<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiagnosaModel;
use App\Models\GejalaModel;
use App\Models\ItemModel;
use App\Models\KunjunganModel;
use App\Models\PembayaranModel;
use App\Models\ResepModel;
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

    public function index()
    {
        $model = new KunjunganModel();
        $modelUser = new UsersModel();
        $modelStok = new StokModel();
        $modelItem = new ItemModel();
        $modelGejala = new GejalaModel();
        
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $pasien = $this->request->getVar('pasien');
            $chars_to_remove = array('[', ']', '{', '}', ':', '"', 'value');
            $newPasien = str_replace($chars_to_remove, '', $pasien);
            $saperator = ' ';
            $newPasien2 = substr($newPasien, 0, strpos($newPasien, $saperator));
            $data = [
                'kode_pasien' => $newPasien2,
                'diagnosa' => $this->request->getVar('diagnosa'),
                'resep' => $this->request->getVar('resep'),
                'kode_pembayaran' => null,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];

            $random_code = $this->generateRandomCode();
            $data['kode_kunjungan'] = $random_code;
            $gejala = $this->request->getVar('gejala');
            $stok = $this->request->getVar('id_stok[]');
            $quantity = $this->request->getVar('quantity[]');

            $newGejala = str_replace($chars_to_remove, '', $gejala);
            $arrayGejala = explode(',', $newGejala);
            
            $insertedId = $this->insertData($model, $data, $random_code);
            $gejalaData = $this->prepareGejalaData($arrayGejala, $insertedId, $random_code);
            $itemData = $this->prepareStokData($stok, $quantity, $insertedId);

            $this->insertBatchData($modelGejala, $gejalaData);
            $this->insertBatchData($modelItem, $itemData);

            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil membuat kunjungan.'
            ]);

        } else {
            //dd($model->getAssociateData());
            return view('pages/dashboard/pasienDashboard', [
                'page' => 'Kunjungan Pasien',
                'data' => $model->getAssociateData(),
                'pasien' => $modelUser->findDataByRole('pasien'),
                'stok' => $modelStok->findAll(),
            ]);
        }
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

    private function insertData($model, $data, $random_code)
    {
        if ($model->insert($data)) {
            return $model->where('kode_kunjungan', $random_code)->first('id');
        } else {
            return false;
        }
    }

    private function prepareGejalaData($arrayGejala, $insertedId, $kodeKunjungan)
    {
        $data = [];
        foreach ($arrayGejala as $value) {
            $data[] = [
                'gejala' => $value,
                'kode_kunjungan' => $kodeKunjungan,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];
        }
        return $data;
    }

    private function prepareStokData($stringIdStok, $quantity, $insertedId)
    {
        $data = [];
        for ($i = 0; $i < count($stringIdStok); $i++) {
            $data[$i] = [
                'kode_kunjungan' => $insertedId['kode_kunjungan'],
                'id_stok' => $stringIdStok[$i],
                'quantity' => $quantity[$i],
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ];
        }
        return $data;
    }

    private function insertBatchData($model, $data)
    {
        $model->insertBatch($data);
    }
}

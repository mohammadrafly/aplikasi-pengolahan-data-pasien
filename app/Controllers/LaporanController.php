<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Controllers\BaseController;
use App\Models\LaporanModel;
use App\Models\UsersModel;
use App\Models\StokModel;

class LaporanController extends BaseController
{
    public function index()
    {
        $model = new LaporanModel();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = $this->request->getPost([
                'name',
                'table',
                'start_date',
                'end_date'
            ]);
            $data['created_at'] = date('Y-m-d');
            $data['updated_at'] = date('Y-m-d');
            $model->insert($data);
            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil buat laporan.'
            ]);
        } else {
            return view('pages/dashboard/laporanDashboard', [
                'page' => 'Laporan List',
                'data' => $model->findAll()
            ]);
        }
    }

    public function update($id)
    {
        $model = new LaporanModel();
        if ($this->request->isAJAX() && $this->request->getMethod(true) === 'POST') {
            $data = $this->request->getPost([
                'name',
                'table',
                'start_date',
                'end_date'
            ]);
            $data['updated_at'] = date('Y-m-d H:i:s');
            $model->update($id, $data);
            return $this->response->setJSON([
                'status' => true,
                'icon' => 'success',
                'title' => 'Success!',
                'text' => 'Berhasil menyimpan data laporan.',
            ]);
        } elseif ($this->request->isAJAX() && $this->request->getMethod(true) === 'GET') {
            return $this->response->setJSON([
                'data' => $model->where('id', $id)->first(),
            ]);
        }
    }

    public function delete($id)
    {
        $model = new LaporanModel();
        if ($this->request->isAJAX()) {
            if ($model->where('id', $id)->delete($id)) {
                return $this->response->setJSON([
                    'status' => true,
                    'icon' => 'success',
                    'title' => 'Success!',
                    'text' => 'Berhasil hapus data laporan.',
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => false,
                    'icon' => 'error',
                    'title' => 'Warning!',
                    'text' => 'Gagal hapus data laporan.',
                ]);
            }
        }
    }
    
    public function export($table, $start_date, $end_date)
    {
        $modelUser = new UsersModel();
        $modelStok = new StokModel();
        if ($table === 'pasien') {
            $dataUser = $modelUser->findDataInBetween($table, $start_date, $end_date);
            $spreadsheet = new Spreadsheet();
            // tulis header/nama kolom 
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Kode Pasien')
                        ->setCellValue('B1', 'Nama')
                        ->setCellValue('C1', 'Jenis kelamin')
                        ->setCellValue('D1', 'Alamat');
            
            $column = 2;
            // tulis data mobil ke cell
            foreach($dataUser as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $column, $data['kode_pasien'])
                            ->setCellValue('B' . $column, $data['name'])
                            ->setCellValue('C' . $column, $data['jenis_kelamin'])
                            ->setCellValue('D' . $column, $data['alamat']);
                $column++;
            }
            // tulis dalam format .xlsx
            $writer = new Xlsx($spreadsheet);
            $fileName = 'Data User';
        
            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
            header('Cache-Control: max-age=0');
        
            $writer->save('php://output');
        } elseif ($table === 'users') {
            $role = null;
            $dataUser = $modelUser->findDataInBetween($role, $start_date, $end_date);
            $spreadsheet = new Spreadsheet();
            // tulis header/nama kolom 
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Nama')
                        ->setCellValue('B1', 'Username')
                        ->setCellValue('C1', 'Email')
                        ->setCellValue('D1', 'Jenis Kelamin')
                        ->setCellValue('E1', 'Alamat')
                        ->setCellValue('F1', 'Role');
            
            $column = 2;
            // tulis data mobil ke cell
            foreach($dataUser as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $column, $data['name'])
                            ->setCellValue('B' . $column, $data['username'])
                            ->setCellValue('C' . $column, $data['email'])
                            ->setCellValue('D' . $column, $data['jenis_kelamin'])
                            ->setCellValue('E' . $column, $data['alamat'])
                            ->setCellValue('F' . $column, $data['role']);
                $column++;
            }
            // tulis dalam format .xlsx
            $writer = new Xlsx($spreadsheet);
            $fileName = 'Data User';
        
            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
            header('Cache-Control: max-age=0');
        
            $writer->save('php://output');
        } elseif ($table === 'stok') {
            $dataStok = $modelStok->findDataInBetween($start_date, $end_date);
            $spreadsheet = new Spreadsheet();
            // tulis header/nama kolom 
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Nama Stok')
                        ->setCellValue('B1', 'Quantity');
            
            $column = 2;
            // tulis data mobil ke cell
            foreach($dataStok as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $column, $data['name'])
                            ->setCellValue('B' . $column, $data['quantity']);
                $column++;
            }
            // tulis dalam format .xlsx
            $writer = new Xlsx($spreadsheet);
            $fileName = 'Data Stok';
        
            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
            header('Cache-Control: max-age=0');
        
            $writer->save('php://output');
        }
    }
}

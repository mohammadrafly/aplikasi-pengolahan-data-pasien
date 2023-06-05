<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StokModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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

    public function generatePDF()
    {
        // Load the invoice data
        $invoice_number = 'INV-001';
        $date = '2023-06-05';
        $customer_name = 'John Doe';
        $items = [
            ['description' => 'Product 1', 'quantity' => 2, 'price' => 10],
            ['description' => 'Product 2', 'quantity' => 3, 'price' => 15],
        ];
        $total_amount = 55;

        // Create a new DOMPDF instance
        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);
        $dompdf = new Dompdf($options);

        // Load the invoice view
        $data = [
            'invoice_number' => $invoice_number,
            'date' => $date,
            'customer_name' => $customer_name,
            'items' => $items,
            'total_amount' => $total_amount
        ];
        $html = view('invoice/invoice', $data);

        // Convert the HTML to PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the PDF file for download or save
        $dompdf->stream("invoice.pdf", ['Attachment' => true]);
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

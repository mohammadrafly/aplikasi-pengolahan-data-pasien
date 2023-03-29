<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'Dashboard'
        ];
        return view('pages/dashboard/indexDashboard', $data);
    }

    public function signOut()
    {
        session()->destroy();
        return response()->setJSON([
            'status' => true,
            'icon' => 'success',
            'title' => 'Sign Out Berhasil.',
        ]);
    }
}

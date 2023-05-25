<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Administrator extends Seeder
{
    public function run()
    {
        $data = [
            'name'      => 'admin',
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => password_hash('admin', PASSWORD_DEFAULT),
            'role'      => 'admin',
            'created_at'=> date('Y-m-d'),
            'updated_at'=> date('Y-m-d'),
        ];
        $this->db->table('users')->insert($data);
    }
}
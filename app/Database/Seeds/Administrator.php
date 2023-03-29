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
        ];
        $this->db->table('users')->insert($data);
    }
}

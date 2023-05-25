<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Laporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'table' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'start_date' => [
                'type'       => 'DATE',
            ],
            'end_date' => [
                'type'       => 'DATE',
            ],
            'created_at' => [
                'type'    => 'DATE',
            ],
            'updated_at' => [
                'type'    => 'DATE',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('laporan');
    }

    public function down()
    {
        $this->forge->dropTable('laporan');
    }
}

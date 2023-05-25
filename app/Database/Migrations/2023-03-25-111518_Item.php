<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Item extends Migration
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
            'kode_kunjungan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'id_stok' => [
                'type'       => 'INT',
                'constraint' => 11
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'created_at' => [
                'type'    => 'DATE',
            ],
            'updated_at' => [
                'type'    => 'DATE',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('item');
    }

    public function down()
    {
        $this->forge->dropTable('item');
    }
}

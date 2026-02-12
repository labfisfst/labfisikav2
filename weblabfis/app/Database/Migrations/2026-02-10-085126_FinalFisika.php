<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FinalFisika extends Migration
{
    public function up()
    {
        // Tabel Labs
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'nama_lab' => ['type' => 'VARCHAR', 'constraint' => 100],
            'deskripsi' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('labs', true); // Parameter true = IF NOT EXISTS

        // Tabel Alat
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'lab_id' => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'nama_alat' => ['type' => 'VARCHAR', 'constraint' => 150],
            'tahun' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'fungsi' => ['type' => 'TEXT', 'null' => true],
            'kondisi' => ['type' => 'ENUM', 'constraint' => ['Baik', 'Rusak', 'Perbaikan'], 'default' => 'Baik'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('lab_id', 'labs', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('alat', true); // Parameter true = IF NOT EXISTS
    }

    public function down()
    {
        $this->forge->dropTable('alat', true);
        $this->forge->dropTable('labs', true);
    }
}
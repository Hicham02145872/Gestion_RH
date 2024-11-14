<?php

// app/Database/Migrations/2023-11-02-000000_CreateOffresTable.php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOffresTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'titre' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'salaire' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('offres');
    }

    public function down()
    {
        $this->forge->dropTable('offres');
    }
}


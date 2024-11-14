<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    // Database/Migrations/2021-01-01-000000_CreateUsersTable.php
public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'auto_increment' => true,
        ],
        'username' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
        ],
        'email' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
        ],
        'password' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
        ],
        'reset_token' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
            'null' => true,
        ],
        'created_at' => [
            'type' => 'DATETIME',
        ],
        'updated_at' => [
            'type' => 'DATETIME',
        ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('users');
}


    public function down()
    {
        //
    }
}

<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCandidaturesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'prenom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'cv' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lettre' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('candidatures');
    }

    public function down()
    {
        $this->forge->dropTable('candidatures');
    }
}

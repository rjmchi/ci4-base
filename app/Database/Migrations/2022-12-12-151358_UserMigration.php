<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email'=> [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password'=> [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                    'type' => 'DATETIME',
                    'constraint' => 250,
                    'null' => true,
                    'on update' => 'NOW()'
                ],
		    'updated_at' => [
                    'type' => 'DATETIME',
                    'constraint' => 250,
                    'null' => true,
                    'on update' => 'NOW()'
                ]
        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('foreign_id', 'table', 'id');
        $this->forge->addUniqueKey('email');
        $this->forge->addUniqueKey('name');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}

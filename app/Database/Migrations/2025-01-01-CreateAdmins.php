<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdmins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => ['type' => 'INT','constraint' => 11,'auto_increment' => true],
            'username'  => ['type' => 'VARCHAR','constraint' => 50],
            'password'  => ['type' => 'VARCHAR','constraint' => 255],
            'role'      => ['type' => 'ENUM','constraint' => ['utama', 'bidang']],
            'bidang'    => ['type' => 'VARCHAR','constraint' => 100, 'null' => true],
            'created_at datetime default current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}

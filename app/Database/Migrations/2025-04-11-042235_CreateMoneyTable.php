<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMoneyTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_money'          => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_gawe'          => [
				'type'           => 'BIGINT',
				'constraint'     => 20,
				'unsigned'       => true,
			],
            'detail'       => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'nominal'       => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'date_money'       => [
                'type'       => 'DATE',
                'null'         => true,
            ],
            'description'       => [
                'type'       => 'TEXT',
                'null'         => true,
            ],
            'type_money' => [
                'type' => 'ENUM',
                'constraint' => ['in', 'out']
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_money', true);
        $this->forge->addForeignKey('id_gawe', 'gawe', 'id_gawe', 'CASCADE', 'CASCADE', 'id_gawe_relation');
        $this->forge->createTable('money');
    }

    public function down()
    {
        $this->forge->dropForeignKey('money', 'money_id_gawe_foreign');
        $this->forge->dropTable('money');
    }
}

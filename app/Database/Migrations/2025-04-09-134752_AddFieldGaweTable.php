<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldGaweTable extends Migration
{
    public function up()
    {
        $fields = [
            'title_gawe' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'null'       => true,
                'after'      => 'name_gawe',
            ],
            'place_gawe' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'title_gawe',
            ],
            'address_gawe' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'place_gawe',
            ],
            'end_gawe' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'after'   => 'date_gawe',
            ],
            'image_gawe' => [
                'type'    => 'TEXT',
                'null'    => true,
                'after'   => 'info_gawe',
            ],
        ];
        $this->forge->addColumn('gawe', $fields);

        $modifyFields = [
            'date_gawe' => [
                'type' => 'DATETIME',
            ],
        ];
        $this->forge->modifyColumn('gawe', $modifyFields);
    }

    
    public function down()
    {
        $modifyFields = [
            'date_gawe' => [
                'type' => 'DATE',
            ],
        ];
        $this->forge->modifyColumn('gawe', $modifyFields);

        $this->forge->dropColumn('gawe', ['title_gawe', 'place_gawe', 'address_gawe', 'end_gawe', 'image_gawe']);
    }
}

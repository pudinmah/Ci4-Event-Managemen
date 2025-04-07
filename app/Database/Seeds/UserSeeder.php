<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // multi data
        $data = [
            [
                'name_user' => 'Admin',
                'email_user' => 'admin@app.com',
                'password_user' => password_hash('1234', PASSWORD_BCRYPT),
            ],
            [
                'name_user' => 'User',
                'email_user' => 'user@app.com',
                'password_user' => password_hash('1234', PASSWORD_BCRYPT),
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}

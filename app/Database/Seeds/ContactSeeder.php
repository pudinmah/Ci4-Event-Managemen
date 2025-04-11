<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
    
        // Tambahkan group default jika belum ada
        $this->db->table('groups')->ignore(true)->insert([
            'id_group' => 1,
            'name_group' => 'Default Group'
        ]);
    
        // Insert 10 Data Dummy Otomatis ke contacts
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'name_contact' => $faker->name,
                'phone'        => $faker->phoneNumber,
                'email'        => $faker->freeEmail,
                'address'      => $faker->address,
                'id_group'     => 1,
                'created_at'   => \CodeIgniter\I18n\Time::now(),
            ];
            $this->db->table('contacts')->insert($data);
        }
    }
    
}

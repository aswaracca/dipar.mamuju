<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 3; $i++) { 
            DB::table('users')->insert([
                'name' => 'Ricky Resky Ananda',
                'username' => 'admin'.$i,
                'password' => bcrypt('admin'.$i),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        DB::table('profil')->insert([
                'about' => '-',
                'vision' => '-',
                'image'=>'-',
                'name_ex'=>'-',
                'id_dokumentasi' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }
}

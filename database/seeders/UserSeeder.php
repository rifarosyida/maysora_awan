<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'AdminDiza',
                    'foto_profil' => 'images/admin.png',
                    'email' => 'diza@admin.com',
                    'password' => Hash::make('admindiza'),
                    'status' => 'admin',
                    'no_hp' => '085733447300',
                    'jenis_kelamin' => 'P',
                    'alamat' => 'Malang'
                ],
                [
                    'username' => 'CustomerDiza',
                    'foto_profil' => 'images/user.png',
                    'email' => 'diza@customer.com',
                    'password' => Hash::make('customerdiza'),
                    'status' => 'customer',
                    'no_hp' => '081733447302',
                    'jenis_kelamin' => 'P',
                    'alamat' => 'Gresik'
                ],
            ]);
    }
}

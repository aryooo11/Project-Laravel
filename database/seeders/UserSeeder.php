<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'email' => 'machfudzaryo@gmail.com',
        'password' => '12345678',
        'level' => 'admin',
        'aktif' => '1'
        ]);
        DB::table('users')->insert([
            'email' => 'pemilik@gmail.com',
        'password' => '12345678',
        'level' => 'pemilik',
        'aktif' => '1'
        ]);
        DB::table('users')->insert([
            'email' => 'bryant@gmail.com',
        'password' => '12345678',
        'level' => 'pelanggan',
        'aktif' => '1'
        ]);
        DB::table('users')->insert([
            'email' => 'operator@gmail.com',
        'password' => '12345678',
        'level' => 'operator',
        'aktif' => '1'
        ]);
    }
}

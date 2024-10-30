<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'jody',
                'email' => 'jody@gmail.com',
                'password' => Hash::make('jodyritonga123'),
                'roles' => 'teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Evelyn H. Tambunan, Ph.D NED',
                'email' => 'evelyne@gmail.com',
                'password' => Hash::make('emsaec123'),
                'roles' => 'teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jonatan S',
                'email' => 'jonatan@gmail.com',
                'password' => Hash::make('jonatan123'),
                'roles' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

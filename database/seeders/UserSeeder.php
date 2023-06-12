<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $main_data = [
            [
                'name' => "Администратор",
                'email' => "asmi046@gmail.com",
                'password' => Hash::make("112233"),
            ],

        ];

        DB::table("users")->insert($main_data);
    }
}

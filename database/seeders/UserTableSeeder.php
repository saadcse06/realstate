<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('users')->insert([
                'name'=>'Admin',
                'username'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'admin',
                'status'=>'active'
            ],
            [
                'name'=>'User',
                'username'=>'user',
                'email'=>'user@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'user',
                'status'=>'active'
            ],
            [
            'name'=>'Student',
                'username'=>'student',
                'email'=>'student@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'student',
                'status'=>'active'
            ],
            [
                'name'=>'Agent',
                'username'=>'agent',
                'email'=>'student@gmail.com',
                'password'=>Hash::make('12345678'),
                'role'=>'agent',
                'status'=>'active'
            ]


        );
    }
}

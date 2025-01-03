<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Orientados a Objetos
        DB::table('users')->insert([
            'name'=>'administrador',
            'email'=>'adm@exameple.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('123456789'),
            'remember_token'=>Str::random(10)
        ]);

    }
}

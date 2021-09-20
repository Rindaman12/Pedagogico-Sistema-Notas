<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
    {
        public function run()
        {
            $admin = new User;
            $admin->usuario = 'lpena';
            $admin->password = bcrypt('12345678');
            $admin->email = 'luispena@gmail.com';
            $admin->nombre_usuario = 'luis';
            $admin->apellido_usuario = 'pena';
            $admin->tipo = 'estudiante';
            $admin->remember_token = Str::random(10);
            $admin->save();

            $admin = new User;
            $admin->usuario = 'miriambu';
            $admin->password = bcrypt('12345678');
            $admin->email = 'miriambu@gmail.com';
            $admin->nombre_usuario = 'miriam';
            $admin->apellido_usuario = 'burgos';
            $admin->tipo = 'profesor';
            $admin->remember_token = Str::random(10);
            $admin->save();
        }
    }

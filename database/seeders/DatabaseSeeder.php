<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder{

    public function run(): void {
        $this->call(RolSeeder::class);

        $user= User::create([
            'name'=>'Leidy',
            'surname'=>'H',
            'email'=>'leidyjuliana.gg@gmail.com',
            'password'=> Hash::make('123456')
        ]);
        $user->assignRole('super-admin');

        $user= User::create([
            'name'=>'Cesar',
            'surname'=>'H',
            'email'=>'cezar_mh86@hotmail.com',
            'password'=> Hash::make('123456')
        ]);
        $user->assignRole('Administrador');
        
       
       
    }
}

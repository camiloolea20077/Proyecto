<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder{
    
    public function run(): void{
        $role = Role::create(['name' => 'super-admin']);
        $role1= Role::create(['name'=> 'Administrador']);
        $role2= Role::create(['name'=> 'Publicista']);

        Permission::create(['name'=>'ver-usuarios'])->assignRole($role1);
        Permission::create(['name'=>'crear-usuarios'])->assignRole($role1);
        Permission::create(['name'=>'editar-usuarios'])->assignRole($role1);
        Permission::create(['name'=>'eliminar-usuarios'])->assignRole($role1);

        Permission::create(['name'=>'ver-roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'crear-roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'editar-roles'])->syncRoles([$role1]);
        Permission::create(['name'=>'eliminar-roles'])->syncRoles([$role1]);

        Permission::create(['name'=>'ver-categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'crear-categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'editar-categorias'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'eliminar-categorias'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'ver-publicaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'crear-publicaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'editar-publicaciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'eliminar-publicaciones'])->syncRoles([$role1, $role2]);
        $role->givePermissionTo(Permission::all());

       
        

    }
}

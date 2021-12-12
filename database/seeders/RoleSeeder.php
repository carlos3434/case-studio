<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        manager    Create a manger relationship to allow managers to CRUD their employees
        standard   se loguea, y ve el listado de employees
        admins     perform CRUD operations to manipulate the employee data in the database.

        admins     puever agregar y actuaizar employees
        manager    puede crear a sus empleados
        standars   puede ver emploeados

        */
        $items = [
            ['name' => 'admin','guard_name' =>'web'],
            ['name' => 'manager','guard_name' =>'web'],
            ['name' => 'standar','guard_name' =>'web'],
        ];

        foreach ($items as $item)
        {
            Role::updateOrCreate($item);
        }

        $user = User::create([
            'name' => 'admin user',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole('admin');

    }
}

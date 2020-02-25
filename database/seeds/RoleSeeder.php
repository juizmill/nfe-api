<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'super-administrador' => 'Administrador total do sistema',
            'administrador' => 'Administrador total do conta',
            'operador' => 'Usuário que irá emitir as NFE',
        ];

        foreach ($roles as $name => $description) {
            Role::create([
                'name' => $name,
                'description' => $description
            ]);
        }
    }
}

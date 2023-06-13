<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private $roles = [
        [
            'name' => 'Administrateur',
            'guard_name' => 'web',
        ],
        [
            'name' => 'Copropriétaire',
            'guard_name' => 'web',
        ],
        [
            'name' => 'Fournisseur',
            'guard_name' => 'web',
        ],
        [
            'name' => 'Gestionnaire immobilier',
            'guard_name' => 'web',
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::statement('ALTER TABLE roles AUTO_INCREMENT = 0');

        foreach($this->roles as $role){
            Role::create([
                'name' => $role['name'],
                'guard_name' => $role['guard_name'],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $permissions =  [

        // Permissions pour le modèle User
        [
            'nom' => 'user-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'user-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'user-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'user-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Role
        [
            'nom' => 'role-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'role-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'role-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'role-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Permission
        [
            'nom' => 'permission-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'permission-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'permission-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'permission-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Charge
        [
            'nom' => 'charge-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'charge-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'charge-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'charge-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Copropriete
        [
            'nom' => 'copropriete-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'copropriete-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'copropriete-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'copropriete-delete',
            'guard_name' => 'web',
        ],

        [
            'nom' => 'facture-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'facture-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'facture-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'facture-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Immeuble
        [
            'nom' => 'immeuble-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'immeuble-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'immeuble-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'immeuble-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Paiement
        [
            'nom' => 'paiment-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'paiment-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'paiment-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'paiment-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Resolution
        [
            'nom' => 'resolution-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'resolution-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'resolution-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'resolution-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Reunion
        [
            'nom' => 'reunion-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'reunion-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'reunion-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'reunion-delete',
            'guard_name' => 'web',
        ],

        // Permissions pour le modèle Reclamation
        [
            'nom' => 'reclamation-list',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'reclamation-create',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'reclamation-edit',
            'guard_name' => 'web',
        ],
        [
            'nom' => 'reclamation-delete',
            'guard_name' => 'web',
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        DB::statement('ALTER TABLE permissions AUTO_INCREMENT = 0');

        foreach($this->permissions as $permission){
            Permission::create([
                'name' => $permission['nom'],
                'guard_name' => $permission['guard_name'],
            ]);
        }
    }
}

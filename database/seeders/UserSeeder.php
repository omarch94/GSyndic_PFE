<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 0');

        $user = User::create([
            'statut_utilisateur_id' => 1,
            'nom' => 'test',
            'prenom' => 'test',
            'email' => 'admin@admin.com',
            'phone' => '0212244550',
            'password' => bcrypt('123456789'),
        ]);

        $role = Role::where(['name' => 'Administrateur'])->first();
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole($role->id);
    }
}

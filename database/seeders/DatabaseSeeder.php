<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\StatutUtilisateur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatutUtilisateursSeeder::class,
            VillesSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            ModePaimentSeeder::class,
            CanalSeeder::class,
            EtatFactureSeeder::class,
            StatutReclamationSeeder::class,
            TypeReclamationSeeder::class,
            StatutChargeSeeder::class,
            TypeChargeSeeder::class,
            UserSeeder::class,
        ]);
    }
}

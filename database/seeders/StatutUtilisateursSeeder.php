<?php

namespace Database\Seeders;

use App\Models\StatutUtilisateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutUtilisateursSeeder extends Seeder
{

    private $statut_utilisateurs = [
        [
            'nom' => 'Actif',
            'description' => 'L\'utilisateur est actif et autorisé à accéder au système.'
        ],
        [
            'nom' => 'Inactif',
            'description' => 'L\'utilisateur est inactif et ne peut pas accéder au système.'
        ],
        [
            'nom' => 'En attente',
            'description' => 'L\'utilisateur est en attente d\'approbation ou de vérification.'
        ],
        [
            'nom' => 'Bloqué',
            'description' => 'L\'utilisateur a été bloqué et ne peut pas accéder au système.'
        ],
        [
            'nom' => 'Supprimé',
            'description' => 'L\'utilisateur a été supprimé du système.'
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_utilisateurs')->delete();
        DB::statement('ALTER TABLE statut_utilisateurs AUTO_INCREMENT = 0');

        foreach($this->statut_utilisateurs as $statut_utilisateur){
            StatutUtilisateur::create([
                'nom' => $statut_utilisateur['nom'],
                'description' => $statut_utilisateur['description']
            ]);
        }
    }
}

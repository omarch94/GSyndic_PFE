<?php

namespace Database\Seeders;

use App\Models\StatutReclamation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutReclamationSeeder extends Seeder
{
    private $statutsReclamation = [
        [
            'nom' => 'En attente',
            'description' => 'La réclamation est en attente de traitement.'
        ],
        [
            'nom' => 'En cours de traitement',
            'description' => 'La réclamation est en cours d\'examen et de résolution.'
        ],
        [
            'nom' => 'Résolue',
            'description' => 'La réclamation a été traitée et résolue avec succès.'
        ],
        [
            'nom' => 'En attente d\'action',
            'description' => 'Des actions supplémentaires sont nécessaires avant de pouvoir résoudre la réclamation.'
        ],
        [
            'nom' => 'Fermée',
            'description' => 'La réclamation a été fermée, soit parce qu\'elle a été résolue, soit parce qu\'elle est considérée comme non valide ou non pertinente.'
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_reclamations')->delete();
        DB::statement('ALTER TABLE statut_reclamations AUTO_INCREMENT = 0');

        foreach($this->statutsReclamation as $statut_reclamation){
            StatutReclamation::create([
                'nom' => $statut_reclamation['nom'],
                'description' => $statut_reclamation['description']
            ]);
        }
    }
}

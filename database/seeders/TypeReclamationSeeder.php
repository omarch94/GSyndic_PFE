<?php

namespace Database\Seeders;

use App\Models\TypeReclamation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeReclamationSeeder extends Seeder
{
    protected $typeReclamations = [
        [
            'nom' => 'Problème de plomberie',
            'description' => 'Réclamation concernant un problème de plomberie dans l\'immeuble.'
        ],
        [
            'nom' => 'Défaut d\'éclairage',
            'description' => 'Réclamation concernant un défaut d\'éclairage dans les parties communes.'
        ],
        [
            'nom' => 'Dysfonctionnement de l\'ascenseur',
            'description' => 'Réclamation concernant un dysfonctionnement de l\'ascenseur de l\'immeuble.'
        ],
        [
            'nom' => 'Nuisances sonores',
            'description' => 'Réclamation concernant des nuisances sonores provenant d\'un voisin.'
        ],
        [
            'nom' => 'Problème de sécurité',
            'description' => 'Réclamation concernant un problème de sécurité dans l\'immeuble.'
        ],
        [
            'nom' => 'Dégradation des parties communes',
            'description' => 'Réclamation concernant la dégradation des parties communes de l\'immeuble.'
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_reclamations')->delete();
        DB::statement('ALTER TABLE type_reclamations AUTO_INCREMENT = 0');

        foreach($this->typeReclamations as $type_reclamation){
            TypeReclamation::create([
                'nom' => $type_reclamation['nom'],
                'description' => $type_reclamation['description']
            ]);
        }
    }
}

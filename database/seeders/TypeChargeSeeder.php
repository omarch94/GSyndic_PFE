<?php

namespace Database\Seeders;

use App\Models\TypeCharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeChargeSeeder extends Seeder
{
    private $typeCharges = [
        [
            'nom' => 'Entretien des parties communes',
            'description' => 'Frais d\'entretien et de maintenance des parties communes de la copropriété.'
        ],
        [
            'nom' => 'Gardiennage',
            'description' => 'Frais de rémunération du gardien ou de la société de gardiennage.'
        ],
        [
            'nom' => 'Assurance',
            'description' => 'Prime d\'assurance pour la copropriété.'
        ],
        [
            'nom' => 'Électricité',
            'description' => 'Frais d\'électricité pour les parties communes.'
        ],
        [
            'nom' => 'Eau',
            'description' => 'Frais d\'eau pour les parties communes.'
        ],
        [
            'nom' => 'Chauffage',
            'description' => 'Frais de chauffage pour les parties communes.'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_charges')->delete();
        DB::statement('ALTER TABLE type_charges AUTO_INCREMENT = 0');

        foreach($this->typeCharges as $type_charge){
            TypeCharge::create([
                'nom' => $type_charge['nom'],
                'description' => $type_charge['description']
            ]);
        }
    }
}

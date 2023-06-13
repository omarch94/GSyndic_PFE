<?php

namespace Database\Seeders;

use App\Models\StatutCharge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutChargeSeeder extends Seeder
{
    private $statutsCharges = [
        [
            'name' => 'En attente',
            'description' => 'La charge est en attente de validation ou de paiement',
        ],
        [
            'name' => 'Payée',
            'description' => 'La charge a été payée intégralement',
        ],
        [
            'name' => 'Partiellement payée',
            'description' => 'Une partie de la charge a été payée',
        ],
        [
            'name' => 'En retard',
            'description' => 'La charge n\'a pas été payée dans les délais',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_charges')->delete();
        DB::statement('ALTER TABLE statut_charges AUTO_INCREMENT = 0');

        foreach($this->statutsCharges as $statut_charge){
            StatutCharge::create([
                'nom' => $statut_charge['name'],
                'description' => $statut_charge['description']
            ]);
        }
    }
}

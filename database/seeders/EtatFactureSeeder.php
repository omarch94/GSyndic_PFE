<?php

namespace Database\Seeders;

use App\Models\EtatFacture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatFactureSeeder extends Seeder
{
    private $etatsFactures = [
        [
            'name' => 'Payée',
            'description' => 'La facture a été payée intégralement',
        ],
        [
            'name' => 'Partiellement payée',
            'description' => 'Une partie de la facture a été payée',
        ],
        [
            'name' => 'En attente de paiement',
            'description' => 'La facture est en attente de paiement',
        ],
        [
            'name' => 'Annulée',
            'description' => 'La facture a été annulée',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etat_factures')->delete();
        DB::statement('ALTER TABLE etat_factures AUTO_INCREMENT = 0');

        foreach($this->etatsFactures as $etat_facture){
            EtatFacture::create([
                'nom' => $etat_facture['name'],
                'description' => $etat_facture['description']
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ModePaiment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModePaimentSeeder extends Seeder
{
    private $modePaiements = [
        [
            'name' => 'Espèces',
            'description' => 'Paiement en espèces',
        ],
        [
            'name' => 'Virement bancaire',
            'description' => 'Paiement par virement bancaire',
        ],
        [
            'name' => 'Chèque',
            'description' => 'Paiement par chèque',
        ],
        // Ajoutez d'autres modes de paiement ici
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mode_paiments')->delete();
        DB::statement('ALTER TABLE mode_paiments AUTO_INCREMENT = 0');

        foreach($this->modePaiements as $mode_paiment){
            ModePaiment::create([
                'nom' => $mode_paiment['name'],
                'description' => $mode_paiment['description']
            ]);
        }
    }
}

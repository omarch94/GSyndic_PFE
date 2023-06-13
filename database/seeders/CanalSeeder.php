<?php

namespace Database\Seeders;

use App\Models\Canal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CanalSeeder extends Seeder
{
    private $canaux = [
        [
            'nom' => 'Physique',
            'description' => 'Communication physique en personne, par exemple lors des réunions.'
        ],
        [
            'nom' => 'Téléphone',
            'description' => 'Communication par téléphone, que ce soit par appel ou par message vocal.'
        ],
        [
            'nom' => 'Email',
            'description' => 'Communication par email, en envoyant des messages électroniques.'
        ],
        [
            'nom' => 'Messagerie instantanée',
            'description' => 'Communication via des applications de messagerie instantanée, telles que WhatsApp ou Slack.'
        ],
        [
            'nom' => 'Courrier postal',
            'description' => 'Communication par courrier postal, en envoyant des lettres ou des documents par la poste.'
        ],
        [
            'nom' => 'En ligne',
            'description' => 'Communication en ligne, par le biais de plateformes ou de forums dédiés.'
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('canals')->delete();
        DB::statement('ALTER TABLE canals AUTO_INCREMENT = 0');

        foreach($this->canaux as $canal){
            Canal::create([
                'nom' => $canal['nom'],
                'description' => $canal['description']
            ]);
        }
    }
}

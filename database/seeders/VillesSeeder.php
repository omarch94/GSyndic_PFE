<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillesSeeder extends Seeder
{
    private $villes = [
        "Casablanca",
        "Rabat",
        "Marrakech",
        "Fès",
        "Tanger",
        "Agadir",
        "Meknès",
        "Oujda",
        "Kenitra",
        "Essaouira",
        "El Jadida",
        "Chefchaouen",
        "Ouarzazate",
        "Safi",
        "Nador",
        "Mohammedia",
        "Taroudant",
        "Beni Mellal",
        "Khouribga",
        "Larache",
        "Taza",
        "Settat",
        "Guelmim",
        "Tétouan",
        "Tiznit",
        "Laâyoune",
        "Al Hoceima",
        "Fkih Ben Salah",
        "Berrechid",
        "Taourirt",
        "Oued Zem",
        "Sefrou",
        "Berkane",
        "Sidi Slimane",
        "Inezgane",
        "Khenifra",
        "Skhirat",
        "Sidi Kacem"
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villes')->delete();
        DB::statement('ALTER TABLE villes AUTO_INCREMENT = 0');

        foreach($this->villes as $ville){
            Ville::create(['nom' => $ville]);
        }
    }
}

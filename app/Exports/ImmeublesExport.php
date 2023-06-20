<?php

namespace App\Exports;

use App\Models\Immeuble;
use Maatwebsite\Excel\Concerns\FromCollection;

class ImmeublesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Immeuble::all();
    }

    public function headings(): array
    {
        return ["ID", "Nom", "Adresse","Code Postal","Ville","Nombre d'étage","Nombre de logement","Année de construction"];
    }

}

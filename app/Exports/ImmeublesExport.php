<?php

namespace App\Exports;

use App\Models\Immeuble;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImmeublesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Immeuble::select('nom','adresse','code_postal','nb_etages','nb_logements','annee_construction','description')->get();
    }

    public function headings(): array
    {
        return ["ID","Nom", "Adresse","Code Postal","Nombre d'étage","Nombre de logement","Année de construction","Description"];
    }

  

}

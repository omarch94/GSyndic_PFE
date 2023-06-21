<?php

namespace App\Imports;

use App\Models\Immeuble;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImmeublesImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Immeuble([
            'nom'     => $row['nom'],
            'adresse'     => $row['Adresse'],
            'code_postal'     => $row['Code Postal'],
            'nb_etages'     => $row["Nombre d'étage"],
            'nb_logements'     => $row['Nombre de logement'],
            'description'=> $row['Description']


        ]);
    }
}

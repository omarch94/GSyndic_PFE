<?php

namespace App\Imports;

use App\Models\Immeuble;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImmeublesImport implements ToModel
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
            'adresse'     => $row['adresse'],
            'code_postal'     => $row['code_postal'],
            'ville_id'     => $row['name'],
            'nb_etages'     => $row['name'],
            'nb_logements'     => $row['nb'],
            'description'=> $row['description']


        ]);
    }
}

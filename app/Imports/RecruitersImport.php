<?php

namespace App\Imports;

use App\Models\Recruiter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RecruitersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //

        return new Recruiter([
            //
            'event_id' => 1,
            'promo_id' => 1,
            'name' => $row['nombre'],
            'lastname' => $row['apellidos'],
            'gender' => $row['genero'],
            'profile' => $row['perfil']
           
        ]);
    }
}

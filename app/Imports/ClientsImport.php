<?php

namespace App\Imports;

use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new Client([
            'policy' => $row['policy'],
            'sub_group' => $row['sub_group'],
            'broker' => $row['broker'],
            'sales_group' => $row['sales_group'],
            'etcv' => $row['etcv'],
            'pol_incept' => $row['pol_incept'],
            'ef_date' => $row['ef_date'],
            'exp_date' => $row['exp_date'],
            'prog_type' => $row['prog_type'],
            'modal_billing' => $row['modal_billing'],
            'ar_officer' => $row['ar_officer'],
            'remarks' => $row['remarks'],
            'branch' => $row['branch'],
            'reg_date' => $row['reg_date'],
            'place_reg' => $row['place_reg'],
            'id_sub' => $row['id_sub'],
            'id_num' => $row['id_num'],
            'tel_no' => $row['tel_no'],
            'n_business' => $row['n_business'],
            'place' => $row['place'],
            'district' => $row['district'],
            'prov' => $row['prov'],
            'rem' => $row['rem'],
            'folder_id' => $row['folder_id'],
        ]);
    }
}

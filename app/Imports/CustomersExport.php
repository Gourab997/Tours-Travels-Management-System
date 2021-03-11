<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersExport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
           
            'fullname' => $row[1],
            'username' => $row[2],
            'email'    => $row[3],
            'password' => $row[4],
            'phone'    => $row[5],
            'address'   => $row[6],
            'gender'    => $row[7]

        ]);
    }
}

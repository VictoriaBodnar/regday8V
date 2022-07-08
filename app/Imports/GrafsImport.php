<?php

namespace App\Imports;

use App\Models\Graf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class GrafsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Graf([
            /*"first_name" => $row['first_name'],
            "last_name" => $row['last_name'],
            "email" => $row['email'],
            "mobile_number" => $row['mobile_number'],
            "role_id" => 2, // User Type User
            "status" => 1,
            "password" => Hash::make('password'),*/

            "kod_consumer" => $row['kod_consumer'],
            "date_zamer" => $row['date_zamer'],
            "type_zamer" => $row['type_zamer'],
            "a1" => $row['a1'],
            "a2" => $row['a2'],
            "a3" => $row['a3'],
            "a4" => $row['a4'],
            "a5" => $row['a5'],
            "a6" => $row['a6'],
            "a7" => $row['a7'],
            "a8" => $row['a8'],
            "a9" => $row['a9'],
            "a10" => $row['a10'],
            "a11" => $row['a11'],
            "a12" => $row['a12'],
            "a13" => $row['a13'],
            "a14" => $row['a14'],
            "a15" => $row['a15'],
            "a16" => $row['a16'],
            "a17" => $row['a17'],
            "a18" => $row['a18'],
            "a19" => $row['a19'],
            "a20" => $row['a20'],
            "a21" => $row['a21'],
            "a22" => $row['a22'],
            "a23" => $row['a23'],
            "a24" => $row['a24'],
            "a_cyt" => $row['a_cyt'],
            "user_id" => Auth::user()->id,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);
    }
}

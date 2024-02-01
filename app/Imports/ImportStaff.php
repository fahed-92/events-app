<?php

namespace App\Imports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportStaff implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Staff([
            'full_name' => $row[1],
            'position' => $row[0],
            'date_of_join' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[2]),
            'date_of_end' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'account_name' => $row[11],
            'bank_name' => $row[12],
            'iban_number' => $row[13],
            'note' => $row[15],
            // Add more columns as needed
        ]);
    }



}

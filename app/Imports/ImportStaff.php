<?php

namespace App\Imports;

use App\Models\Staff;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportStaff implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Staff([
            'position' => $row['position'],
            'full_name' => $row['name'],
            'date_of_join' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['start_date']),
            'date_of_end' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['end_date']),
            'account_name' => $row['account_name'],
            'bank_name' => $row['bank_name'],
            'iban_number' => $row['iban_number'],
            'note' => $row['not'],
            // Add more columns as needed
        ]);
    }



}

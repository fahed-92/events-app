<?php

namespace App\Imports;

use App\Models\Store;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImoortStoreItems implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
    }

    public function model(array $row)
    {
        // Define how to create a model from the Excel row data
        return new Store([
            'item' => $row[1],
            'quantity' => $row[43],
            'price' => $row[7],
            'photo' => $row[5],
            // Add more columns as needed
        ]);
    }
}

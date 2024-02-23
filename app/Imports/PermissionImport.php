<?php

namespace App\Imports;

use http\Env\Response;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\ToModel;

class PermissionImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
       // dd($row);
        return new Permission([
            'name'     => $row[0],
            'group_name'    => $row[1],
        ]);
    }
}

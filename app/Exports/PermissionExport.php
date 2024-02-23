<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermissionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Permission::all();//for all data
        return Permission::select('name','group_name')->get();
    }
    public function headings(): array
    {
        return [
            'Permission Name',
            'Group Name',
        ];
    }
}

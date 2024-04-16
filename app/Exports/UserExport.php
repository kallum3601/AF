<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = new User(); // Instantiate the User model
        return $user->getUsers(); // No need to call get() again
    }

    public function headings(): array
    {
        return [
            'ID',
            'Username',
            'Fullname',
            'Main Address',
        ];
    }
}

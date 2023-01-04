<?php

namespace App\Exports;

use App\Models\User;
use App\Models\crm_details;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUser implements FromCollection, WithHeadings
{
    protected $data;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }
    
    public function headings(): array
    {
        return [
            'Id',
            'Agent Name',
            'Call Type',
            'Phone Number',
            'Name',
            'Query type',
            'Gender',
            'Call remarks',
            'Alt Phone Number',
            'Address',
            'verbatim',
            'Created at',
            'Updated at',
        ];
    }
}

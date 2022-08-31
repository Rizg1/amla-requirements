<?php

namespace App\Exports;

use App\Client;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{
    protected $from_date;

    protected $end_date;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($from_date, $end_date) {
        $this->from_date = $from_date;
        $this->end_date = $end_date;
    }   

    public function collection()
        {
            $data = Client::query()->whereDate('created_at','>=',$this->from_date)->whereDate('created_at','<=',$this->end_date)
                        ->select( 'folder_id','policy','etcv')
                        ->orderBy('id', 'desc');
    
             return $data;
        }

        public function headings(): array
        {
            return [
                'Company',
                'Policy Number',
                'ETCV',
                
            ];
        }
}

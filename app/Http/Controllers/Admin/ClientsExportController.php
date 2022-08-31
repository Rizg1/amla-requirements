<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\StoreExportRequest;

class ClientsExportController extends Controller
{
    //since isang function lang naman tatawagin mo dito pwede na tong invokable
    public function __invoke(StoreExportRequest $request) 
    { 
        $data = $request->validated();
        
        $from_date = Carbon::parse($data['from_date'])->format('Y-m-d'); 
        $end_date = Carbon::parse($data['end_date'])->format('Y-m-d');
        // dd($from_date, $end_date);

        return Excel::download(new ClientsExport($from_date, $end_date), 'AMLA.xlsx');   
    }
   
}

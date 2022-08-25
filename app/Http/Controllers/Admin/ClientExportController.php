<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ClientsExport;

class ClientExportController extends Controller
{
    public function export() 
    {
        dd(Client::all());
        
        return Excel::download(new ClientsExport, 'Clients.xlsx');
    }
}

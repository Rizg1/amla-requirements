<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ClientsExport;
use Illuminate\Http\Request as NRequest;
class ClientExportController extends Controller
{
    public function export() 
    {
        
        return Excel::download(new ClientExport, 'Clients.xlsx');
    }
}

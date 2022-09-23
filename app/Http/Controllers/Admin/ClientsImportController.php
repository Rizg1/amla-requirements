<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Imports\ClientsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class ClientsImportController extends Controller
{
    public function __invoke(Request $request)
    {
    Excel::import(new ClientsImport, $request->file('file'));
    return redirect()->route('admin.clients.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\File;

use App\Client;
use App\Folder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request as NRequest;
use App\Http\Requests\Admin\StoreClientsRequest;
use App\Http\Requests\Admin\UpdateClientsRequest;

class ClientsController extends Controller
{   
    /**
     * Display a listing of Clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (!Gate::allows('client_access')){
            return abort (401);
        }

        if ($filterBy = Request::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Client.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Client.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('client_delete')) {
                return abort(401);
            }
            $clients = Client::onlyTrashed()->get();
        } else {
            $clients = Client::all();
        }

        return view ('admin.clients.index', compact('clients'));

    }
    public function create(){
        if (! Gate::allows('client_create')) {
            return abort(401);
        }
        
        $folders = \App\Folder::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        
        return view('admin.clients.create', compact('created_bies', 'folders'));

    }

    public function edit(Client $client)
    {
        $files = File::where('folder_id', $client->folder_id)->get();

        $filenames = [];
        foreach ($files as $file) {
            foreach ($file->getMedia('filename') as $f) {
                $filenames[] = ['id' => $f->id, 'filename' => $f->file_name];
            }
        }
        // dd($client->app_form);
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        
        $client->load('folder', 'appForm', 'kycForm', 'enrollList', 'signedProposal', 'secReg', 'articlesIncorp', 'byLaws', 'corpSec', 'certList', 'validId', 'stateMent');

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.clients.edit', compact('client', 'created_bies', 'filenames'));
    }

    public function store(StoreClientsRequest $request)
    {
        
        if (! Gate::allows('client_create')) {
            return abort(401);
        }

        // dd(gettype(request()->app_form));
        $client = Client::create($request->all());

        return redirect()->route('admin.clients.index');
    }
    public function show($id)
    {
        if (! Gate::allows('client_view')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$clients = \App\File::where('client_id', $id)->get();

        $client = Client::findOrFail($id);
        $userClientsCount = File::where('created_by_id', Auth::getUser()->id)->count();

        return view('admin.clients.show', compact('client', 'client', 'userClientsCount'));
    }
    public function update(UpdateClientsRequest $request, $id)
    {
        if (! Gate::allows('client_edit')) {
            return abort(401);
        }
        $client = Client::findOrFail($id);

        $data = $request->validated();
        // dd($data);

        $client->update($data);


        return redirect()->route('admin.clients.index');
    }
    public function destroy(Client $client)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        
        $client->delete();

        return redirect()->route('admin.clients.index');
    }
    public function massDestroy(NRequest $request)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Client::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }

    public function restore($id)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->restore();

        return redirect()->route('admin.clients.index');
    }

    public function perma_del($id)
    {
        if (! Gate::allows('client_delete')) {
            return abort(401);
        }
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->forceDelete();

        return redirect()->route('admin.clients.index');
    }

    public function getFiles(NRequest $request)
    {
        $company_id = $request->company_id; //company id

        $files = File::where('folder_id', $company_id)->get();

        $filenames = []; //array
        foreach ($files as $file) {
            foreach ($file->getMedia('filename') as $f) {
                $filenames[] = ['id' => $f->id, 'filename' => $f->file_name]; // company id, filename
            }
        }

        return $filenames; //return all filenames associated to the company helllo worlddd
    }
    
    
}

@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>
    @can('client_create')
    <p>
     <a href="{{ route('admin.clients.create') }}" class="btn btn-success">Add New Details (For the Company)</a>
        
    </p>
    @endcan

    @can('client_delete')
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.clients.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li>
            |
            <li><a href="{{ route('admin.clients.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>
        <div class="panel-body table-responsive">
            <table id="myTable" class="table table-bordered table-striped {{ count($clients) > 0 ? 'datatable' : '' }} @can('client_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('client_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>@endif
                    @endcan

                    <th>Company Name</th>
                    <th>Application for HMO</th>
                    <th>KYC Form</th>
                    <th>Member Enrollment List</th>
                    <th>Signed Proposal</th>
                    <th>Sec Registration</th>
                    <th>Articles Of Incorporation</th>
                    <th>Copies of By-Laws</th>
                    <th>Corporate Secretary Cert</th>
                    <th>Certified List</th>
                    <th>Copy of Valid IDs</th>
                    <th>Sworn Statement</th>
                    <th>Policy No.</th>
                    <th>Subgroup</th>
                    <th>With Top 5 Requirements</th>
                    <th>Sales/Agent/Broker</th>
                    <th>Sales Group</th>
                    <th>ETCV</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Date Submitted</th>
                    <th>Date Submitted of Lacking Doc</th>
                    <th>Policy Inception</th>
                    <th>Policy Effective Date</th>
                    <th>Policy Expiry Date</th>
                    <th>Program Type</th>
                    <th>Month</th>
                    <th>Modal Billing</th>
                    <th>AR Officer</th>
                    <th>Remarks</th>
                    <th>Sales Group</th>
                    <th>Branch</th>
                    <th>Reg Date</th>
                    <th>Place Registration</th>
                    <th>ID Type Submitted</th>
                    <th>ID Number</th>
                    <th>Tel No.</th>
                    <th>Nature of Business</th>
                    <th>Room/Street/Bldg/Brgy</th>
                    <th>Distric Town City</th>
                    <th>Province Country Zip</th>
                    <th>Remarks</th>


                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($clients) > 0)
                    @foreach ($clients as $client)
                       
                        <tr data-entry-id="{{ $client->id }}">
                            @can('client_delete')
                                @if ( request('show_deleted') != 1 )
                                    <td></td>@endif
                            @endcan

                            <td field-key='name'>
                                @can('client_view')
                                    {{$client->folder->name}}
                                    </td>
                                @endcan
                                <td field-key='app_form'>
                                @if(!is_null($client->app_form))
                                <a href="{{ asset('storage/'. $client->appForm->model_id. '/' . $client->appForm->file_name) }}" target="_blank">{{$client->appForm->file_name ?? ''}}</a>

                                @else
                                N/A
                                @endif
                            </td>
                               
                            <td field-key='app_form'>
                                @if(!is_null($client->kyc_form))
                                <a href="{{ asset('storage/'. $client->kycForm->model_id. '/' . $client->kycForm->file_name) }}" target="_blank">{{$client->kycForm->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                                
                            <td field-key='enrollment_list'>
                               @if(!is_null($client->enrollList))
                               <a href="{{ asset('storage/'. $client->enrollList->model_id. '/' . $client->enrollList->file_name) }}" target="_blank">{{$client->enrollList->file_name ?? ''}}   </a>
                                @else
                                N/A
                                @endif
                            </td>
                                
                            <td field-key='signed_proposal'>
                                @if(!is_null($client->signedProposal))
                                <a href="{{ asset('storage/'. $client->signedProposal->model_id. '/' . $client->signedProposal->file_name) }}" target="_blank">{{$client->signedProposal->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                            <td field-key='sec_reg'>
                                @if(!is_null($client->secReg))
                                <a href="{{ asset('storage/'. $client->secReg->model_id. '/' . $client->secReg->file_name) }}" target="_blank">{{$client->secReg->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                            <td field-key='articles_incorp'>
                                @if(!is_null($client->articlesIncorp))
                                <a href="{{ asset('storage/'. $client->articlesIncorp->model_id. '/' . $client->articlesIncorp->file_name) }}" target="_blank">{{$client->articlesIncorp->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                           
                            <td field-key='by_laws'>
                                @if(!is_null($client->byLaws))
                                <a href="{{ asset('storage/'. $client->byLaws->model_id. '/' . $client->byLaws->file_name) }}" target="_blank">{{$client->byLaws->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                           
                            <td field-key='corp_sec'>
                                @if(!is_null($client->corpSec))
                                <a href="{{ asset('storage/'. $client->corpSec->model_id. '/' . $client->corpSec->file_name) }}" target="_blank">{{$client->corpSec->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                            
                            <td field-key='cert_list'>
                                @if(!is_null($client->certList))
                                <a href="{{ asset('storage/'. $client->certList->model_id. '/' . $client->certList->file_name) }}" target="_blank">{{$client->certList->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                            
                            <td field-key='valid_id'>
                                @if(!is_null($client->validId))
                                <a href="{{ asset('storage/'. $client->validId->model_id. '/' . $client->validId->file_name) }}" target="_blank">{{$client->validId->file_name ?? ''}}</a>
                                @else
                                N/A
                                @endif
                            </td>
                           
                            <td field-key='statement'>
                                @if(!is_null($client->stateMent))
                                <a href="{{ asset('storage/'. $client->stateMent->model_id. '/' . $client->stateMent->file_name) }}" target="_blank"> {{$client->stateMent->file_name ?? ''}} </a>
                                @else
                                N/A
                                @endif
                            </td>
                            
                            <td field-key='policy'>
                                 @can('client_view')
                                {{$client->policy}}
                            </td>
                            @endcan
                            <td field-key='sub_group'>
                                 @can('client_view')
                                {{$client->sub_group}}
                            </td>
                            @endcan
                            <td field-key='top_req'>
                                 @can('client_view')
                                {{$client->top_req}}
                            </td>
                            @endcan
                            <td field-key='broker'>
                                 @can('client_view')
                                {{$client->broker}}
                            </td>
                            @endcan
                            <td field-key='sales_group'>
                                 @can('client_view')
                                {{$client->sales_group}}
                            </td>
                            @endcan
                            <td field-key='etcv'>
                                 @can('client_view')
                                {{$client->etcv}}
                            </td>
                            @endcan
                            <td field-key='category'>
                                 @can('client_view')
                                {{$client->category}}
                            </td>
                            @endcan
                            <td field-key='status'>
                                 @can('client_view')
                                {{$client->status}}
                            </td>
                            @endcan
                            <td field-key='d_sub'>
                                 @can('client_view')
                                {{$client->d_sub}}
                            </td>
                            @endcan
                            <td field-key='lsub_doc'>
                                 @can('client_view')
                                {{$client->lsub_doc}}
                            </td>
                            @endcan
                            <td field-key='pol_incept'>
                                 @can('client_view')
                                {{$client->pol_incept}}
                            </td>
                            @endcan
                            <td field-key='ef_date'>
                                 @can('client_view')
                                {{$client->ef_date}}
                            </td>
                            @endcan
                            <td field-key='exp_date'>
                                 @can('client_view')
                                {{$client->exp_date}}
                            </td>
                            @endcan
                            <td field-key='prog_type'>
                                 @can('client_view')
                                {{$client->prog_type}}
                            </td>
                            @endcan
                            <td field-key='month'>
                                 @can('client_view')
                                {{$client->month}}
                            </td>
                            @endcan
                            <td field-key='modal_billing'>
                                 @can('client_view')
                                {{$client->modal_billing}}
                            </td>
                            @endcan
                            <td field-key='ar_officer'>
                                 @can('client_view')
                                {{$client->ar_officer}}
                            </td>
                            @endcan
                            <td field-key='remarks'>
                                 @can('client_view')
                                {{$client->remarks}}
                            </td>
                            @endcan
                            <td field-key='sale_g'>
                                 @can('client_view')
                                {{$client->sale_g}}
                            </td>
                            @endcan
                            <td field-key='branch'>
                                 @can('client_view')
                                {{$client->branch}}
                            </td>
                            @endcan
                            <td field-key='reg_date'>
                                 @can('client_view')
                                {{$client->reg_date}}
                            </td>
                            @endcan
                            <td field-key='place_reg'>
                                 @can('client_view')
                                {{$client->place_reg}}
                            </td>
                            @endcan
                            <td field-key='id_sub'>
                                 @can('client_view')
                                {{$client->id_sub}}
                            </td>
                            @endcan
                            <td field-key='id_num'>
                                 @can('client_view')
                                {{$client->id_num}}
                            </td>
                            @endcan
                            <td field-key='tel_no'>
                                 @can('client_view')
                                {{$client->tel_no}}
                            </td>
                            @endcan
                            <td field-key='n_business'>
                                 @can('client_view')
                                {{$client->n_business}}
                            </td>
                            @endcan
                            <td field-key='place'>
                                 @can('client_view')
                                {{$client->place}}
                            </td>
                            @endcan
                            <td field-key='district'>
                                 @can('client_view')
                                {{$client->district}}
                            </td>
                            @endcan
                            <td field-key='prov'>
                                 @can('client_view')
                                {{$client->prov}}
                            </td>
                            @endcan
                            <td field-key='rem'>
                                 @can('client_view')
                                {{$client->rem}}
                            </td>
                            @endcan
                            
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('client_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.clients.restore', $client->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('client_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.clients.perma_del', $client->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan`
                                </td>
                            @else
                                <td>
                                    @can('client_edit')
                                        <a href="{{ route('admin.clients.edit',[$client->id]) }}" class="btn btn-xs btn-warning">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('client_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.clients.destroy', $client->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="43">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    
    <script>
        @can('folder_delete')
                @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.clients.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection
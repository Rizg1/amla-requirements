@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>
    
    {!! Form::model($client, ['method' => 'PUT', 'route' => ['admin.clients.update', $client->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 fom-group">
                    <input type="hidden" name="folder_id" value="{{ $client->folder->id }}">
                </div>
                <div class="col-xs-12 form-group">
                    {{-- {!! Form::label('name', trans('quickadmin.clients.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                     --}}
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company" class="form-control" value="{{ $client->folder->name }}" disabled readonly required>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="app_form">Application for HMO</label>
                    <select name="app_form" id="app_form" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}" {{ ($client->app_form == $filename['id']) ? 'selected' : '' }}> {{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    
                    <label for="kyc_form">KYC Form</label>
                    <select name="kyc_form" id="kyc_form" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}" {{ ($client->kyc_form == $filename['id']) ? 'selected' : '' }}> {{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="enrollment_list">Member Enrollment List</label>
                    <select name="enrollment_list" id="enrollment_list" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                        <option value="{{ $filename['id'] }}" {{ ($client->enrollment_list == $filename['id']) ? 'selected' : '' }}> {{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="signed_proposal">Signed Proposal</label>
                    <select name="signed_proposal" id="signed_proposal" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                        <option value="{{ $filename['id'] }}" {{ ($client->signed_proposal == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sec_reg">Sec Registration</label>
                    <select name="sec_reg" id="sec_reg" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                        <option value="{{ $filename['id'] }}" {{ ($client->sec_reg == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="articles_incorp">Articles Of Incorporation</label>
                    <select name="articles_incorp" id="articles_incorp" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                        <option value="{{ $filename['id'] }}" {{ ($client->articles_incorp == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="by_laws">Copies of By-Laws</label>
                    <select name="by_laws" id="by_laws" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}"{{ ($client->by_laws == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="gis">GIS</label>
                    <select name="gis" id="gis" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}"{{ ($client->gis == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="corp_sec">Corporate Secretary Cert</label>
                    <select name="corp_sec" id="corp_sec" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}" {{ ($client->corp_sec == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="cert_list">Certified List Under Oath</label>
                    <select name="cert_list" id="cert_list" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}" {{ ($client->cert_list == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="valid_id">Copy of Valid IDs</label>
                    <select name="valid_id" id="valid_id" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}" {{ ($client->valid_id == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="statement">Certificate of Beneficial Owner</label>
                    <select name="statement" id="statement" class="form-control select2">
                        <option value="">N/A</option>
                        @foreach ($filenames as $filename)
                            <option value="{{ $filename['id'] }}" {{ ($client->statement == $filename['id']) ? 'selected' : '' }}>{{ $filename['filename'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="policy">Policy No.</label>
                    <input type="text" name="policy" id="policy" class="form-control" value="{{$client->policy}}" >
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sub_group">Subgroup</label>
                    <input type="text" name="sub_group" id="sub_group" class="form-control" value="{{$client->sub_group}}">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="top_req">With Top 5 Requirements</label>
                    <input type="text" name="top_req" id="top_req" class="form-control" value="{{$client->top_req}}">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="broker">Sales/Agent/Broker</label>
                    <input type="text" name="broker" id="broker" class="form-control" value="{{$client->broker}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sales_group">Sales Group</label>
                    <input type="text" name="sales_group" id="sales_group" class="form-control" value="{{$client->sales_group}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="etcv">ETCV</label>
                    <input type="text" name="etcv" id="etcv" class="form-control" value="{{$client->etcv}}">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{$client->category}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" value="{{$client->status}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="d_sub">Date Submitted</label>
                    <input type="text" name="d_sub" id="d_sub" class="form-control" value="{{$client->d_sub}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="lsub_doc">Date Submitted of Lacking Doc</label>
                    <input type="text" name="lsub_doc" id="lsub_doc" class="form-control" value="{{$client->lsub_doc}}">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="pol_incept">Policy Inception</label>
                    <input type="text" name="pol_incept" id="pol_incept" class="form-control" value="{{$client->pol_incept}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="ef_date">Policy Effective Date</label>
                    <input type="text" name="ef_date" id="ef_date" class="form-control" value="{{$client->ef_date}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="exp_date">Policy Expiry Date</label>
                    <input type="text" name="exp_date" id="exp_date" class="form-control" value="{{$client->exp_date}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="prog_type">Program Type</label>
                    <input type="text" name="prog_type" id="prog_type" class="form-control" value="{{$client->prog_type}}">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="month">Month</label>
                    <input type="text" name="month" id="month" class="form-control" value="{{$client->month}}">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="modal_billing">Modal Billing</label>
                    <input type="text" name="modal_billing" id="modal_billing" class="form-control" value="{{$client->modal_billing}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="ar_officer">AR Officer</label>
                    <input type="text" name="ar_officer" id="ar_officer" class="form-control" value="{{$client->ar_officer}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="remarks">Status</label>
                    <select name="remarks" id="remarks" class="form-control select2">
                            <option value="{{$client->remarks}}">N/A</option>
                            @foreach ($status as $f)
                                <option value="{{$f}}" {{ ($client->remarks == $f) ? 'selected' : ''}} >{{$f}} </option>
                            @endforeach
                        </select>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sale_g">Sales Group</label>
                    <input type="text" name="sale_g" id="sale_g" class="form-control" value="{{$client->sale_g}}">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="branch">Branch</label>
                    <input type="text" name="branch" id="branch" class="form-control"  value="{{$client->branch}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="reg_date">Reg Date</label>
                    <input type="text" name="reg_date" id="reg_date" class="form-control" value="{{$client->reg_date}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="place_reg">Place Registration</label>
                    <input type="text" name="place_reg" id="place_reg" class="form-control" value="{{$client->place_reg}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="id_sub">ID Type Submitted</label>
                    <input type="text" name="id_sub" id="id_sub" class="form-control" value="{{$client->id_sub}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="id_num">ID Number</label>
                    <input type="text" name="id_num" id="id_num" class="form-control"  value="{{$client->id_num}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="tel_no">Tel No.</label>
                    <input type="text" name="tel_no" id="tel_no" class="form-control" value="{{$client->tel_no}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="n_business">Nature of Business</label>
                    <input type="text" name="n_business" id="n_business" class="form-control"  value="{{$client->n_business}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="place">Room No./Office Name Bldg./House No./Street Subd./Brgy.</label>
                    <input type="text" name="place" id="place" class="form-control" value="{{$client->place}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="district">District Town City</label>
                    <input type="text" name="district" id="district" class="form-control" value="{{$client->district}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="prov">Province Country Zip</label>
                    <input type="text" name="prov" id="prov" class="form-control" value="{{$client->prov}}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="rem">Remarks</label>
                    <input type="text" name="rem" id="rem" class="form-control" value="{{$client->rem}}">
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop


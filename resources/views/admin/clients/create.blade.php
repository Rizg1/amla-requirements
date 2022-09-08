@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.clients.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {{-- {!! Form::label('folder_id', trans('quickadmin.files.fields.folder').'*', ['class' => 'control-label', 'id' => 'company_id']) !!}
                    {!! Form::select('folder_id', $folders, old('folder_id'), ['class' => 'form-control select2', 'required' => '']) !!} --}}
                    <label for="company">Company</label>
                    <select name="folder_id" id="company" class="form-control select2" required>
                        @foreach ($folders as $key => $folder)
                            <option value="{{ $key }}">{{ $folder }}</option>
                        @endforeach
                    </select>
                    
                    <p class="help-block"></p>
                    @if($errors->has('folder_id'))
                        <p class="help-block">
                            {{ $errors->first('folder_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="app_form">Application Form</label>
                    <select name="app_form" id="app_form" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="kyc_form">KYC Form</label>
                    <select name="kyc_form" id="kyc_form" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="enrollment_list">Member Enrollmentlist</label>
                    <select name="enrollment_list" id="enrollment_list" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="signed_proposal">Signed Proposal</label>
                    <select name="signed_proposal" id="signed_proposal" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sec_reg">Sec Registration</label>
                    <select name="sec_reg" id="sec_reg" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="articles_incorp">Articles Of Incorporation</label>
                    <select name="articles_incorp" id="articles_incorp" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="by_laws">Copies of By-Laws</label>
                    <select name="by_laws" id="by_laws" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="gis">GIS</label>
                    <select name="gis" id="gis" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="corp_sec">Corporate Secretary Certificate</label>
                    <select name="corp_sec" id="corp_sec" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="cert_list">Certified List Under Oath</label>
                    <select name="cert_list" id="cert_list" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="valid_id">Copy of Valid IDs</label>
                    <select name="valid_id" id="valid_id" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="statement">Certificate of Beneficial Owner</label>
                    <select name="statement" id="statement" class="form-control select2">
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="policy">Policy Number</label>
                    <input type="text" name="policy" id="policy" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sub_group">Subgroup</label>
                    <input type="text" name="sub_group" id="sub_group" class="form-control">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="top_req">With Top 5 Requirements</label>
                    <input type="text" name="top_req" id="top_req" class="form-control">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="broker">Sales/Agent/Broker</label>
                    <input type="text" name="broker" id="broker" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sales_group">Sales Group</label>
                    <input type="text" name="sales_group" id="sales_group" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="etcv">ETCV</label>
                    <input type="text" name="etcv" id="etcv" class="form-control">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="form-control">
                </div>
            </div> 
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control">
                </div>
            </div> 
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="d_sub">Date Submitted</label>
                    <input type="text" name="d_sub" id="d_sub" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="lsub_doc">Date Submitted of Lacking Doc</label>
                    <input type="text" name="lsub_doc" id="lsub_doc" class="form-control">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="pol_incept">Policy Inception</label>
                    <input type="text" name="pol_incept" id="pol_incept" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="ef_date">Policy Effective Date</label>
                    <input type="text" name="ef_date" id="ef_date" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="exp_date">Policy Expiry Date</label>
                    <input type="text" name="exp_date" id="exp_date" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="prog_type">Program Type</label>
                    <input type="text" name="prog_type" id="prog_type" class="form-control">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="month">Month</label>
                    <input type="text" name="month" id="month" class="form-control">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="modal_billing">Modal Billing</label>
                    <input type="text" name="modal_billing" id="modal_billing" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="ar_officer">AR Officer</label>
                    <input type="text" name="ar_officer" id="ar_officer" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="remarks">Remarks</label>
                    <input type="text" name="remarks" id="remarks" class="form-control">
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="sale_g">Sales Group</label>
                    <input type="text" name="sale_g" id="sale_g" class="form-control">
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="branch">Branch</label>
                    <input type="text" name="branch" id="branch" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="reg_date">Reg Date</label>
                    <input type="text" name="reg_date" id="reg_date" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="place_reg">Place Registration</label>
                    <input type="text" name="place_reg" id="place_reg" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="id_sub">ID Type Submitted</label>
                    <input type="text" name="id_sub" id="id_sub" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="id_num">ID Number</label>
                    <input type="text" name="id_num" id="id_num" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="tel_no">Tel No.</label>
                    <input type="text" name="tel_no" id="tel_no" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="n_business">Nature of Business</label>
                    <input type="text" name="n_business" id="n_business" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="place">Room No./Office Name Bldg./House No./Street Subd./Brgy.</label>
                    <input type="text" name="place" id="place" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="district">District Town City</label>
                    <input type="text" name="district" id="district" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="prov">Province Country Zip</label>
                    <input type="text" name="prov" id="prov" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="rem">Remarks</label>
                    <input type="text" name="rem" id="rem" class="form-control">
                </div>
            </div>


        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@push('javascript')
    <script>
        $(document).ready(function(){
            $('#company').on('change', function () {
                var company_id = $('#company').val()

                $.ajax({
                    url: "{{ route('admin.clients.get.files') }}", // /getfiles endpoint
                    method: 'post',
                    data: {
                        _token: "{{ csrf_token() }}",
                        company_id: company_id // pass the company id
                },
                success: function( data, textStatus, jQxhr ){
                    $('#app_form').empty()
                    $('#kyc_form').empty()
                    $('#enrollment_list').empty()
                    $('#signed_proposal').empty()
                    $('#sec_reg').empty()
                    $('#articles_incorp').empty()
                    $('#by_laws').empty()
                    $('#gis').empty()
                    $('#corp_sec').empty()
                    $('#cert_list').empty()
                    $('#valid_id').empty()
                    $('#statement').empty()
                    $("#app_form").append('<option value="">Select option</option>')
                    $("#kyc_form").append('<option value="">Select option</option>')
                    $("#enrollment_list").append('<option value="">Select option</option>')
                    $("#signed_proposal").append('<option value="">Select option</option>')
                    $("#sec_reg").append('<option value="">Select option</option>')
                    $("#articles_incorp").append('<option value="">Select option</option>')
                    $("#by_laws").append('<option value="">Select option</option>')
                    $("#gis").append('<option value="">Select option</option>')
                    $("#corp_sec").append('<option value="">Select option</option>')
                    $("#cert_list").append('<option value="">Select option</option>')
                    $("#valid_id").append('<option value="">Select option</option>')
                    $("#statement").append('<option value="">Select option</option>')
                    $.each(data ,function(key, value){
                        $('#app_form').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#kyc_form').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#enrollment_list').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#signed_proposal').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#sec_reg').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#articles_incorp').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#by_laws').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#gis').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#corp_sec').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#cert_list').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#valid_id').append($('<option>', {value: value['id'], text: value['filename']}))
                        $('#statement').append($('<option>', {value: value['id'], text: value['filename']}))
                        
                    })
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });
            })
        })
    </script>
@endpush


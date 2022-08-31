@extends('layouts.app')

@section('content')
    <h3 class="page-title">{{$folder->name}}</h3>
    <p>
        <!-- @if (Auth::getUser()->role_id == 2 && $userFilesCount > 150)
            <a href="{{url('admin/files/create?folder_id=' . $folder->id)}}" class="btn btn-success disabled">Add file to this Company</a>
            
        @else
            <a href="{{url('admin/files/create?folder_id=' . $folder->id)}}" class="btn btn-success">Add New File to this Company</a>
        @endif -->
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            Files
        </div>
        {{--<div class="tab-content">--}}

        {{--<div role="tabpanel" class="tab-pane active" id="files">--}}
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($files) > 0 ? 'datatable' : '' }} @can('file_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('file_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>@endif
                    @endcan

                    <th>Filename</th>
                    <th>Company</th>
                    <th>Form Type</th>
                    <th>Date Uploaded</th>
                    @if( request('show_deleted') == 1 )

                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($files) > 0)
                    @foreach ($files as $file)
                        <tr data-entry-id="{{ $file->id }}">
                            @can('file_delete')
                                @if ( request('show_deleted') != 1 )
                                    <td></td>@endif
                            @endcan
                            <td field-key='filename'> 
                                @foreach($file->getMedia('filename') as $media)
                                    <p class="form-group">
                                        <a href="#" data-target="#filemodal{{ $media->id }}" data-toggle="modal">{{ $media->file_name }}</a>
                                    </p>
                                    
                                    <div class="modal" id="filemodal{{ $media->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                <embed src="{{ asset('storage/'. $media->model_id. '/' . $media->file_name) }}" frameborder="0" width="100%" height="800px"></embed>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach</td>
                                
                            <td field-key='folder'>{{ $file->folder->name }}</td>
                            <td field-key='Form Type'>
                            <!-- <select name="form_id" id="form" class="input-size select2">
                                        
                                @foreach ($forms as $form)
                                <option value="{{ $form }}">{{ $form }}</option>
                                @endforeach
                                       
                            </select></td> -->
                            <td for='dateuploaded'>{{ $file->created_at->isoFormat('d-MMM-Y') }}</td>
                            @if( request('show_deleted') == 1 )
                                <td>
                                    @can('file_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'POST',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.files.restore', $file->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                    @can('file_delete')
                                        {!! Form::open(array(
        'style' => 'display: inline-block;',
        'method' => 'DELETE',
        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
        'route' => ['admin.files.perma_del', $file->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>
                                    <a href="{{url('/admin/' . $file->uuid . '/download')}}" class="btn btn-xs btn-info">Download</a>
                                    @can('file_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['admin.files.destroy', $file->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    {{--</div>--}}
    {{--</div>--}}

    <p>&nbsp;</p>

    <a href="{{ route('admin.folders.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>


@stop

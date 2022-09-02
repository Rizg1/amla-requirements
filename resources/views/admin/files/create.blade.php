@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.files.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.files.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                <label for="company">Company</label>
                    
                    {!! Form::select('folder_id', $folders, old('folder_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    
                    <!-- <select name="folder_id" id="company" class="form-control select2" required>
                        @foreach ($folders as $key => $folder)
                            <option value="{{ $key }}">{{ $folder }}</option>
                        @endforeach
                    </select> -->
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
                    {!! Form::label('filename', trans('quickadmin.files.fields.filename').'*', ['class' => 'control-label']) !!}
                    {!! Form::file('filename[]', [
                        'multiple',
                        'class' => 'form-control file-upload',
                        'data-url' => route('admin.media.upload'),
                        'data-bucket' => 'filename',
                        'data-filekey' => 'filename',
                        'id' => 'my_id',
                        'accept' => '.pdf,.png,.jpeg,.jpg'
                        ]) !!}
                    <p class="help-block"></p>
                    <div class="photo-block">
                        <div class="progress-bar form-group">&nbsp;</div>
                        <div class="files-list"></div>
                    </div>
                    @if($errors->has('filename'))
                        <p class="help-block">
                            {{ $errors->first('filename') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger', 'id' => 'submitBtn']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('quickadmin/plugins/fileUpload/js/jquery.fileupload.js') }}"></script>
    <script>
        $(function () {
            var exfiles = '<?php echo $userFilesCount; ?>';
            var existingFiles = Number(exfiles);


            $('input#my_id').change(function () {
                var uploadingFiles = $(this)[0].files;
                var totalCount = uploadingFiles.length + existingFiles;

                var Id = '<?php echo $roleId; ?>';
                var roleId = Number(Id);
                console.log(roleId);
console.log(totalCount);
                if (totalCount > 1000 && roleId == 2) {
                    alert("you have already reach the limit of 1000 files." +
                            "Please contact your administrator");
                    $('.file-upload').each(function () {
                        var $this = $(this);

                        $(this).fileupload({
                            dataType: 'json',
                            formData: {
                                model_name: 'File',
                                bucket: $this.data('bucket'),
                                file_key: $this.data('filekey'),
                                _token: '{{ csrf_token() }}'

                            },

                            add: function (e, data) {
                                data.abort();
                            }
                        })
                    });
                    document.getElementById("submitBtn").classList.add('disabled');
                }
            });

            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();

                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'File',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        _token: '{{ csrf_token() }}'

                    },

                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
                            $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                            $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                            if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                            }
                            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                        });
                        $parent.find('.progress-bar').hide().css(
                                'width',
                                '0%'
                        );
                    }

                })

            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
                return false;
            });
        });
    </script>
@stop
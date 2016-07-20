@extends('layouts.adminlayout')
@section('cssloc')
	{{ Html::style('assets/css/plugins/dataTables/datatables.min.css') }}
    {{ Html::style('assets/css/plugins/select2/select2.min.css') }}
    {{ Html::style('assets/css/formValidation.min.css') }}
    {{ Html::style('assets/css/intlTelInput.css') }}
    {{ Html::style('assets/css/Lobibox.min.css') }}
@stop
@section('jsloc')
	{{ Html::script('assets/js/plugins/jeditable/jquery.jeditable.js') }}
	{{ Html::script('assets/js/plugins/dataTables/datatables.min.js') }}
    {{ Html::script('assets/js/plugins/select2/select2.full.min.js') }}
    {{ Html::script('assets/js/formValidation.min.js') }}
    {{ Html::script('assets/js/framework/bootstrap.min.js') }}
    {{ Html::script('assets/js/intlTelInput.min.js') }}
    {{ Html::script('assets/js/Lobibox.min.js') }}
	<script>
        @if (Session::has('success'))
               Lobibox.notify('success', {
                    rounded: true,
                    msg: '{{ Session::get('success')}}'
                });
        @endif
    </script>
@stop

@section('content')
    <div class="row animated fadeInRight">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Change Email</h5>
                        </div>
                        <div>
                          {!! Form::open(['id'=>'frmspro','method' => 'PUT','url'=>'/ChangeProfile']) !!}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('email', $email, ['class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>
                            {!! Form::submit('Submit', ['class' => 'btn btn-info ']) !!}
                          {!! Form::close() !!}
                    </div>
                </div>
                </div>
            </div>
@stop
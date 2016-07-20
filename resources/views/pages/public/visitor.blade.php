@extends('layouts.generallayout')
@section('cssloc')
	{{ Html::style('assets/css/plugins/select2/select2.min.css') }}
	{{ Html::style('assets/css/formValidation.min.css') }}
    {{ Html::style('assets/css/intlTelInput.css') }}
	{{ Html::style('assets/css/Lobibox.min.css') }}
@stop
@section('jsloc')
	{{ Html::script('assets/js/plugins/select2/select2.full.min.js') }}
	{{ Html::script('assets/js/formValidation.min.js') }}
	{{ Html::script('assets/js/framework/bootstrap.min.js') }}
    {{ Html::script('assets/js/intlTelInput.min.js') }}
	{{ Html::script('assets/js/Lobibox.min.js') }}
	<script type="text/javascript">
	$(document).ready(function() {
		$('#formregis')
        .find('[name="phone"]')
            .intlTelInput({
                utilsScript: '{{ url('assets/js/utils.js') }}',
                autoPlaceholder: true,
                preferredCountries: ['id']
            });

	    $('#formregis').formValidation({
	        framework: 'bootstrap',
	        icon: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            name: {
	                validators: {
	                    notEmpty: {
	                        message: 'The name is required'
	                    },
	                    stringLength: {
	                        min: 6,
	                        message: 'The name must be more than 6 characters long'
	                    },
	                    regexp: {
	                        regexp: /^[a-zA-Z0-9_ ]+$/,
	                        message: 'The name can only consist of alphabetical, number and underscore'
	                    }
	                }
	            },
	            email: {
                validators: {
	                    notEmpty: {
	                        message: 'The email address is required'
	                    },
	                    emailAddress: {
	                        message: 'The input is not a valid email address'
	                    }
                	}
            	},
            	phone: {
                    validators: {
                        callback: {
                            message: 'The phone number is not valid',
                            callback: function(value, validator, $field) {
                                return value === '' || $field.intlTelInput('isValidNumber');
                            }
                        }
                    }
                }
	        }
	    });

	    $("#occupation").select2({
		    placeholder: "Select Job",
		    allowClear: true
		});
	});

    @if (Session::has('success'))
     Lobibox.notify('success', {
          rounded: true,
          position: 'center top',
          msg: '{{ Session::get('success')}}'
      });
    @endif
    @if (Session::has('error'))
     Lobibox.notify('error', {
          rounded: true,
          position: 'center top',
          msg: '{{ Session::get('error')}}'
      });
    @endif
	</script>
@stop
@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                {{ Html::image('assets/image/login.png', 'Logo', array('class' => 'img-responsive center-block')) }}
            </div>
            <h3>Welcome to Go-Jek Visitor Registration page.</h3>
            <p>Please fill the blank field at below.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            {!! Form::open(['method' => 'POST', 'url' => '/regvisitor' , 'id' => 'formregis',  'class' => 'form-horizontal']) !!}
            	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            	    {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
            		<div class="col-sm-9">
            	    	{!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            	    	<small class="text-danger">{{ $errors->first('name') }}</small>
            		</div>
            	</div>

            	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            	    {!! Form::label('email', 'Email', ['class' =>'col-sm-3 control-label']) !!}
            	    <div class="col-sm-9">
            	    	{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
            	    	<small class="text-danger">{{ $errors->first('email') }}</small>
            		</div>
            	</div>

            	<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            	    {!! Form::label('phone', 'Phone', ['class' => 'col-sm-3 control-label']) !!}
            	    <div class="col-sm-9">
            		    {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
            		    <small class="text-danger">{{ $errors->first('phone') }}</small>
            		</div>
            	</div>
            
            	<div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
            	    {!! Form::label('occupation', 'Occupation', ['class' => 'col-sm-3 control-label']) !!}
            	    <div class="col-sm-9">
            	    	{!! Form::select('occupation', $options, null, ['id' => 'occupation', 'class' => 'form-control', 'required' => 'required']) !!}
            	    	<small class="text-danger">{{ $errors->first('occupation') }}</small>
            		</div>
            	</div>

                 <div class="btn-group pull-center">
                    {!! Form::submit("Sign Up", ['class' => 'btn btn-primary block full-width m-b']) !!}
                </div>
                <p class="m-t"> <small>Michael &copy; 2016</small> </p>
            	
            {!! Form::close() !!}
        </div>
</div>
@stop
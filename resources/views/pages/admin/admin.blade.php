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
        $(document).ready(function(){
            var idku;
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
            }).on('success.form.fv', function(e) {
            // Prevent form submission
                e.preventDefault();
                FungsiModal();
             });

        	var table = $('#tablevisitor').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '/Admin/TableVisitor',
		        columns: [
		            { data: 'rownum' , name: 'rownum' },
		            { data: 'id' , name: 'id' },
		            { data: 'name', name: 'name' },
		            { data: 'email' , name: 'email' },
		            { data: 'phone' , name: 'phone' },
		            { data: 'occupation' , name: 'occupation' },
		            { data: 'action', name: 'action', orderable: false, searchable: false}
		        ],
		        dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ListVisitor'},
                    {extend: 'pdf', title: 'ListVisitor'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
		    });

            $("#tablevisitor").on("click",".delete-data", function(){ // <- this is the magic
                $_token = "{{ csrf_token() }}";
                var formData = {
                    _token: $_token,
                }
                idku = $(this).val();
                // console.log(idku);
                Lobibox.confirm({
                    msg: "Are you sure delete this data?",
                    callback: function ($this, type) {
                        if (type === 'yes') {
                            $.ajax({
                                type: "DELETE",
                                url: '/visitor/' + idku,
                                data: formData,
                                success: function (data) {
                                    table.ajax.url('/Admin/TableVisitor').load();
                                    Lobibox.notify('success', {
                                        rounded: true,
                                        msg: 'Delete Success.'
                                    });
                                },
                                error: function (data) {
                                    console.log('Error:', data);
                                    table.ajax.url('/Admin/TableVisitor').load();
                                }
                            });
                        }
                    }
                });
            });

             $("#tablevisitor").on("click",".open-modal", function(){
                idku = $(this).val();
                    $.get('/visitor/view/' + idku, function (data) {
                        $('#MDTITTLE').text('ID Visitor : ' + data.id);
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $('.occupation option[value="' + data.occupation +'"]').prop('selected', true);
                        $('#myModal').modal('show');
                    }) 
                });

            function FungsiModal(){
                $_token = "{{ csrf_token() }}";
                var formData = {
                name: $('#name').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                occupation: $('#occupation').val(),
                _token: $_token,
                }
                //used to determine the http verb to use [add=POST], [update=PUT]
                type = "PUT"; //for updating existing resource
                $.ajax({
                    type: type,
                    url: '/visitor/put/' + idku,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        table.ajax.url('/Admin/TableVisitor').load();
                        $('#myModal').modal('hide');
                        Lobibox.notify('success', {
                            rounded: true,
                            msg: 'Update Success.'
                        });
                        }, 
                        error: function (data) {
                            var kata = "<ul>";
                            for (var field in data.responseJSON) {
                                    $('#frm').data('formValidation').updateStatus(field, 'INVALID', 'blank');
                                    kata += "<li>" + data.responseJSON[field] + "</li>";
                            }
                            kata += "</ul>";
                            Lobibox.notify('error', {
                                title: 'Something Error',
                                rounded: true,
                                position: 'center top', //or 'center bottom'
                                msg: kata
                            });
                            console.log('Error:', data.responseJSON);
                        }
                });
            };
        });
    </script>
@stop

@section('content')
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content text-center p-md">

                    <h2><span class="text-navy">This is Only Demo Application For Interview Step Go-Jek</span>
                    <p>
                        You will see visitor table at below this.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Table List Visitor Apply</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tablevisitor" >
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Occupation</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            {{--   Modal Subs              --}}
            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="MDTITTLE"></h4>
                        </div>
                        <div class="modal-body">

                        {!! Form::open(['id' => 'formregis', 'class' => 'form-horizontal']) !!}
                        
                           <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                             {!! Form::label('id', 'ID Visitor', ['class' => 'col-sm-3 control-label']) !!}
                             <div class="col-sm-9">
                                 {!! Form::text('id', null, ['class' => 'form-control', 'disabled']) !!}
                                 <small class="text-danger">{{ $errors->first('id') }}</small>
                             </div>
                         </div>
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                             {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                             <div class="col-sm-9">
                                 {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                 <small class="text-danger">{{ $errors->first('name') }}</small>
                             </div>
                         </div>
                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             {!! Form::label('email', 'Email address', ['class' =>'col-sm-3 control-label']) !!}
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
                             <div class="occupation col-sm-9">
                                 {!! Form::select('occupation', $options, null, ['id' => 'occupation', 'class' => 'form-control', 'required' => 'required']) !!}
                                 <small class="text-danger">{{ $errors->first('occupation') }}</small>
                             </div>
                         </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
@stop
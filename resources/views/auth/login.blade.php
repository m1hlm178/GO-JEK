@extends('layouts.generallayout')
@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                {{ Html::image('assets/image/login.png', 'Logo', array('class' => 'img-responsive center-block')) }}
            </div>
            <h3>Selamat datang di GoJek Admin Visitor Page</h3>
            <p>Aplikasi ini dibuat dengan menggunakan framework laravel.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Silakan Melakukan Login.</p>
            {!! Form::open(['method' => 'POST', 'url' => '/login', 'class' => 'm-t']) !!}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('username') }}</small>
                </div> 
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>
                <div class="btn-group pull-center">
                    {!! Form::submit("Login", ['class' => 'btn btn-primary block full-width m-b']) !!}
                </div>
                <p class="m-t"> <small>Michael &copy; 2016</small> </p>
            {!! Form::close() !!}
        </div>
</div>
@stop
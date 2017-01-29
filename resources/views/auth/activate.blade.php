@section('title', 'Activation')

@extends('layouts.landing')

@section('custom-styles')
<link href="{{ asset('css/landing.css') }}" rel="stylesheet">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('custom-scripts', null)

@section('content')
<div class="container">
    <div class="row col-md-4 col-md-offset-4 col-centered" style="margin-top:100px;margin-bottom:100px;">

    {!! Helper::bootstrap_alert() !!}

    <section class="panel panel-login">
        <div class="panel-body">

            <div class="tagline">
                <h4>{{ trans('auth.activation_greeting') }}</h4>
                <h5>{{ trans('auth.activation_tips', ['name' => $name]) }}</h5>
            </div>
            <div class="line line-dashed line-lg pull-in"></div>

            <div class="loginform">
                {!! Form::open(array('route' => array('_auth.activate.post', $code))) !!}
                {!! csrf_field() !!}

                <div class="form-group">
                    {!! Form::password('password', array('class' => 'form-control', 'placeholder' => trans('auth.password'), 'style' => 'text-align:center')) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('confirmation', array('class' => 'form-control', 'placeholder' => trans('auth.password_confirm'), 'style' => 'text-align:center')) !!}
                </div>
            </div>
            <div class="line line-dashed line-lg pull-in"></div>

            <button type="submit" class="btn btn-md btn-block btn-primary ">{{ trans('auth.activation_button') }}</button>
            {!! Form::close() !!}
        </div>
    </section>
</div>
</div>
@endsection

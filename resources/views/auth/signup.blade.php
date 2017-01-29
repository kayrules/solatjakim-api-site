@section('title', 'Register')

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
                    <h4>{{ trans('auth.register_greeting') }}</h4>
                    <h5>{{ trans('auth.register_tips') }}</h5>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>

                <div class="socialbtns">
                    <button type="button" class="btn btn-md btn-block btn-facebook">{{ trans('auth.facebook_register') }}</button>
                    <button type="button" class="btn btn-md btn-block btn-gplus">{{ trans('auth.googleplus_register') }}</button>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="atau"><span>{{ trans('auth.or') }}</span></div>

                <form action="{{ route('_auth.signup.post') }}" name="submitForm" method="post">
                    <div class="loginform">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            {!! Form::text('name', old('name'), array('class' => 'form-control', 'placeholder' => trans('auth.fullname'), 'style' => 'text-align:center')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('email', old('email'), array('class' => 'form-control', 'placeholder' => trans('auth.email'), 'style' => 'text-align:center')) !!}
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <input type="submit" class="btn btn-md btn-block btn-primary" name="registerBtn" value="{{ trans('auth.register_button') }}" />
                </form>
            </div>
        </section>
    </div>
</div>
@endsection

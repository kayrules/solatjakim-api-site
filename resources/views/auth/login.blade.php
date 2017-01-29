@section('title', 'Enter')

@extends('layouts.landing')

@section('custom-styles')
<link href="{{ elixir('css/landing.css') }}" rel="stylesheet">
<link href="{{ elixir('css/login.css') }}" rel="stylesheet">
@endsection

@section('custom-scripts', null)

@section('content')
<div class="container">
    <div class="row col-md-4 col-md-offset-4 col-centered" style="margin-top:100px;margin-bottom:100px;">

        {!! Helper::bootstrap_alert() !!}

        <section class="panel panel-login">
            <div class="panel-body">

                <div class="tagline">
                    <h4>{{ trans('auth.login_greeting') }}</h4>
                    <h5>{{ trans('auth.login_tips') }}</h5>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>

                <div class="socialbtns">
                    <button type="button" class="btn btn-md btn-block btn-facebook">{{ trans('auth.facebook') }}</button>
                    <button type="button" class="btn btn-md btn-block btn-gplus">{{ trans('auth.googleplus') }}</button>
                </div>
                <div class="line line-dashed line-lg pull-in"></div>
                <div class="atau"><span>{{ trans('auth.or') }}</span></div>

                <form action="{{ route('_auth.login.post') }}" name="submitForm" method="post">
                    <div class="loginform">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            {!! Form::text('username', old('username'), array('class' => 'form-control', 'placeholder' => trans('auth.username'), 'style' => 'text-align:center')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => trans('auth.password'), 'style' => 'text-align:center')) !!}
                        </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>

                    <input type="submit" class="btn btn-md btn-block btn-primary" name="submitBtn" value="{{ trans('auth.login_button') }}" />
                    <div class="forgotpass">
                        <a href="#lupakatalaluan">{{ trans('auth.forgot') }}</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
@endsection

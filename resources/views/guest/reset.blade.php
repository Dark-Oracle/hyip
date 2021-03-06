@extends('dark')

@section('content')
    <div class="container">

        <style>
            .form-signin {
                /*max-width: 330px;*/
                /*padding: 15px;*/
                margin: 0 auto;
            }

            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
        </style>


        <div class="register-form__wrap">
            {!! Form::open(['url' => '/password/reset-send', 'class' => 'form-signin']) !!}
            <div class="register-form__header">
                <img src="{{ asset('img')."/logo.png" }}" alt="">
            </div>
            <div class="register-form__title">
                @if(Session::get('errors'))
                    <div class="register-form__inputs hide-on-click">
                        <div class="alert alert-danger alert-dismissable btn-flat">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul>
                                @foreach($errors->all() as $message)
                                    <li>{{$message}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if (Session::has('messages'))
                    @foreach (Session::get('messages') as $message)
                        <div class="alert alert-success btn-flat">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>{!!  $message !!}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="register-form__inputs">
                <h4 class="text-center">@lang("messages.password_recovery")</h4>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : false }}">
                    {!! Form::label('email', 'E-Mail', ['class' => 'control-label']) !!}
                    {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => __("messages.enter_your_email"), 'required']) !!}
                </div>
            </div>

            <div class="register-form__inputs-bottom">
                <div class="register-form__inputs text-center">
                    {!! Form::submit(__("messages.send"), ['class' => 'btn btn-lg btn-main-carousel btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="register__add-buttons text-center">
            <a href="{{ route('index') }}">@lang("messages.home")</a>
        </div>
    </div>

@endsection

@section('css')
    <style>
        body {
            padding-top: 50px !important;
            padding-bottom: 0px !important;
        }
        .btn-block{
            width:45% !important;
            display: inline-block;
            border-radius:0px;
            margin-top:0px!important;
        }
        .register{
            float: right;
        }
    </style>
@stop
@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection
@section('content')
  <style type="text/css">
    .btn{
    font-size: 12px !important; 
        }
</style>
<body class="hold-transition register-page">
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>CRAS</b></a>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="register-box-body">
                <p style="font-size: 20px;" class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>
                <register-form>                  
                </register-form>                                
                <br>       
                <a href="{{ url('/login') }}" type="button" class="btn btn-warning btn-block btn-flat" style="font-size: 15px !important;">Já estou cadastrado</a><br> 
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')
    @include('adminlte::auth.terms')
</body>
@endsection

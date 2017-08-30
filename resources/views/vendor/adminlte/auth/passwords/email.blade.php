@extends('adminlte::layouts.auth')
@section('htmlheader_title')
    Password recovery
@endsection
@section('content')
<style type="text/css">
    .btn{
        text-rendering: 
    }
</style>
<body class="login-page">
    <div id="app">

        <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
        </div><!-- /.login-logo -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
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
        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>  
            <email-reset-password-form></email-reset-password-form>                
            <br>
            <div class="row">
                        <div class="col-sm-3 col-md-6">
                            <a href="{{ url('/login') }}" type="button" class="btn btn-warning btn-block btn-flat" style="">Entrar</a>
                        </div>
                        <div class="col-sm-3 col-md-6">
                            <a href="{{ url('/register') }}" type="button" class="btn btn-info btn-block btn-flat">Cadastre-se</a><br> 
                        </div>
                    </div>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
@endsection

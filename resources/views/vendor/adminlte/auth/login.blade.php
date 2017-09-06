@extends('adminlte::layouts.auth')
@section('htmlheader_title')
    Log in
@endsection
@section('content')
<body class="hold-transition login-page">
    <div id="app" v-cloak>
        <div class="login-box">
            <div class="login-logo" style="width: 100%">
                <a href="{{ url('/home') }}"><b>CRAS</b></a>
            </div><!-- /.login-logo -->
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
        <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
        <login-form name="{{ config('auth.providers.users.field','email') }}"
                    domain="{{ config('auth.defaults.domain','') }}"></login-form>
                    <!--DIV COM OS BOTÕES CADASTRE-SE E ESQUECI A SENHA-->
                    <!--<div class="row">
                        <div class="col-sm-3 col-md-6">
                            <a href="/register" type="button" class="btn btn-primary btn-block btn-flat" style="">cadastre-se</a>
                        </div>
                        <div class="col-sm-3 col-md-6">
                            <a href="{{ url('/password/reset') }}" type="button" class="btn btn-danger btn-block btn-flat">Esqueci a senha</a><br> 
                        </div>
                    </div>-->                                        
        {{-- <a href="{{ url('/register') }}" class="text-center">{{ trans('adminlte_lang::message.registermember') }}</a> --}}
    </div>
    </div>
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

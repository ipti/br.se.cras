@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    @if(Session::has('alert'))
        {!! Session::get('alert') !!}
    @endif
    <div class="container-fluid">
        <div class="box box-info" style="padding: 20px;">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title"> Editar usuário</h3>
                    </div>
                    <div class="col-md-2 pull-right">
                        <a class="btn btn-default form-control" href="{{ route('user.index') }}">
                            <i class="fa fa-undo"></i> Voltar
                        </a>
                    </div>
                </div>
                <hr>
            </div>
            <form method="POST" action={{ route('user.update', [$user->id]) }}>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">
                                <strong>Nome</strong>
                            </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $user->name }}" required />
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">
                                <strong>Email</strong>
                            </label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $user->email }}" required />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('user_type') ? 'has-error' : '' }}">
                            <label for="user-type">
                                <strong>Tipo de usuário</strong>
                            </label>
                            <select class="form-control" name="user_type" id="user-type" required>
                                <option value="">Selecione</option>
                                <option value="1" {{ (old('user_type') === '1' ?? $user->user_type === '1') ? 'selected' : '' }}>Administrador</option>
                                <option value="2" {{ (old('user_type') === '2' ?? $user->user_type === '2') ? 'selected' : '' }}>Auxiliar administrativo</option>
                                <option value="3" {{ (old('user_type') === '3' ?? $user->user_type === '3') ? 'selected' : '' }}>Técnico de nível superior</option>
                                <option value="4" {{ (old('user_type') === '4' ?? $user->user_type === '4') ? 'selected' : '' }}>Coordenador(a)</option>
                                <option value="5" {{ (old('user_type') === '5' ?? $user->user_type === '5') ? 'selected' : '' }}>Operador Cadastro Único</option>
                            </select>
                            @if ($errors->has('user_type'))
                                <span class="text-danger">{{ $errors->first('user_type') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">
                                <strong>Senha</strong>
                            </label>
                            <input type="password" class="form-control" id="password" name="password" />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password-confirmation">
                                <strong>Confirmar Senha</strong>
                            </label>
                            <input type="password" class="form-control" id="password-confirmation" name="password_confirmation" />
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary form-control">
                            Atualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
    @if(Session::has('alert'))
        {!! Session::get('alert') !!}
    @endif
    <div class="container-fluid">
        <div class="box box-info" style="padding-left: 20px; padding-right: 20px;">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="box-title"> Todos os usuários</h3>
                    </div>
                    <div class="col-md-2 pull-right">
                        <a class="btn btn-primary form-control" href="{{ route('user.create') }}">
                            <i class="fa fa-plus"></i> Novo Usuário
                        </a>
                    </div>
                </div>
                <hr>
            </div>
            <table id="table-users" class="table table-striped">
                <thead>
                    <tr>
                        <th style="text-align: center;">Nº do Cadastro</th> 
                        <th style="text-align: center;">Nome</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Tp. Usuário</th>
                        <th style="text-align: center;">Dt. Cadastro</th>
                        <th style="text-align: center;">Ação </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td style="text-align: center;">{{ $user->id }}</td>
                            <td style="text-align: center;">{{ $user->name }}</td>
                            <td style="text-align: center;">{{ $user->email }}</td>
                            <td style="text-align: center;">{{ $user->tipo_usuario }}</td>
                            <td style="text-align: center;">{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                            <td style="text-align: center;">
                                <form method="GET" action={{ route('user.edit', [$user->id]) }}>
                                    <button type="submit" class="form-control">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </form>
                                <form method="POST" action={{ route('user.destroy', [$user->id]) }}>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="form-control btn-remove-user">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('page-script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table-users').on('draw.dt', function () {
                $('.btn-remove-user').click(function () {
                    return window.confirm('Deseja realmente remover este usuário?');
                });
            }).dataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });
    </script>
@endsection
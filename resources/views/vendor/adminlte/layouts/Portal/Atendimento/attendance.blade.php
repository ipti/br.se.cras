@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

    <div class="container-fluid">
    <!-- TO DO List -->
    <div class="box box-info" style="padding-left: 20px; padding-right: 20px;">
        <div class="box-header">
            <i class="ion ion-clipboard"></i>
            <div class="row">
    <div class="col-md-12">

    </div>
    <div class="col-md-6">
<h3 class="box-title"> Todos os Atendimentos</h3>
    </div>
    <div class="col-md-6">
<a href="http://local.cras.com/attendance/" style="color:white; text-decoration:none;">
                <button type="button" class="btn btn-block btn-primary btn-xs" style="width: 30%; margin-left: 73%;">
                <i class='fa fa-plus-square-o'> &nbsp;</i> Novo Atendimento
                </button></a>
    </div>
</div>
            
            
            <hr>
        </div>

        <table id="example2" class="table table-striped">
            <thead>
            <tr>
                <th style="text-align: center;">nº do Cadastro</th>
                <th style="text-align: center;">Nome</th>
                <th style="text-align: center;">Data de Atendimento</th>
                <th style="text-align: center;">RG/NIS</th>
                <th style="text-align: center;">Técnico</th>
                <th style="text-align: center;">Solicitação</th>
                <th style="text-align: center;">Encaminhamento</th>
                <th style="text-align: center;">Resultado </th>
            </tr>
            </thead>
            <tbody>
            @if(count($identificacao) != 0 || count($membro) != 0)<tr>
            @foreach($identificacao as $id)                            
                <th style="text-align: center;">{{$id->id}}</th>                
                <th style="text-align: center;">{{$id->nomeUser}}</th>
                <th style="text-align: center;">{{$id->dataAtendimento}}</th>
                <th style="text-align: center;">{{$id->rg_number}}-{{$id->rg_emission_organ}}-{{$id->rg_UF}} | {{$id->NIS}}</th>
                <th style="text-align: center;">{{$id->tecnicoNome}} </th>
                <th style="text-align: center;">{{$id->solicitation}}</th>
                <th style="text-align: center;">{{$id->transfer}}</th>
                <th style="text-align: center;">{{$id->result}}</th>                

            </tr>
                 @endforeach

                 @foreach($membro as $m)
                       <tr>
                          <th style="text-align: center;">{{$m->id}}</th>
                          <th style="text-align: center;">{{$m->name}}</th>
                          <th style="text-align: center;">{{$m->data}}</th>
                          <th style="text-align: center;">Informação não cadastrada</th>
                          <th style="text-align: center;">{{$m->tecnicoNome}}</th>
                          <th style="text-align: center;">{{$m->solicitation}}</th>
                          <th style="text-align: center;">{{$m->transfer}}</th>
                          <th style="text-align: center;">{{$m->result}}</th>
                       </tr>                       
                     @endforeach
                     @else
                        <tr>
                            <th style="text-align: center;">Nenhuma informação encontrada</th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                        </tr> 
                        @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection


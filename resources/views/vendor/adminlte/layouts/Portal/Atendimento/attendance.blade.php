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
                <th style="text-align: center;">Editar </th>
            </tr>
            </thead>
            <tbody>
            @if(count($identificacao) != 0 || count($membro) != 0)<tr>
            @foreach($identificacao as $id)                            
                <th style="text-align: center;">{{$id->id}}</th>                
                <th style="text-align: center;">{{$id->nome_usuario}}</th>
                <th style="text-align: center;">{{$id->data}}</th>
                <th style="text-align: center;">{{$id->numero_rg}}-{{$id->emissao_rg}}-{{$id->uf_rg}} | {{$id->NIS}}</th>
                <th style="text-align: center;">{{$id->nome_tecnico}} </th>
                <th style="text-align: center;">{{$id->solicitacao}}</th>
                <th style="text-align: center;">{{$id->encaminhamento}}</th>
                <th style="text-align: center;">{{$id->resultado}}</th>     
                <th style="text-align: center;">
                <a href="{{url("/attendance/edit/$id->id_usuario/$id->id_atendimento")}}" ><i class="fa fa-pencil"></i> </th>

            </tr>
                 @endforeach

                 @foreach($membro as $m)
                       <tr>
                          <th style="text-align: center;">{{$m->id}}</th>
                          <th style="text-align: center;">{{$m->nome_usuario}}</th>
                          <th style="text-align: center;">{{$m->data}}</th>
                          <th style="text-align: center;">Informação não cadastrada</th>
                          <th style="text-align: center;">{{$m->nome_tecnico}}</th>
                          <th style="text-align: center;">{{$m->solicitacao}}</th>
                          <th style="text-align: center;">{{$m->encaminhamento}}</th>
                          <th style="text-align: center;">{{$m->resultado}}</th>
                          <th style="text-align: center;">
                           <a href="{{url("/attendance/edit/$m->id_usuario/$m->id_atendimento")}}" ><i class="fa fa-pencil"></i> 
                          </th>
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
                            <th style="text-align: center;"></th>
                        </tr> 
                        @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection


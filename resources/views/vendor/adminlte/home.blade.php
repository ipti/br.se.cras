@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="row">
        <a href="{{url('/attendance')}}" class="small-box-footer">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$totalAtendimento}}</h3>
                        <p>Total de Atendimentos </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <!-- Mais Informações <i class="fa fa-arrow-circle-right"></i> -->
                </div>
            </div>
        </a>
        <!-- ./col -->
        <a href="{{url('/family')}}" class="small-box-footer">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$totalFamilias}}<sup style="font-size: 20px"></sup></h3>
                        <p>Total de Famílias Referenciadas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa fa-users"></i>
                    </div>
                </div>
            </div>
        </a>
        <!-- ./col -->
        <!--  -->
      </div>
      <div class="row">
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $totalFamiliasInclusaoCadastroUnico }}<sup style="font-size: 20px"></sup></h3>
                        <span>Total de Famílias encaminhadas para inclusão no cadastro único</span>
                    </div>
                    <div class="icon">
                        <i class="fa fa fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $totalFamiliasAtualizacaoCadastral }}<sup style="font-size: 20px"></sup></h3>
                        <span>Total de Famílias encaminhadas para atualização cadastral</span>
                    </div>
                    <div class="icon">
                        <i class="fa fa fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{ $totalFamiliasAcessoBpc }}<sup style="font-size: 20px"></sup></h3>
                        <span>Total de Famílias encaminhadas para para acesso ao BPC</span>
                    </div>
                    <div class="icon">
                        <i class="fa fa fa-users"></i>
                    </div>
                </div>
            </div>
      </div>
    
    <div class="listaDeAvisos">
        <!-- TO DO List -->
        <div class="box box-info" style="padding-left: 20px; padding-right: 20px;">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title"> Atendimentos de hoje: <?php echo date('d/m/Y');?></h3>
              <hr>
            </div>
                
            <table id="example2" class="table table-striped">
                      <thead>
                        <tr>
                          <th style="text-align: center;">Nome</th>
                          <th style="text-align: center;">RG/NIS</th>
                          <th style="text-align: center;">CPF</th>
                          <th style="text-align: center;">Solicitação</th>
                          <th style="text-align: center;">Encaminhamento</th>
                          <th style="text-align: center;">Resultado </th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($identificacao) != 0 || count($membro) != 0)
                      @foreach($identificacao as $id)
                       <tr>
                          <th style="text-align: center;">{{$id->nome}}</th>
                          <th style="text-align: center;">{{$id->numero_rg}}-{{$id->data_emissao_rg}}-{{$id->uf_rg}} | {{$id->NIS}}</th>
                          <th style="text-align: center;">{{$id->cpf}} </th>
                          <th style="text-align: center;">{{$id->solicitacao}}</th>
                          <th style="text-align: center;">{{$id->encaminhamento}}</th>
                          <th style="text-align: center;">{{$id->resultado}}</th>
                          
                       </tr>
                     @endforeach
                      @foreach($membro as $m)
                       <tr>
                          <th style="text-align: center;">{{$m->nome}}</th>
                          <th style="text-align: center;">Informação não cadastrada</th>
                          <th style="text-align: center;">Informação não cadastrada</th>
                          <th style="text-align: center;">{{$m->solicitacao}}</th>
                          <th style="text-align: center;">{{$m->encaminhamento}}</th>
                          <th style="text-align: center;">{{$m->resultado}}</th>
                          
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

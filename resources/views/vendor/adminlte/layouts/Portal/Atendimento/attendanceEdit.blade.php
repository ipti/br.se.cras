@extends('adminlte::layouts.app')
@section('main-content')

 @forelse($identificacao as $id)
<form action="{{url("/attendance/edit/$id->id/$id->id_atendimento")}}"  method="post" name="formulario" id="formulario">
@empty
@endforelse
    {{csrf_field()}}
    <div class="box box-info">   

      <h3 class="box-title" style="padding-left: 1%;">Atendimento de Atendimentos
        	 <div class="col-md-2 pull-right" >
          		<!--  -->

          			<a href="#" style="color:white; text-decoration:none;"></a>
       		  </div>
		</h3>
        <hr>   			           
            <div  class="row" id="box1">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group" id="">
                  <span class="input-group-addon">Data do Atendimento</span>
              <input type="text" class="form-control"  value={{$id->data}} name="data_atendimento" id="data_atendimento"  placeholder="Data do atendimento" required="" value="">              
                </div>
              </div>
            </div>

            <div  class="row" id="box1">
          <h4> I - Dados do Atendimento</h4>
          <br>
           <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id=""  style="width: 100%;" >
             <div class="input-group">
                  <label class="input-group-addon">Serviço</label>
                  <select class="form-control"  name="servico">
                    @forelse($servico as $serv)
                      <option value="{{$serv->id}}" name="servico">{{$serv->nome}}</option>
                      @empty
                      <option>Não tem técnico cadastrado no sistema.</option>
                     @endforelse
                  </select>
              </div>
            </div>
          </div>
      
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Solicitação</span>
              <input  type="text" name="socicitacao" class="form-control" value="{{$id->solicitacao}}" title="Informe um nome válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Providências</span>
              <select name="providencia" class="form-control" title="Informe um nome válido.">
                  <option value="">Selecione</option>
                  <option value="Inclusão Cadastro Único" {{ $id->encaminhamento === 'Inclusão Cadastro Único' }}>Inclusão Cadastro Único</option>
                  <option value="Atualização Cadastral" {{ $id->encaminhamento === 'Atualização Cadastral' }}>Atualização Cadastral</option>
                  <option value="Consulta" {{ $id->encaminhamento === 'Consulta' }}>Consulta</option>
                  <option value="BPC" {{ $id->encaminhamento === 'BPC' }}>BPC</option>
                  <option value="Bolsa Família" {{ $id->encaminhamento === 'Bolsa Família' }}>Bolsa Família</option>
                  <option value="Tarifa Social" {{ $id->encaminhamento === 'Tarifa Social' }}>Tarifa Social</option>
                  <option value="Acolhimento" {{ $id->encaminhamento === 'Acolhimento' }}>Acolhimento</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Resultado</span>
              <input  type="text" name="resultado"      class="form-control" value="{{$id->resultado}}" title="Informe um nome válido."  >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
        	<div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="input-group">
                            <label class="input-group-addon">Técnico Responsável</label>
                            <select class="form-control"  name="tecnico">
                            <option value="{{$tecnico[0]->id}}" name="tecnico">{{$tecnico[0]->nome}}</option>
                              @forelse($tecnicos as $tec)
                                <option value="{{$tec->id}}" name="tecnico">{{$tec->nome}}</option>
                                @empty
                                <option>Não tem técnico cadastrado no sistema.</option>
                               @endforelse
                            </select>
                        </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">

                        <!-- <span class="input-group-addon">UF</span> -->
                        <div class="input-group">
                            <label class="input-group-addon">Usuário ou Membro Familiar</label>
                            <select class="form-control" name="id_user" placeholder="{{$id->nome}}">
                              <option name='id_user' value="">{{$id->nome}}</option>
                              @foreach($membro as $m)
                                <option value="{{$m->id}}"  tipo ="{{$m->id}}">{{$m->nome}}</option>
                              @endforeach
                            </select>
                        </div>
                </div>
        </div>
         <br><br>
         <div class="row"  style="text-align: center;">
              <input type="submit" name="Finalizar Cadastro" class="btn btn-success">
            </div>
        <br><br>
</div>
</form>

@endsection 
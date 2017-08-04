@extends('adminlte::layouts.app')
@section('main-content')

 @forelse($identificacao as $id)
<form action="{{url("/attendance/$id->id")}}"  method="post" name="formulario" id="formulario">
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
              <input type="text" class="form-control"   name="data_atendimento" id="data_atendimento"  placeholder="Data do atendimento" required="">
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
                      <option value="{{$serv->id}}" name="tecnico">{{$serv->name}}</option>
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
              <input  type="text" name="socicitacao" class="form-control" placeholder="" id="" title="Informe um nome válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Providências</span>
              <input  type="text" name="providencia"      class="form-control" placeholder="" id=""  title="Informe um nome válido." >
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Resultado</span>
              <input  type="text" name="resultado"      class="form-control" placeholder="" id="" title="Informe um nome válido."  >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
        	<div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="input-group">
                            <label class="input-group-addon">Técnico Responsável</label>
                            <select class="form-control"  name="tecnico">
                              @forelse($tecnicos as $tec)
                                <option value="{{$tec->id}}" name="tecnico">{{$tec->name}}</option>
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
                            <select class="form-control" name="id_user" placeholder="{{$id->name}}">
                              <option name='id_user' value="">{{$id->name}}</option>
                              @foreach($membro as $m)
                                <option value="{{$m->id}}" tipo ="{{$m->id}}">{{$m->name}}</option>
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
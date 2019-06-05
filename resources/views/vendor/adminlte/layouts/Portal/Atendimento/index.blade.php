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
              <input type="text" class="form-control"   name="data_atendimento" id="data_atendimento"  placeholder="Data do atendimento" required="" value="">              
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
                  <select name="servico" class="form-control" title="Informe um nome válido.">
                    <option value="">Selecione</option>
                    <option value="Inclusão Cadastro Único">Inclusão Cadastro Único</option>
                    <option value="Atualização Cadastral">Atualização Cadastral</option>
                    <option value="Regularização do benefício">Regularização do benefício</option>
                    <option value="Verificação do benefício">Verificação do benefício</option>
                    <option value="Descrumprimento de condicionalidades">Descrumprimento de condicionalidades</option>
                    <option value="Folha resumo">Folha resumo</option>
                    <option value="Tarifa social">Tarifa social</option>
                    <option value="Inclusão PAIF">Inclusão PAIF</option>
                    <option value="Benefício de prestação continuada - BPC">Benefício de prestação continuada - BPC</option>
                    <option value="Regularização de documentação civil">Regularização de documentação civil</option>
                    <option value="Benefício eventual para gestante">Benefício eventual para gestante</option>
                    <option value="Benefício eventual para funeral">Benefício eventual para funeral</option>
                    <option value="Outros benefícios eventuais">Outros benefícios eventuais</option>
                    <option value="Carteira do idoso interestadual">Carteira do idoso interestadual</option>
                    <option value="Acesso a programa de habilitação">Acesso a programa de habilitação</option>
                    <option value="Acesso a cursos de capacitação">Acesso a cursos de capacitação</option>
                    <option value="Carterira intermunicipal Idoso/Deficiente">Carterira intermunicipal Idoso/Deficiente</option>
                    <option value="Serviço de convivência e fortalecimento de vínculos">Serviço de convivência e fortalecimento de vínculos</option>
                    <option value="Encaminhamentos para outras unicidade">Encaminhamentos para outras unicidade</option>
                    <option value="Outros">Outros</option>
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
              <input type="text" name="providencia" class="form-control" />
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
                                <option value="{{$m->id}}" tipo ="{{$m->id}}">{{$m->nome}}</option>
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
 <?php
// var_dump(DB::table('attendance_daily')->get());exit();


 // for ($i=0; $i < 1; $i++) { 
 //    // $iden = $id;
 //    // dd($iden);

 //   // $consulta = mysql_query("SELECT * FROM attendance_daily WHERE id_indentification_person = $iden");
 //   // dd($consulta);
 // }
 ?>  
@endsection 
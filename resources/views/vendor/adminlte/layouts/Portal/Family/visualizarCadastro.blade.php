@extends('adminlte::layouts.app')
@section('main-content')

      @foreach($identificacao as $id)
      <header>
        <link rel="stylesheet" type="text/css" href="style.css">
      </header>
  <div class="Cadastrar">
  <form action="{{url("/family/$id->id_Identification_person")}}"  method="post" name="formulario" id="formulario">
    {{csrf_field()}}
    <div class="box box-info">
      <table class="table table-striped table-bordered" width="100%" border="0" align="center" cellspacing="0" id="t_abas">
        <tr id="tr_abas">
          <td width="16,67%" class="unsel">&nbsp;</td>
          <td id="aba1" width="20%" class="sel" onClick="sel(this.id)">Informações Pessoais</td><!-- colocar as abas aqui. Cuidado para não mudar as id das abas: formata: aba+número. ver exemplo-->
          <td id="aba2" width="20%" class="unsel" onClick="sel(this.id)">Endereço</td>
          <td id="aba3" width="20%" class="unsel" onClick="sel(this.id)">Situação Financeira e Previdenciária</td>
          <td id="aba4" width="20%" class="unsel" onClick="sel(this.id)"> Composição Familiar </td>
          <td width="16,67%" class="unsel">&nbsp;</td>
        </tr>
      </table>
@if($errors->all() )
          <div class="alert alert-danger alert-dismissible">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
             @foreach ($errors->all() as $error)
                @if($error)
               <ul>
                  <li>{{$error}} </li>
                </ul>
                @endif  
            @endforeach
     </div> 
@endif

      <!-- <div class="formularioCadastro"> -->
      <div id="textaba1" class="divsel">

      <div class="row" id="box1">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group" id="">
                  <span class="input-group-addon">Nº: </span>
                  <input type="text" name="id" value="{{$id->id}}" disabled >
                </div>
              </div>
      </div>

            <div  class="row" id="box1">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group" id="">
                  <span class="input-group-addon">Data Entrada</span>
              <input type="text" class="form-control"   name="data_entrada" id="data_entrada"  value="{{$id->date_initial}}" >
                </div>

              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Data Desligamento</span>
                <input type="text" class="form-control"   name="data_saida"  id="data_saida" value="{{$id->date_end}}" >
              </div>
              </div>
          
          <br><br>

          <h4> I - Nome</h4>
          <br>
           <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Nome</span>
              <input  type="text" name="nome" class="form-control" value="{{$id->name}}" >
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Apelido</span>
              <input  type="text" name="apelido" class="form-control" value="{{$id->nick_name}}" >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="input-group" id="">
              <span class="input-group-addon">Data de Nascimento</span>
               <input type="text" class="form-control"   name="data_nascimento"  value="{{$id->birth}}"  >
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Nº Cadastro</span>
              <input  type="text" name="NumeroCadastro" class="form-control" value="{{$id->register_number}}" >
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">NIS</span>
              <input  type="text" name="nis"      class="form-control" value="{{$id->NIS}}" >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="input-group" id="">
              <span class="input-group-addon">RG</span>
              <input  type="text" name="rgNumero" class="form-control" value="{{$id->rg_number}}" >
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="input-group " id="">
              <span class="input-group-addon">Emissão</span>
              <input  type="text" name="RgEmissao" class="form-control" value="{{$id->rg_emission_date}}" >
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <!-- <span class="input-group-addon">UF</span> -->
              <div class="input-group">
              <label class="input-group-addon">UF</label>
              <select class="form-control" name="RGuf"     >
                <option selected="">{{"$id->rg_UF"}}</option>
                 <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
              </select>
            </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Órgão Emissor</span>
              <input  type="text" name="RgOrgaoEmissor" class="form-control" value="{{$id->rg_emission_organ}}" >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group" id="">
              <span class="input-group-addon">CPF</span>
              <input  type="text"  name="cpf"  class="form-control" value="{{$id->cpf}}" id="cpf" title="Informe um nome válido." data-inputmask='"mask": "(999) 999-9999"' >
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="radio4" >
                <span class="input-group-addon">Deficiente Físico ou Mental ?</span>
                <br>
                @if($id->deficient == 1)
                <label id="opcao3" style="padding-left: 35%">
                  <input type="radio" name="deficiente" id="" value="1" checked="" >
                  Não
                </label>
                <label  id="opcao3" >
                  <input type="radio" name="deficiente" id="" value="0"   >
                  Sim&nbsp;
                </label>
                <input  type="text" name="deficiencia" placeholder="Qual deficiência ?" >
                @else
               <label id="opcao3">
                  <input type="radio" name="deficiente" id="" value="1" >
                  Não
                </label>
                <label  id="opcao3" >
                  <input type="radio" name="deficiente" id="" value="0"   checked="">
                  Sim&nbsp;
                  <input  type="text" name="deficiencia" placeholder="Qual deficiência ?" >
                </label>
                @endif
              </div>
            </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Mãe</span>
              <input  type="text" name="mae" class="form-control" value="{{$id->mother}}"  >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Pai <br></span>
              <input  type="text" name="pai"  class="form-control" value="{{$id->mother}}"  >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="radio" >
              <!-- <label style="padding-left: 1%;">Sexo:</label> -->
              <span class="input-group-addon">Estado Civil</span>
              <br>
              @if($id->situation === 'solteiro')
              <label id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="solteiro"  checked=""  >
                Solteiro
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="casado"  >
                Casado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="separado"  >
                Separado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="divorciado"  >
                Divorciado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="viuvo"  >
                Viúvo
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="outro"  >
                Outro
              </label>
              @elseif($id->situation === 'casado')
              <label id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="solteiro"  >
                Solteiro
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="casado"  checked=""  >
                Casado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="separado" >
                Separado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="divorciado" >
                Divorciado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="viuvo"  >
                Viúvo
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="outro" >
                Outro
              </label>  @elseif($id->situation === 'separado')
              <label id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="solteiro"  >
                Solteiro
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="casado"    >
                Casado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="separado" checked="" >
                Separado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="divorciado"  >
                Divorciado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="viuvo" >
                Viúvo
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="outro" >
                Outro
              </label> @elseif($id->situation === 'divorciado')
              <label id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="solteiro" >
                Solteiro
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="casado"   >
                Casado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="separado"  >
                Separado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="divorciado"   checked="" >
                Divorciado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="viuvo" >
                Viúvo
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="outro"  >
                Outro
              </label>
              @elseif($id->situation === 'viuvo')
              <label id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="solteiro"  >
                Solteiro
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="casado"   >
                Casado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="separado" >
                Separado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="divorciado"   >
                Divorciado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="viuvo"  checked="" >
                Viúvo
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="outro"  >
                Outro
              </label> @elseif($id->situation === 'outro')
              <label id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="solteiro"  >
                Solteiro
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="casado" >
                Casado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="separado" >
                Separado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="divorciado"  >
                Divorciado
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="viuvo" >
                Viúvo
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="outro"  checked="" >
                Outro
              </label>
            @endif
              
            </div>
          </div>
        </div>
        <div class="row" id="box1" >
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">
              <label class="input-group-addon">Grau de Escolaridade</label>
              <select class="form-control" name="escolaridade"   >
                <option value="1">Ensino Fundamental Completo</option>
                <option value="2">Ensino Fundamental Incompleto</option>
                <option value="3">Ensino Médio Completo</option>
                <option value="4">Ensino Médio Incompleto</option>
                <option value="5">Ensino Superior Completo</option>
                <option value="6">Ensino Superior Incompleto</option>
                <option value="7">Especialização</option>
                <option value="8">Mestrado</option>
                <option value="9">Doutorado</option>
              </select>
            </div>
          </div>
        </div>
        <br><br>
        <div class="row"  style="text-align: center;">
          <button type="button" id="aba2" class="btn btn-primary" onClick="sel(this.id)">Avançar</button>
        </div>
        </div><!-- colocar aqui o conteúdo das abas. Atenção para seguir o mesmo modelo de id.-->
        <div id="textaba2" class="divunsel">
          <div id="box1">
            <h4> II - Endereço</h4>
          </div>
          <div  class="row" id="box1">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="input-group " id="" >
                <span class="input-group-addon">Endereço <br></span>
                <input  type="text" name="address"     class="form-control" value="{{$id->address}}" id=""  >
              </div>
            </div>
          </div>
          <div  class="row" id="box1" >
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Telefone</span>
                <input  type="text" name="telefone" class="form-control" value="{{$id->phone}}" title="Informe um nome válido." >
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group " id="" >
                <span class="input-group-addon">Ponto de Referência</span>
                <input  type="text" name="pontoReferencia"     class="form-control" value="{{$id->reference_point}}" id="" title="Informe um nome válido." >
              </div>
            </div>
          </div>
          <div  class="row" id="box1">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="radio2">
                <!-- <label style="padding-left: 1%;">Sexo:</label> -->
                <span class="input-group-addon">Condições de Moradia</span>
                <br>
                @if($id->conditions_home === 'propria')
                <label id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="propria" checked="">
                  Própria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="alugada" >
                  Alugada
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="cedida" >
                  Cedida
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="areaDeOcupacao" >
                  Área de Ocupação
                </label> 
                @elseif($id->conditions_home === 'alugada')
                <label id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="propria" >
                  Própria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="alugada" checked="" >
                  Alugada
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="cedida" >
                  Cedida
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="areaDeOcupacao" >
                  Área de Ocupação
                </label>  
                 @elseif($id->conditions_home === 'cedida')
                <label id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="propria" >
                  Própria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="alugada"  >
                  Alugada
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="cedida" checked="">
                  Cedida
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="areaDeOcupacao" >
                  Área de Ocupação
                </label>   
                   @elseif($id->conditions_home === 'areaDeOcupacao')
                <label id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="propria" >
                  Própria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="alugada"  >
                  Alugada
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="cedida" >
                  Cedida
                </label>
                <label  id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="areaDeOcupacao"  checked="">
                  Área de Ocupação
                </label>
                @endif
              </div>
            </div>
          </div>
          <div  class="row" id="box1">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="radio2">
                <!-- <label style="padding-left: 1%;">Sexo:</label> -->
                <span class="input-group-addon">Tipo de Construção</span>
                <br>
                @if($id->type_construct === 'alvenaria')
                <label id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="alvenaria" checked=""  >
                  Alvenaria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="madeira"  >
                  Madeira
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="mista"  >
                  Mista
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="taipa"  >
                  Taipa
                </label>
                 @elseif($id->type_construct === 'madeira')
                <label id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="alvenaria"  >
                  Alvenaria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="madeira" checked=""  >
                  Madeira
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="mista"  >
                  Mista
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="taipa"  >
                  Taipa
                </label>
                @elseif($id->type_construct === 'mista')
                <label id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="alvenaria"  >
                  Alvenaria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="madeira"  >
                  Madeira
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="mista" checked=""   >
                  Mista
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="taipa"  >
                  Taipa
                </label>
                 @elseif($id->type_construct === 'taipa')
                <label id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="alvenaria"  >
                  Alvenaria
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="madeira"  >
                  Madeira
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="mista"   >
                  Mista
                </label>
                <label  id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="taipa"  checked=""  >
                  Taipa
                </label>
                @endif
              </div>
            </div>
          </div>
          <div  class="row" id="box1" >
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Nº de Comodos</span>
                <input  type="text" name="qtdComodos"     class="form-control" value="{{$id->rooms}}" id="" title="Informe um nome válido." >
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group " id="" >
                <span class="input-group-addon">Valor (Aluguel ou Financiamento)</span>
                <input  type="text" name="valorAluguel"     class="form-control" value="{{$id->value_home}}" id="" title="Informe um nome válido." >
              </div>
            </div>
          </div>
          <br><br>
          <div class="row"  style="text-align: center;">
            <button type="button" id="aba3" class="btn btn-primary" onClick="sel(this.id)">Avançar</button>
          </div>
        </div>
        <div id="textaba3" class="divunsel">
          <div id="box1">
            <h4> III - Principais Vulnerabilidades</h4>
          </div>
          <div  class="row" id="box1">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-1">
                  
              @if($id->irregular_ocupation === 1)
                <label id="opcao1">
                  <input type="hidden" name="ocupacao irregular" value="0">
                  <input type="checkbox" name="ocupacao irregular" value="1" checked=""> Residem em área de ocupação irregular<br>
                </label>
                @else
                <label id="opcao1">
                  <input type="hidden" name="ocupacao irregular" value="0" checked="">
                  <input type="checkbox" name="ocupacao irregular" value="1" > Residem em área de ocupação irregular<br>
                </label>
              @endif
              @if($id->dependent_elderly === 1)
                <label id="opcao1">
                <input type="hidden" name="idosos dependentes" value="0">
                  <input type="checkbox" name="idosos dependentes" value="1" checked=""> Existência de idosos dependentes na família<br>
                </label>
                 @else
                 <label id="opcao1">
                <input type="hidden" name="idosos dependentes" value="0">
                  <input type="checkbox" name="idosos dependentes" value="1"> Existência de idosos dependentes na família<br>
                </label>
              @endif
               @if($id->deficient_family === 1)
                <label id="opcao1">
              <input type="hidden" name="deficientes na familia" value="0">
                  <input type="checkbox" name="deficientes na familia" value="1" checked=""> Existência de deficientes na família<br>
                </label>
                @else
                <label id="opcao1">
                  <input type="hidden" name="deficientes na familia" value="0">
                  <input type="checkbox" name="deficientes na familia" value="1"> Existência de deficientes na família<br>
                </label>
                @endif

            @if($id->others === 1)
                <label id="opcao1">
                 <input type="hidden" name="outros" value="0">
                  <input type="checkbox" name="outros" value="1" checked=""> Outros<br>
                </label>
                @else
                <label id="opcao1">
                 <input type="hidden" name="outros" value="0">
                  <input type="checkbox" name="outros" value="1"> Outros<br>
                </label>
                @endif
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-1">
              @if($id->children_alone === 1)
                <label id="opcao1">
                  <input type="hidden" name="criancaSozinhaDomicilio" value="0">
                  <input type="checkbox" name="criancaSozinhaDomicilio" value="1" checked=""> Crianças que ficam sozinhos no domicilio
                </label>
                @else
                <label id="opcao1">
                  <input type="hidden" name="criancaSozinhaDomicilio" value="0">
                  <input type="checkbox" name="criancaSozinhaDomicilio" value="1" > Crianças que ficam sozinhos no domicilio
                </label>
                @endif
                @if($id->unemployment === 1)
                <label id="opcao1">
                  <input type="hidden" name="desemprego" value="0">
                  <input type="checkbox" name="desemprego" value="1" checked=""> Desemprego<br>
                </label>
                @else
                  <label id="opcao1">
                  <input type="hidden" name="desemprego" value="0">
                  <input type="checkbox" name="desemprego" value="1" > Desemprego<br>
                </label>
                @endif
                <br>
                @if($id->lowIcome === 1)
                <label id="opcao1">
                  <input type="hidden" name="baixaRenda" value="0">
                  <input type="checkbox" name="baixaRenda" value="1" checked=""> Baixa 
                  renda<br>
                </label>
                @else
                <label id="opcao1">
                  <input type="hidden" name="baixaRenda" value="0">
                  <input type="checkbox" name="baixaRenda" value="1"> Baixa 
                  renda<br>
                </label>
                @endif
              </div>
            </div>
          </div>
          
          <br>
          <hr>
          <div id="box1">
            <h4>IV - Situação Financeira e Previdenciária </h4>
          </div>
          <div  class="row" id="box1" >
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Profissão</span>
                <input  type="text" name="profissao"     class="form-control" value="{{$id->profession}}" id="" title="Informe um nome válido."  >
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="radio3">
                <span class="input-group-addon">Carteira Assinada</span>
                <br>
                @if($id->wallet_signed === 'sim')
                <label id="opcao2">
                  <input type="radio" name="carteiraAssinada"      id="" value="sim" checked=""  >
                  Sim
                </label>
                <label  id="opcao2">
                  <input type="radio" name="carteiraAssinada"      id="" value="nao"  >
                  Não
                </label>
                @else
                  <label id="opcao2">
                  <input type="radio" name="carteiraAssinada"      id="" value="sim"  >
                  Sim
                </label>
                <label  id="opcao2">
                  <input type="radio" name="carteiraAssinada"      id="" value="nao" checked=""   >
                  Não
                </label>

                @endif
              </div>
            </div>
          </div>
          <div  class="row" id="box1" >
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Renda Mensal do usuário </span>
                <input  type="number" name="rendaFamiliar"  value="{{$id->income_family}}" required=""  >
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="radio4">
                <span class="input-group-addon">Reside com:</span>
                <br>

                @if($id->family_reside == 'familia')
                <label id="opcao3">
                <input type="hidden" name="reside" value="0">
                  <input type="radio" name="reside"      id="" value="familia"  checked="" >
                  Família
                </label>

                <label  id="opcao3">
                  <input type="radio" name="reside"      id="" value="soziho"  >
                  Sozinho
                </label>

                <label  id="opcao3">
                  <input type="radio" name="reside"      id="" value="outros"  >
                  Outros
                  <!-- <input type="text" name="reside"      placeholder="Qual ?" style="width: 70%"> -->
                </label>
                @elseif($id->family_reside == 'soziho')
                <label id="opcao3">
                <input type="hidden" name="reside" value="0">
                  <input type="radio" name="reside"      id="" value="familia"  >
                  Família
                </label>

                <label  id="opcao3">
                  <input type="radio" name="reside"      id="" value="soziho"   checked="" >
                  Sozinho
                </label>

                <label  id="opcao3">
                  <input type="radio" name="reside"      id="" value="outros"  >
                  Outros
                  <!-- <input type="text" name="reside"      placeholder="Qual ?" style="width: 70%"> -->
                </label>
                @else
                <label id="opcao3">
                <input type="hidden" name="reside" value="0">
                  <input type="radio" name="reside"      id="" value="familia"  >
                  Família
                </label>

                <label  id="opcao3">
                  <input type="radio" name="reside"      id="" value="soziho" >
                  Sozinho
                </label>

                <label  id="opcao3">
                  <input type="radio" name="reside"      id="" value="outros"    checked=""  >
                  Outros
                  <!-- <input type="text" name="reside"      placeholder="Qual ?" style="width: 70%"> -->
                </label>

                @endif
              </div>
            </div>
          </div>
          <hr>
          <!-- <div  class="row" id="box1">
            <div class="col-md-6 col-sm-6 col-xs-12">
                
                @if($id->bolsa_familia === 1)
                <label id="opcao4">
                <input type="hidden" name="BolsaFamilia" value="0">
                  <input type="checkbox" name="BolsaFamilia" value="1" checked="">Bolsa Família<br>
                </label>
                @else
                   <label id="opcao4">
                <input type="hidden" name="BolsaFamilia" value="0">
                  <input type="checkbox" name="BolsaFamilia" value="1" >Bolsa Família<br>
                </label>
                @endif
  
                @if($id->loasbpc === 1)
                <label id="opcao4">
                <input type="hidden" name="LOAS" value="0">
                  <input type="checkbox" name="LOAS" value="1" checked="">LOAS/BPC<br>
                </label>
                @else
                <label id="opcao4">
                <input type="hidden" name="LOAS" value="0">
                  <input type="checkbox" name="LOAS" value="1">LOAS/BPC<br>
                </label>
                @endif

              @if($id->previdencia === 1)
                    <label id="opcao4">
                    <input type="hidden" name="Previdencia" value="0">
                      <input type="checkbox" name="Previdencia" value="1" checked=""> Previdência Social<br>
                    </label>
              @else
                  <label id="opcao4">
                    <input type="hidden" name="Previdencia" value="0">
                      <input type="checkbox" name="Previdencia" value="1" > Previdência Social<br>
                    </label>
              @endif
                
              
            </div>
             <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon">Valor R$</span>
                <input  type="number" name="valorBeneficio" class="form-control" value="{{$id->family_benefits_value}}" id="" title="Informe um valor válido." >
              </div>
              </div>
          </div> -->
                  <div  class="row" id="box1">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <span class="input-group-addon">Benefício
                <small>(Benefício do usuário cadastrado)</small>
                </span>
                <br>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <label id="opcao4">
                  <div class=input-group><span class=input-group-addon>LOAS/BPC</span>
                  <input style=height:1%!important; type="number" class="form-control" name="loas" 
                    value="{{$id->loasbpc}}" required="" 
                  />
                  <span class=input-group-addon><span>R$</span></span></div>
                </label> 
                <label id="opcao4">
                 <div class=input-group><span class=input-group-addon> Bolsa Família</span>
                 <input style=height:1%!important; type="number" class="form-control" name="bolsaFamilia" required="" 
                 value="{{$id->bolsa_familia}}" /><span class=input-group-addon><span>R$</span></span></div>
                </label>
              <br>
            </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <label id="opcao4">
                <div class=input-group><span class=input-group-addon> Previdência Social</span>
                <input style=height:1%!important; type="number" class="form-control" name="previdencia" required="" 
                 value="{{$id->previdencia}}" /><span class=input-group-addon><span>R$</span></span></div>
                </label>
           
                 <label id="opcao4">
                <div class=input-group><span class=input-group-addon> Renda Total</span>
                <input style=height:1%!important; type="number" class="form-control" disabled="" name="rendaTotal" required="" 
                 value="{{$total}}" /><span class=input-group-addon><span>R$</span></span></div>
                </label>

                </div>
                

          </div>
          <br><br>
          <div class="row"  style="text-align: center;">
            <button type="button" id="aba4" class="btn btn-primary" onClick="sel(this.id)">Avançar</button>
          </div>
        </div>
        <div id="textaba4" class="divunsel">
          <div id="box1">
            <h4>V - Composição Familiar</h4>
          </div>
          <div id="box1">
            <span class="pull-right" style="padding-bottom: 2%"><button onclick="AddTableRow()" type="button"  class="btn btn-primary btn-sm">Adicionar Membro Familiar</button></span>
            <table  class="table table-striped" id="products-table">
              <tbody>
                <tr>
                  <th>NIS</th>
                  <th>Nome Completo</th>
                  <th>Parentesco</th>
                  <th>Idade</th>
                  <th>Sexo</th>
                  <th>Benefícios</th>
                  <th>Ações</th>
                </tr>

                <?php 
                

        $total = count($membros);
                  $loop = 0;
                  $sum = 0;

        foreach ($membros as $m) {
        $linha0 = " <tr>";
        $linha18 = "<th><input type='number' class='form-control' id='nisMembro' name='nis$loop' value='{$m->nis}'></th>";
        $linha1 = "<td><input type='text' class='form-control' name='nomeMembro$loop'  value='{$m->name}' ></td>"; 
        $linha2 = "<td><input type='text' class='form-control' name='parentesco$loop'  value='{$m->kinship}'></td>";
        $linha3 = "<td style=width:10%><input type='number' class='form-control' name='idade{$loop}' value='{$m->idade}'></td>";
          $linha4 = "<td>
          <select name='sexo{$loop}' class='form-control'>";
       if ($m->sex == 'm') {
        $linha5 = "<option value='m' selected=''>Masculino</option> <option value='f'>Feminino</option>";
        $linha6 ='';
         }elseif($m->sex == 'f'){
          $linha5= '';
          $linha6 = "<option value='m' >Masculino</option> <option value='f'  selected=''>Feminino</option>";
       }
        $linha7 = "</select>
        </td>";
        $linha8= "<td> <button onclick='remove(this)' type='button' class='btn btn-danger btn-sm'>Remover</button></td>";
        $linha9="<th style=width:25%;>";
        $linha10="<small>Marque o benefício e o valor correspondente</small>";
        $linha11="<div class=input-group><span class=input-group-addon>LOAS/BPC</span><input style=height:1%!important; type='number' class='form-control' id='loasMembro' name='loas{$loop}'
        value={$m->loas} /><span class=input-group-addon><span>R$</span></span></div>";
        $linha12 = "<br>";
        $linha13 ="<div class=input-group><span class=input-group-addon> Bolsa Família</span><input style=height:1%!important; type='number' class='form-control' id='bolsaFamiliaMembro' name='bolsaFamilia{$loop}' value={$m->bolsaFamilia} /><span class=input-group-addon><span>R$</span></span></div>";
        $linha14 = "<br>";
        $linha15 = "<div class=input-group><span class=input-group-addon> Previdência Social</span><input style=height:1%!important; type='number' class='form-control' id='previdenciaMembro' name='previdencia{$loop}' value={$m->previdencia} /><span class=input-group-addon><span>R$</span></span></div> <br>";
        $linha19 = "<div class=input-group><span class=input-group-addon> Renda Mensal</span><input style=height:1%!important; type='number' class='form-control' id='rendaMensalUser' name='rendaMensalUser{$loop}' value={$m->incomeUser} /><span class=input-group-addon><span>R$</span></span></div>";        
        $linha16 = "</th>";
        $linha17 = " </tr>";  
                //soma para a renda dos familiares 
                 // $adicao = $m->incomeUser + $m->loas + $m->previdencia + $m->bolsaFamilia; 
                 // $sum = $sum + $adicao;
                 // $adicao = $sum;                       
                //dd($id);                             
         echo "".$linha0;
         echo "".$linha18;
         echo "".$linha1;
         echo "".$linha2;
         echo "".$linha3;
         echo "".$linha4;
         echo "".$linha5;
         echo "".$linha6;
         echo "".$linha7;
         echo "".$linha9;
         echo "".$linha10;
         echo "".$linha11;
         echo "".$linha12;
         echo "".$linha13;
         echo "".$linha14;
         echo "".$linha15;
         echo "".$linha19;
         echo "".$linha16;         
         echo "".$linha8;
         echo "".$linha17;                         
         $loop++;         
         }
        // echo "".$adicao;
//          $adicao = $m->incomeUser + $m->loas + $m->previdencia + $m->bolsaFamilia;  
 // $linha21="<div class=input-group><span class=input-group-addon>Renda Total</span><input style=width:15%; type='number' class='form-control' id='total' name='total'
 //         value={$adicao} disabled=/><button style=height:36px; disabled=>R$</button></div>";
         //RENDA TOTAL DOS FAMILIARES
         // echo "".$linha21;
        // dd($adicao);
     ?>
               
              </tbody>
              <tfoot>
              <tr>
                <td colspan="5" style="text-align: center;">
                </td>
              </tr>
              </tfoot>
            </table>
            <div class="row"  style="text-align: center;">
              <!-- <button type="button" id="aba4" class="btn btn-success" onClick="sel(this.id)">Finalizar Cadastro</button> -->             
              <input type="submit" name="Finalizar Cadastro" class="btn btn-success" value="Editar Cadastro">
              
            </div>
          </div>
        </div>
        <br>
      </div>
    </form>
  </div>  
  @endforeach
  
  @endsection
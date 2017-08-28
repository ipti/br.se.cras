@extends('adminlte::layouts.app')
@section('main-content')
<div class="Cadastrar">
  <form action="{{url('/familyCdst')}}"  method="post" name="formulario" id="formulario" >
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
            <p></p>
            <div  class="row" id="box1">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group" id="">
                  <span class="input-group-addon">Data Entrada</span>
              <input type="text" class="form-control"   name="data_entrada" id="data_entrada" placeholder='____/____/______' >
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Data Desligamento</span>
                <input type="text" class="form-control"   name="data_saida"  placeholder='____/____/_______' id="data_saida" >
              </div>
              </div>
          
          <br><br>

          <h4> I - Nome</h4>
          <br>
           <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Nome</span>
              <input  type="text" name="nome" class="form-control" placeholder="" id="name" title="Informe um nome válido." />
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Apelido</span>
              <input  type="text" name="apelido" class="form-control" placeholder="" id="apelido" title="Informe um apelido válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="input-group" id="">
              <span class="input-group-addon">Data de Nascimento</span>
               <input type="text" class="form-control"   name="data_nascimento" id="data_nascimento" 
               placeholder='____/____/_______'  >
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Nº Cadastro</span>
              <input  type="text" name="NumeroCadastro"   class="form-control" placeholder="" id="NumeroCadastro"  title="Informe um nome válido." 
              style="width: 100%;">
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">NIS</span>
              <input  type="text" name="nis"   id="nis"   class="form-control" placeholder=""  title="Informe um nome válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="input-group" id="">
              <span class="input-group-addon">RG</span>
              <input  type="text" name="rgNumero" class="form-control" placeholder="" id="" title="Informe um nome válido." maxlength="8"  >
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="input-group " id="">
              <span class="input-group-addon">Data de Emissão</span>
              <input  type="text" name="RgEmissao" id="RgEmissao" class="form-control"  title="Informe um nome válido." placeholder='____/____/_______'  >
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <!-- <span class="input-group-addon">UF</span> -->
              <div class="input-group">
              <label class="input-group-addon">UF</label>
              <select class="form-control" name="RGuf"     >
                <option selected=""></option>
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
              <input  type="text" name="RgOrgaoEmissor" id="RgOrgaoEmissor" class="form-control" placeholder=""
               title="Informe um nome válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="input-group" id="">
              <span class="input-group-addon">CPF</span>
              <input  type="text"  name="cpf"  class="form-control"  id="cpf" title="Informe um nome válido." placeholder='000.000.000-00'  >
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="radio4">
                <span class="input-group-addon">Deficiente Físico ou Mental ?</span>
                <br>
                <label id="opcao3">
                  <input type="radio" name="deficiente" id="" value="1"  >
                  Não
                </label>
                <label  id="opcao3" >
                  <input type="radio" name="deficiente" id="" value="0"  >
                  Sim&nbsp;
                  <input  type="text" name="deficiencia" id="deficiencia" placeholder="Qual deficiência ?" >
                   
                </label>
              </div>
            </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Mãe</span>
              <input  type="text" name="mae" class="form-control" placeholder="" id="mae"  title="Informe um nome válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group " id="" >
              <span class="input-group-addon">Pai <br></span>
              <input  type="text" name="pai"  class="form-control" placeholder="" id="pai" title="Informe um nome válido." >
            </div>
          </div>
        </div>
        <div  class="row" id="box1">
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="radio">
              <!-- <label style="padding-left: 1%;">Sexo:</label> -->
              <span class="input-group-addon">Estado Civil</span>
              <br>
              <label id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="solteiro"  >
                Solteiro
              </label>
              <label  id="opcao">
                <input type="radio" name="estadoCivil"      id="" value="casado"  >
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
                <input type="radio" name="estadoCivil"      id="" value="outro"  >
                Outro
              </label>
            </div>
          </div>
        </div>
        <div class="row" id="box1" >
          <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="input-group">
              <label class="input-group-addon">Grau de Escolaridade</label>
              <select class="form-control" name="escolaridade"     >
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
                <input  type="text" name="address"     class="form-control" placeholder="" id=""  title="Informe um nome válido." >
              </div>
            </div>
          </div>
          <div  class="row" id="box1" >
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Telefone</span>
                <input  type="text" name="telefone" class="form-control" placeholder="(00) 0 0000-0000" id="telefone"  title="Informe um nome válido." >
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group " id="" >
                <span class="input-group-addon">Ponto de Referência</span>
                <input  type="text" name="pontoReferencia"     class="form-control" placeholder="" id="" title="Informe um nome válido." >
              </div>
            </div>
          </div>
          <div  class="row" id="box1">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="radio2">
                <!-- <label style="padding-left: 1%;">Sexo:</label> -->
                <span class="input-group-addon">Condições de Moradia</span>
                <br>
                <label id="opcao1">
                  <input type="radio" name="condicoesMoradia"      id="" value="propria" >
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
                
              </div>
            </div>
          </div>
          <div  class="row" id="box1">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="radio2">
                <!-- <label style="padding-left: 1%;">Sexo:</label> -->
                <span class="input-group-addon">Tipo de Construção</span>
                <br>
                <label id="opcao1">
                  <input type="radio" name="tipoConstrucao"      id="" value="alvenaria"  >
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
              </div>
            </div>
          </div>
          <div  class="row" id="box1" >
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Nº de Comodos</span>
                <input  type="number" name="qtdComodos"     class="form-control" placeholder="" id="" title="Informe um nome válido." >
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group " id="" >
                <span class="input-group-addon" style="font-size: 14px">Valor <br>
                <small style="font-size: 10px">(Aluguel ou Financiamento)</small></span>
                <input  type="number" name="valorAluguel"  class="form-control" placeholder="" id="" title="Informe um nome válido." style="height: 50px;" >
                <div class="input-group-addon">
                      <i class="fa fa-usd"></i>
                    </div>
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
                <label id="opcao1">
                  <input type="hidden" name="ocupacao irregular" value="0">
                  <input type="checkbox" name="ocupacao irregular" value="1"> Residem em área de ocupação irregular<br>
                </label>
                <label id="opcao1">
                <input type="hidden" name="idosos dependentes" value="0">
                  <input type="checkbox" name="idosos dependentes" value="1"> Existência de idosos dependentes na família<br>
                </label>
                <label id="opcao1">
              <input type="hidden" name="deficientes na familia" value="0">
                  <input type="checkbox" name="deficientes na familia" value="1"> Existência de deficientes na família<br>
                </label>
                <label id="opcao1">
                 <input type="hidden" name="outros" value="0">
                  <input type="checkbox" name="outros" value="1"> Outros<br>
                </label>
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-1">
                <label id="opcao1">
                  <input type="hidden" name="criancaSozinhaDomicilio" value="0">
                  <input type="checkbox" name="criancaSozinhaDomicilio" value="1"> Crianças que ficam sozinhos no domicilio
                </label>
                <label id="opcao1">
                  <input type="hidden" name="desemprego" value="0">
                  <input type="checkbox" name="desemprego" value="1" defaultValue="0"> Desemprego<br>
                </label>
                <br>
                <label id="opcao1">
                  <input type="hidden" name="baixaRenda" value="0">
                  <input type="checkbox" name="baixaRenda" value="1"> Baixa 
                  renda<br>
                </label>
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
                <input  type="text" name="profissao"     class="form-control" placeholder="" id="profissao" title="Informe um nome válido."  >
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="radio3">
                <span class="input-group-addon">Carteira Assinada</span>
                <br>
                <label id="opcao2">
                  <input type="radio" name="carteiraAssinada"      id="" value="sim"  >
                  Sim
                </label>
                <label  id="opcao2">
                  <input type="radio" name="carteiraAssinada"      id="" value="nao"  >
                  Não
                </label>
              </div>
            </div>
          </div>
          <div  class="row" id="box1" >
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="input-group" id="">
                <span class="input-group-addon">Renda Mensal do usuário</span>
                <input  type="number" name="rendaMensalUsuario"   style="width: 100%;"  >
                <div class="input-group-addon">
                      R$
                    </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="radio4">
                <span class="input-group-addon">Reside com:</span>
                <br>
                <label id="opcao3">
                <input type="hidden" name="reside" value="0">
                  <input type="radio" name="reside"      id="" value="familia"  >
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
              </div>
            </div>
          </div>
          <hr>
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
                  <input style=height:1%!important; type="number" class="form-control"  name="loas" />
                  <span class=input-group-addon><span>R$</span></span></div>
                </label> 
                <label id="opcao4">
                 <div class=input-group><span class=input-group-addon> Bolsa Família</span><input style=height:1%!important; type="number" class="form-control" name="bolsaFamilia" /><span class=input-group-addon><span>R$</span></span></div>
                </label>
              <br>
            </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <label id="opcao4">
                <div class=input-group><span class=input-group-addon> Previdência Social</span><input style=height:1%!important; type="number" class="form-control" name="previdencia" /><span class=input-group-addon><span>R$</span></span></div>
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
                  <th  style="text-align: center;">NIS</th>
                  <th  style="text-align: center;">Nome Completo</th>
                  <th  style="text-align: center;">Parentesco</th>
                  <th  style="text-align: center;">Idade</th>
                  <th  style="text-align: center;">Sexo</th>
                  <th style="text-align: center;">Benefícios</th>
                  <th  style="text-align: center;">Ações</th>
                </tr>
                <tr>

                  <!-- <td><input type="text" name="nomeMembro" ></td>
                  <td><input type="text" name="parentesco" ></td>
                  <td><input type="number" name="idade" ></td>
                  <td>
                    <select name="sexo">
                      <option value="m">Masculino</option>
                      <option value="f">Feminino</option>
                    </select>
                  </td>
                  <td>
                    <button onclick="remove(this)" type="button" class="btn btn-danger btn-sm">Remover</button>
                  </td> -->
                </tr>
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
              <input type="submit" name="Finalizar Cadastro" class="btn btn-success" value="Finalizar Cadastro">
            </div>
          </div>
        </div>
        <br>
      </div>
    </form>
  </div>
  
  @endsection
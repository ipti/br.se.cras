<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\identificacao_usuario;
use DB;
use Alert;
use Session;
use Validator;
class Family_compositionController extends Controller{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
    protected $identificacao;
        public function __construct(Request $request, identificacao_usuario $identificacao )
    {
        $this->request = $request;
        $this->identificacao = $identificacao;
    }


public function index()
{
  $identificacao = DB::select('SELECT * FROM identificacao_usuario');
            for ($i=0; $i < count($identificacao); $i++) {
               if (isset($identificacao[$i])) {
                    $data = $identificacao[$i]->data_nascimento;
                    $dataP = explode('-', $data);
                    $dataAniversario = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                    $identificacao[$i]->data_nascimento = $dataAniversario;

                    $dataEntrada = $identificacao[$i]->data_inicial;
                    $dataP = explode('-', $dataEntrada);
                    $dataEntrada = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                    $identificacao[$i]->data_inicial = $dataEntrada;
                    if (!is_null($identificacao[$i]->data_final)) {                        
                        $dataSaida = $identificacao[$i]->data_final;
                        $dataP = explode('-', $dataSaida);
                        $dataSaida = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                        $identificacao[$i]->data_final  = $dataSaida;
                    }
                }
            
            }
    return view('vendor.adminlte.layouts.Portal.Family.index', compact('identificacao'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{

    return view('vendor.adminlte.layouts.Portal.Family.register');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    $dados = $this->request->all();
    // dd($dados);
//     $mensagens = array(
//     'nome.required'                       =>  "Nome do usuário é obrigatório",
//     'data_entrada.required'               =>  " Data de Entrada é obrigatório",
//   );
    
    if (isset($dados['cpf'])) {
        $cpf = explode('.',$dados['cpf']);
        $cpf = $cpf[0].''.$cpf[1].''.$cpf[2];
        $cpf = explode('-',$cpf);
        $cpf = $cpf[0].''.$cpf[1];
        $dados['cpf'] = $cpf;
    }else{
        $cpf = $dados['cpf'] = '00000000000';
    }
    if (isset($dados['rgNumero'])) {
        $rgNumero = explode('.',$dados['rgNumero']);
        $rgNumero = $rgNumero[0].''.$rgNumero[1].''.$rgNumero[2];
        $rgNumero = explode('-',$rgNumero);
        $rgNumero = $rgNumero[0].''.$rgNumero[1];
        $dados['rgNumero'] = $cpf;
    }else{
        $rgNumero = $dados['rgNumero'] = '00000000000';
    }
    //  $validator = Validator::make( $request->all(), [
    //         'data_entrada'          =>'required',
    //         'nome'                  =>'required|min:8|max:255',
    //        ],$mensagens);

    //    if ($validator->fails()) {
    //    $validator->setAttributeNames($mensagens);
    //         return redirect('/familyCdst')->withErrors($validator)->withInput();
    //     }
        if (is_null($dados['profissao'])) {
        $dados['profissao']= '';
        }if (is_null($dados['rendaMensalUsuario'])) {
        $dados['rendaMensalUsuario'] = 0;
        }
        if (is_null($dados['deficiencia'])) {
        $dados['deficiencia'] = "";
        }
        if (is_null($dados['pontoReferencia'])) {
        $dados['pontoReferencia'] = "";
        }
        if (is_null($dados['data_saida'])) {
        $dados['data_saida'] = null;
        $dataSaida = $dados['data_saida'];
      }else{
        $dados['data_saida'] = $dados['data_saida'];
        $dataP = explode('/', $dados['data_saida']);
        $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
      }
      if (!is_null($dados['data_nascimento'])) {
        $dados['aniversario'] = $dados['data_nascimento'];
        $dataP = explode('/', $dados['aniversario']);
        $dataAniversario = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
      }else{
        $dados['aniversario'] = null;        
      }
      if (!is_null($dados['RgEmissao'])) {
        $dados['data_emissao_rg'] = $dados['RgEmissao'];
        $dataP = explode('/', $dados['data_emissao_rg']);
        $dataRg = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
      }else{
        $dataRg = $dados['data_emissao_rg'] = null;
      }
      if (!is_null($dados['data_entrada'])) {        
        $dados['data_inicial'] = $dados['data_entrada'];
        $dataP = explode('/', $dados['data_inicial']);
        $dataEntrada = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
      }else{
        $dados['data_inicial'] = null;
      }
        $situacaoFinanceira = DB::table('situacao_financeira')->insertGetId([
            'profissao'=>$dados['profissao'],
            'renda'=>$dados['rendaMensalUsuario'],
            'reside_familia'=>$dados['reside'],
            'carteira_assinada'=>$dados['carteiraAssinada'],
            'bolsa_familia'=>$dados['bolsaFamilia'],
            'loasbpc'=>$dados['loas'],
            'previdencia'=>$dados['previdencia'],
        ]);
            // dd($situacaoFinanceira );
        $vulnerabilidade = DB::table('vulnerabilidade')->insertGetId([
            'ocupacao_irregular' =>$dados['ocupacao_irregular'],
            'crianca_sozinha'=>$dados['criancaSozinhaDomicilio'],
            'idosos_dependentes'=>$dados['idosos_dependentes'],
            'desempregados'=>$dados['desemprego'],
            'deficientes'=>$dados['deficientes_na_familia'],
            'baixa_renda'=>$dados['baixaRenda'],
            'outros'=>$dados['outros'],
            ]);
            // dd($vulnerabilidade);
        $endereco  = DB::table('endereco')->insertGetId([
            'telefone'  =>$dados['telefone'],
            'endereco'=>$dados['address'],
            'ponto_referencia'=>$dados['pontoReferencia'],
            'condicoes_moradia'=>$dados['condicoesMoradia'],
            'tipo_construcao' =>$dados['tipoConstrucao'],
            'comodos'          =>$dados['qtdComodos'],
            'valor_aluguel'     =>$dados['valorAluguel'],
        ]);
        // dd($endereco);
        $identificacaoPessoa = DB::table('identificacao_usuario')->insertGetId([
            'id_endereco' =>$endereco,
            'id_situacao_financeira'=>$situacaoFinanceira,
            'id_vulnerabilidade'  => $vulnerabilidade,
            'nome'      => $dados['nome'],
            'apelido' => $dados['apelido'],
            'data_nascimento'     =>  $dataAniversario,
            'NIS'             =>$dados['nis'],
            'numero_rg'       =>$dados['rgNumero'],
            'data_emissao_rg'=>$dataRg,
            'certidao_nascimento' =>$dados['NumeroCadastro'],
            'uf_rg'           =>$dados['RGuf'],
            'emissao_rg'=>$dados['RgOrgaoEmissor'],
            'cpf'           => $cpf,
            'deficiente'     =>$dados['deficiente'],
            'deficiencia'     =>$dados['deficiencia'],
            'mae'        =>$dados['mae'],
            'pai'        =>$dados['pai'],
            'estado_civil'   =>$dados['estadoCivil'],
            'escolaridade'   =>$dados['escolaridade'],
            'data_inicial'   =>$dataEntrada,
            'data_final'   =>$dataSaida,
        ]);
        // dd($identificacaoPessoa);
        $cont = 0;
        for ($i=0; $i < count($dados) ; $i++) {
        if (isset($dados["nomeMembro_".$i])) {
            $membroNome       = $dados["nomeMembro_".$i];
            $membroParentesco = $dados["parentesco_".$i];
            $membroIdade      = $dados["idade_".$i];
            $membroSexo       = $dados["sexo_".$i];
            $membroNis        = $dados["nis_".$i];
            $loas             = $dados["loas_".$i];
            $bolsa_familia    = $dados["bolsaFamilia_".$i];
            $previdencia      = $dados["previdencia_".$i];
            $rendaUsuario    = $dados["rendaMensalUser_".$i];
            $composicaoFamiliar = DB::table('membro_familiar')->insertGetId([
                'id_identificacao_usuario'      =>$identificacaoPessoa,
                'nome'                          =>$membroNome,
                'parentesco'                       =>$membroParentesco,
                'idade'                         =>$membroIdade,
                'sexo'                           =>$membroSexo,
                'nis'                           =>$membroNis,
                'loas'                          =>$loas,
                'bolsaFamilia'                  =>$bolsa_familia,
                'previdencia'                   =>$previdencia,
                'renda'                         =>$rendaUsuario,
              ]);
            }
          }
    if ($situacaoFinanceira != null && $vulnerabilidade !=null &&   $endereco != null
            &&  $identificacaoPessoa != null ) {
        alert()->success('', 'Cadastro realizado com sucesso!')->autoclose(3000);
         return Redirect::to('/family');
    }else{
         alert()->success('Verifique as informações', 'Não foi possível realizar o cadasto')->autoclose(3000);
         return Redirect::to('/family');
    }

}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
       $identificacao = DB::select(
        'SELECT *, identificacao_usuario.id as identificacao_usuario FROM identificacao_usuario, endereco, situacao_financeira,vulnerabilidade
                         where  identificacao_usuario.id_endereco = endereco.id  and
                         identificacao_usuario.id_situacao_financeira = situacao_financeira.id and
                         identificacao_usuario.id_vulnerabilidade = vulnerabilidade.id and
                         identificacao_usuario.id='.$id );

            $membros =  DB::select('SELECT membro_familiar.renda,membro_familiar.nis,membro_familiar.loas,
                                           membro_familiar.bolsaFamilia,membro_familiar.previdencia,
                                           membro_familiar.nome, membro_familiar.parentesco, membro_familiar.idade,membro_familiar.sexo
                                    FROM identificacao_usuario, membro_familiar
                                    where membro_familiar.id_identificacao_usuario = identificacao_usuario.id
                                    and identificacao_usuario.id ='.$id);

        for ($i=0; $i < count($identificacao) ; $i++) {

            if (!is_null($identificacao[$i]->data_inicial)) {
                $dataInicial = $identificacao[$i]->data_inicial;
                $dataP = explode('-', $identificacao[$i]->data_inicial);
                $dataInicial= $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->data_inicial = $dataInicial;
            }
            if (!is_null($identificacao[$i]->data_final)) {
                $dataFinal = $identificacao[$i]->data_final;
                $dataP = explode('-', $identificacao[$i]->data_final);
                $dataFinal = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->data_final = $dataFinal;
            }if (!is_null($identificacao[$i]->data_nascimento)) {
                $dataAniversario = $identificacao[$i]->data_nascimento;
                $dataP = explode('-', $identificacao[$i]->data_nascimento);
                $dataAniversario = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->data_nascimento = $dataAniversario;

            }if (!is_null($identificacao[$i]->data_emissao_rg)) {
                $RG = $identificacao[$i]->data_emissao_rg;
                $dataP = explode('-', $identificacao[$i]->data_emissao_rg);
                $RG = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->data_emissao_rg = $RG;

            }
        }
        $total = 0;
        foreach ($membros as $m) {            
            $total = $total + $m->loas + $m->previdencia + $m->bolsaFamilia + $m->renda;
        }
        $soma = $identificacao[0]->bolsa_familia + $identificacao[0]->previdencia + $identificacao[0]->loasbpc + $identificacao[0]->renda;  
        $total += $soma;

   return view('vendor.adminlte.layouts.Portal.Family.visualizarCadastro', compact('identificacao','membros','total'));

}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{

}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    DB::beginTransaction();
        $dados = $this->request->all();
            // dd($dados);
        if (isset($dados['cpf'])) {
            $cpf = explode('.',$dados['cpf']);
            $cpf = $cpf[0].''.$cpf[1].''.$cpf[2];
            $cpf = explode('-',$cpf);
            $cpf = $cpf[0].''.$cpf[1];
            $dados['cpf'] = $cpf;
        }else{
            $cpf = $dados['cpf'] = '00000000000';
        }
        if (isset($dados['rgNumero'])) {
        $rgNumero = explode('.',$dados['rgNumero']);
        $rgNumero = $rgNumero[0].''.$rgNumero[1].''.$rgNumero[2];
        $rgNumero = explode('-',$rgNumero);
        $rgNumero = $rgNumero[0].''.$rgNumero[1];
        $dados['rgNumero'] = $cpf;
    }else{
        $rgNumero = $dados['rgNumero'] = '00000000000';
    }
        if(is_null($dados["pontoReferencia"])) {
         $dados['pontoReferencia'] = "";
        }    
        if(is_null($dados['profissao'])) {
        $dados['profissao']= '';
        }
        if(is_null($dados['rendaMensalUsuario'])) {
        $dados['rendaMensalUsuario'] = 0;
        }
        if (is_null($dados['deficiencia'])) {
        $dados['deficiencia'] = "";
        }
        if (is_null($dados['data_saida'])) {
        $dados['data_saida'] = null;
        $dataSaida = $dados['data_saida'];
      }else{
        $dados['data_saida'] = $dados['data_saida'];
        $dataP = explode('/', $dados['data_saida']);
        $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
      }
        $dados['birth'] = $dados['data_nascimento'];
        $dataP = explode('/', $dados['birth']);
        $dataAniversario = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

        $dados['rg_emission_date'] = $dados['RgEmissao'];
        $dataP = explode('/', $dados['rg_emission_date']);
        $dataRg = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

        $dados['data_entrada'] = $dados['data_entrada'];
        $dataP = explode('/', $dados['data_entrada']);
        $dataEntrada = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
        $consulta = DB::select('SELECT * FROM identificacao_usuario WHERE  id='.$id);
        $situacaoFinanceira = DB::table('situacao_financeira')->where('id', $consulta[0]->id_situacao_financeira)->update([
            'profissao'                             =>$dados['profissao'],
            'renda'                                 =>$dados['rendaMensalUsuario'],
            'reside_familia'                        =>$dados['reside'],
            'carteira_assinada'                     =>$dados['carteiraAssinada'],
            'bolsa_familia'                         =>$dados['bolsaFamilia'],
            'loasbpc'                               =>$dados['loas'],
            'previdencia'                           =>$dados['previdencia'],
        ]);
        
        $vulnerabilidade = DB::table('vulnerabilidade')->where('id', $consulta[0]->id_vulnerabilidade)->update([
            'ocupacao_irregular'               =>$dados['ocupacao_irregular'],
            'crianca_sozinha'                    =>$dados['criancaSozinhaDomicilio'],
            'idosos_dependentes'                 =>$dados['idosos_dependentes'],
            'desempregados'                      =>$dados['desemprego'],
            'deficientes'                  =>$dados['deficientes_na_familia'],
            'baixa_renda'                          =>$dados['baixaRenda'],
            'outros'                            =>$dados['outros'],
            ]);
            
        $endereco  = DB::table('endereco')->where('id', $consulta[0]->id_endereco)->update([
            'telefone'                            =>$dados['telefone'],
            'endereco'                          =>$dados['address'],
            'ponto_referencia'                  =>$dados['pontoReferencia'],
            'condicoes_moradia'                  =>$dados['condicoesMoradia'],
            'tipo_construcao'                   =>$dados['tipoConstrucao'],
            'comodos'                            =>$dados['qtdComodos'],
            'valor_aluguel'                       =>$dados['valorAluguel'],
        ]);
            

        $identificacaoPessoa = DB::table('identificacao_usuario')->where('id', $consulta[0]->id)->update([
                'nome'      => $dados['nome'],
                'apelido' => $dados['apelido'],
                'data_nascimento'     =>  $dataAniversario,
                'NIS'             =>$dados['nis'],
                'numero_rg'       =>$dados['rgNumero'],
                'data_emissao_rg'=>$dataRg,
                'certidao_nascimento' =>$dados['NumeroCadastro'],
                'uf_rg'           =>$dados['RGuf'],
                'emissao_rg'=>$dados['RgOrgaoEmissor'],
                'cpf'           => $cpf,
                'deficiente'     =>$dados['deficiente'],
                'deficiencia'     =>$dados['deficiencia'],
                'mae'        =>$dados['mae'],
                'pai'        =>$dados['pai'],
                'estado_civil'   =>$dados['estadoCivil'],
                'escolaridade'   =>$dados['escolaridade'],
                'data_inicial'   =>$dataEntrada,
                'data_final'   =>$dataSaida,
        ]);    
        // dd($identificacaoPessoa);

        //falta atualizar

   $apagar =  DB::table('membro_familiar')->where('id_identificacao_usuario',$consulta[0]->id)->delete();        
         for ($i=0; $i < count($dados) ; $i++) {
           if (isset($dados["nomeMembro".$i])) {
            // dd($dados);
             $membroNome = $dados["nomeMembro".$i];
             $membroParentesco = $dados["parentesco".$i];
             $membroIdade = $dados["idade".$i];
             $membroSexo = $dados["sexo".$i];
             $membroNis        = $dados["nis".$i];
             $loas             = $dados["loas".$i];
             $bolsa_familia    = $dados["bolsaFamilia".$i];
             $previdencia      = $dados["previdencia".$i];
             $rendaUsuario    = $dados["rendaMensalUser".$i];

            $composicaoFamiliar = DB::table('membro_familiar')->insertGetId([
            'id_identificacao_usuario'      =>$consulta[0]->id,
            'nome'                          =>$membroNome,
            'parentesco'                       =>$membroParentesco,
            'idade'                         =>$membroIdade,
            'sexo'                           =>$membroSexo,
            'nis'                           =>$membroNis,
            'loas'                          =>$loas,
            'bolsaFamilia'                  =>$bolsa_familia,
            'previdencia'                   =>$previdencia,
            'renda'                    =>$rendaUsuario,
              ]);
            }

            if (isset($dados["nomeMembro_".$i])) {
            $membroNome       = $dados["nomeMembro_".$i];
            $membroParentesco = $dados["parentesco_".$i];
            $membroIdade      = $dados["idade_".$i];
            $membroSexo       = $dados["sexo_".$i];
            $membroNis        = $dados["nis_".$i];
            $loas             = $dados["loas_".$i];
            $bolsa_familia    = $dados["bolsaFamilia_".$i];
            $previdencia      = $dados["previdencia_".$i];
            $rendaUsuario    = $dados["rendaMensalUser_".$i];

        $composicaoFamiliar = DB::table('membro_familiar')->insertGetId([
            'id_identificacao_usuario'      =>$consulta[0]->id,
            'nome'                          =>$membroNome,
            'parentesco'                       =>$membroParentesco,
            'idade'                         =>$membroIdade,
            'sexo'                           =>$membroSexo,
            'nis'                           =>$membroNis,
            'loas'                          =>$loas,
            'bolsaFamilia'                  =>$bolsa_familia,
            'previdencia'                   =>$previdencia,
            'renda'                    =>$rendaUsuario,

              ]);
            }
          }          
    if ($situacaoFinanceira == 1 || $vulnerabilidade == 1 ||   $endereco == 1 || $identificacaoPessoa == 1 ||  $composicaoFamiliar != null) {
     DB::commit();
        alert()->success('', 'Cadastro atualizado com sucesso!')->autoclose(2000);
         return Redirect::to('/family');
    }else{
             DB::rollback();
         alert()->error('Verifique as informações', 'Não foi possível atualizar o cadasto')->autoclose(3000);
         return Redirect::to('/family');
    }
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{

}    
    // public function atendimentosDiario() {
    //     $data = date('y-m-d');

    //     $identificacao = DB::select(
    //     'SELECT *, Identification_person.id as id_Identification_person FROM Identification_person,
    //                             address, situation_financial,vulnerabilities, attendance_daily, attendance_daily
    //                      where  Identification_person.id_address = address.id  and
    //                             Identification_person.id_situation_FInancial = situation_financial.id and
    //                             Identification_person.id_Vulnerabilities = vulnerabilities.id and
    //                             Identification_person.id = attendance_daily.id_Identification_person or attendance_daily.id = '.$data.' and
    //                            attendance_daily.data='.$data);        
    //  return view('vendor.adminlte.home', compact('identificacao'));

    // }    
}


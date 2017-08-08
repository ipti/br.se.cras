<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\identification_person;
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

        public function __construct(Request $request, Identification_person $identificacao )
    {
        $this->request = $request;
        $this->identificacao = $identificacao;
    }
public function index()
{

  $identificacao = DB::select('SELECT * FROM Identification_person');

   // $identificacao['birth'] = $dados['data_entrada'];
   //      $dataP = explode('/', $dados['birth']);
   //      $dataAniversario = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

            for ($i=0; $i < count($identificacao); $i++) {
               if (isset($identificacao[$i])) {
                // $identificacao['birth'] = $identificacao['birth'];
               $data = $identificacao[$i]->birth;
               $dataP = explode('-', $data);
               $dataAniversario = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
               $identificacao[$i]->birth = $dataAniversario;

               $dataEntrada = $identificacao[$i]->date_initial;
               $dataP = explode('-', $dataEntrada);
               $dataEntrada = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
               $identificacao[$i]->date_initial = $dataEntrada;
              }

            }
//     dd($identificacao);
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

$mensagens = array(
    // 'numero.max'               =>  "Campo maior que o esperado",
    // 'numero.min'               =>  "Campo menor que o esperado ",
    // 'data_entrada.required'    =>  "Data de Entrada é um campo obrigatório.",
    'nome.required'            =>  "O campo nome é obrigatório",
    // 'apelido.max'              =>  "o campo Apelido muito grande",
    // 'data_nascimento.required' =>  "Informe uma data de nascimento válida",
    // 'NumeroCadastro.required'  =>  "Campo obrigatório número de cadastro obrigatório",
    // 'nis.required'             =>  " O campo NIS é obrigatório"                       ,
    // 'nis.max'                  =>  " Valor digitado no campo NIS maior que o permitido",
    // 'rgNumero.required'        =>  "Campo RG é obrigatório",
    // 'RgEmissao.required'       =>  "Data de emissão do ŔG é um campo obrigatório",
    // 'RGuf.required'            =>  "Campo de UF do RG é um campo obrigatório",
    // 'RgOrgaoEmissor.required'  =>  "O campo de Órgão emissor do RG é obrigatório"
  );
    
    if (isset($dados['cpf'])) {
        
        $cpf = explode('.',$dados['cpf']);
        $cpf = $cpf[0].''.$cpf[1].''.$cpf[2];
        $cpf = explode('-',$cpf);
        $cpf = $cpf[0].''.$cpf[1];
        $dados['cpf'] = $cpf;
    }else{
        $dados['cpf'] = '00000000000';
    }


     $validator = Validator::make( $request->all(), [
            // 'numero'                =>'required|min:1|max:11',
            // 'data_entrada'          =>'required',
            'nome'                  =>'required|min:8|max:255',
            // 'apelido'               =>'min:0|max:150',
            // 'data_nascimento'       =>'required',
            // 'NumeroCadastro'        =>'required',
            // 'nis'                   =>'required|max:11',
            // 'rgNumero'              =>'required',
            // 'RgEmissao'             =>'required',
            // 'RGuf'                  =>'required',
            // 'RgOrgaoEmissor'        =>'required',
           ],$mensagens);

       if ($validator->fails()) {
       $validator->setAttributeNames($mensagens);
            return redirect('/familyCdst')->withErrors($validator)->withInput();
        }

        // dd($dados);

        if (is_null($dados['profissao'])) {
        $dados['profissao']= '';
        }if (is_null($dados['rendaFamiliar'])) {
        $dados['rendaFamiliar'] = 0;
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

// dd($dados);

        $dados['birth'] = $dados['data_nascimento'];
        $dataP = explode('/', $dados['birth']);
        $dataAniversario = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];



        $dados['rg_emission_date'] = $dados['RgEmissao'];
        $dataP = explode('/', $dados['rg_emission_date']);
        $dataRg = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

        // $dados['rg_emission_date'] = $dados['data_entrada'];
        // $dataP = explode('/', $dados['birth']);
        // $dataRg = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

        $dados['data_entrada'] = $dados['data_entrada'];
        $dataP = explode('/', $dados['data_entrada']);
        $dataEntrada = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

        $situacaoFinanceira = DB::table('situation_financial')->insertGetId([
            'profession'=>$dados['profissao'],
            'income_family'=>$dados['rendaFamiliar'],
            'family_reside'=>$dados['reside'],
            'wallet_signed'=>$dados['carteiraAssinada'],
            // 'family_benefits_value'=>$dados['valorBeneficio'],
            'bolsa_familia'=>$dados['bolsaFamilia'],
            'loasbpc'=>$dados['loas'],
            'previdencia'=>$dados['previdencia'],

        ]);
        // dd($situacaoFinanceira);

        $vulnerabilidade = DB::table('vulnerabilities')->insertGetId([
            'irregular_ocupation' =>$dados['ocupacao_irregular'],
            'children_alone'=>$dados['criancaSozinhaDomicilio'],
            'dependent_elderly'=>$dados['idosos_dependentes'],
            'unemployment'=>$dados['desemprego'],
            'deficient_family'=>$dados['deficientes_na_familia'],
            'lowIcome'=>$dados['baixaRenda'],
            'others'=>$dados['outros'],
            ]);

        $endereco  = DB::table('address')->insertGetId([
            'phone'  =>$dados['telefone'],
            'address'=>$dados['address'],
            'reference_point'=>$dados['pontoReferencia'],
            'conditions_home'=>$dados['condicoesMoradia'],
            'type_construct' =>$dados['tipoConstrucao'],
            'rooms'          =>$dados['qtdComodos'],
            'value_home'     =>$dados['valorAluguel'],
        ]);
//        dd($endereco);
        $identificacaoPessoa = DB::table('Identification_person')->insertGetId([
            'id_address' =>$endereco,
            'id_situation_FInancial'=>$situacaoFinanceira,
            'id_Vulnerabilities'  => $vulnerabilidade,
            'name'      => $dados['nome'],
            'nick_name' => $dados['apelido'],
            'birth'     =>  $dataAniversario,
            'NIS'             =>$dados['nis'],
            'rg_number'       =>$dados['rgNumero'],
            'rg_emission_date'=>$dataRg,
            'register_number' =>$dados['NumeroCadastro'],
            'rg_UF'           =>$dados['RGuf'],
            'rg_emission_organ'=>$dados['RgOrgaoEmissor'],
            'cpf'           => $cpf,
            'deficient'     =>$dados['deficiente'],
            'deficient_type'     =>$dados['deficiencia'],
            'mother'        =>$dados['mae'],
            'father'        =>$dados['pai'],
            'situation'   =>$dados['estadoCivil'],
            'schooling'   =>$dados['escolaridade'],
            'date_initial'   =>$dataEntrada,
            'date_end'   =>$dataSaida,
        ]);
        // dd($identificacaoPessoa);
        // dd($dados);
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
            $composicaoFamiliar = DB::table('family_composition')->insertGetId([
            'id_Identification_person'      =>$identificacaoPessoa,
            'name'                          =>$membroNome,
            'kinship'                       =>$membroParentesco,
            'idade'                         =>$membroIdade,
            'sex'                           =>$membroSexo,
            'nis'                           =>$membroNis,
            'loas'                          =>$loas,
            'bolsaFamilia'                  =>$bolsa_familia,
            'previdencia'                   =>$previdencia,
            'incomeUser'                    =>$rendaUsuario,
              ]);
            }
          }
          // dd($composicaoFamiliar);

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
        'SELECT *, Identification_person.id as id_Identification_person FROM Identification_person, address, situation_financial,vulnerabilities
                         where  Identification_person.id_address = address.id  and
                                Identification_person.id_situation_FInancial = situation_financial.id and
                                Identification_person.id_Vulnerabilities = vulnerabilities.id and
                                Identification_person.id='.$id );
        // dd($identificacao);
      $membros =  DB::select('SELECT family_composition.incomeUser,family_composition.nis,family_composition.loas,family_composition.bolsaFamilia,family_composition.previdencia,family_composition.name, family_composition.kinship, family_composition.idade,family_composition.sex
                                             FROM Identification_person, family_composition
                                             where family_composition.id_Identification_person = Identification_person.id
                                                and Identification_person.id ='.$id);

      // dd($membros);

        for ($i=0; $i < count($identificacao) ; $i++) {

            if (!is_null($identificacao[$i]->date_initial)) {
                $dataInicial = $identificacao[$i]->date_initial;
                $dataP = explode('-', $identificacao[$i]->date_initial);
                $dataInicial= $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->date_initial = $dataInicial;
            }
            if (!is_null($identificacao[$i]->date_end)) {
                $dataFinal = $identificacao[$i]->date_end;
                $dataP = explode('-', $identificacao[$i]->date_end);
                $dataFinal = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->date_end = $dataFinal;


            }if (!is_null($identificacao[$i]->birth)) {
                $dataAniversario = $identificacao[$i]->birth;
                $dataP = explode('-', $identificacao[$i]->birth);
                $dataAniversario = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->birth = $dataAniversario;

            }if (!is_null($identificacao[$i]->rg_emission_date)) {
                $RG = $identificacao[$i]->rg_emission_date;
                $dataP = explode('-', $identificacao[$i]->rg_emission_date);
                $RG = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[$i]->rg_emission_date = $RG;

            }
        }
       // dd($membros);
   return view('vendor.adminlte.layouts.Portal.Family.visualizarCadastro', compact('identificacao','membros'));

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

        $cpf = explode('.',$dados['cpf']);
        $cpf = $cpf[0].''.$cpf[1].''.$cpf[2];
        $cpf = explode('-',$cpf);
        $cpf = $cpf[0].''.$cpf[1];
        $dados['cpf'] = $cpf;

        if (is_null($dados["pontoReferencia"])) {
         $dados['pontoReferencia'] = "";
        }    
        if (is_null($dados['profissao'])) {
        $dados['profissao']= '';
        }if (is_null($dados['rendaFamiliar'])) {
        $dados['rendaFamiliar'] = 0;
        }if (is_null($dados['deficiencia'])) {
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



            // $update = DB::table('situation_financial')->where('id', $dados[''])->update([
            // dd($id);
        $consulta = DB::select('SELECT * FROM Identification_person WHERE  id='.$id);
            // dd($consulta);

        // dd($dados);
        $situacaoFinanceira = DB::table('situation_financial')->where('id', $consulta[0]->id_situation_FInancial)->update([
            'profession'                        =>$dados['profissao'],
            'income_family'                     =>$dados['rendaFamiliar'],
            'family_reside'                     =>$dados['reside'],
            'wallet_signed'                     =>$dados['carteiraAssinada'],
            // 'family_benefits_value'             =>$dados['valorBeneficio'],
            'bolsa_familia'                     =>$dados['bolsaFamilia'],
            'loasbpc'                           =>$dados['loas'],
            'previdencia'                       =>$dados['previdencia'],
        ]);

        $vulnerabilidade = DB::table('vulnerabilities')->where('id', $consulta[0]->id_Vulnerabilities)->update([
            'irregular_ocupation'               =>$dados['ocupacao_irregular'],
            'children_alone'                    =>$dados['criancaSozinhaDomicilio'],
            'dependent_elderly'                 =>$dados['idosos_dependentes'],
            'unemployment'                      =>$dados['desemprego'],
            'deficient_family'                  =>$dados['deficientes_na_familia'],
            'lowIcome'                          =>$dados['baixaRenda'],
            'others'                            =>$dados['outros'],
            ]);

            // $valor = DB::table('address')->select()
        $endereco  = DB::table('address')->where('id', $consulta[0]->id_address)->update([
            'phone'                            =>$dados['telefone'],
            'address'                          =>$dados['address'],
            'reference_point'                  =>$dados['pontoReferencia'],
            'conditions_home'                  =>$dados['condicoesMoradia'],
            'type_construct'                   =>$dados['tipoConstrucao'],
            'rooms'                            =>$dados['qtdComodos'],
            'value_home'                       =>$dados['valorAluguel'],
        ]);

        // var_dump($endereco);

        // dd($endereco);

        $identificacaoPessoa = DB::table('Identification_person')->where('id', $consulta[0]->id)->update([
            'name'                              =>$dados['nome'],
            'nick_name'                         =>$dados['apelido'],
            'birth'                             =>$dataAniversario,
            'NIS'                               =>$dados['nis'],
            'rg_number'                         =>$dados['rgNumero'],
            'rg_emission_date'                  =>$dataRg,
            'rg_UF'                             =>$dados['RGuf'],
            'rg_emission_organ'                 =>$dados['RgOrgaoEmissor'],
            'cpf'                               =>$dados['cpf'],
            'deficient'                         =>$dados['deficiente'],
            'deficient_type'                    =>$dados['deficiencia'],
            'mother'                            =>$dados['mae'],
            'father'                            =>$dados['pai'],
            'situation'                         =>$dados['estadoCivil'],
            'schooling'                         =>$dados['escolaridade'],
            'date_initial'                      =>$dataEntrada,
            'date_end'                          =>$dataSaida,
        ]);

        // dd($identificacaoPessoa) ;

   $apagar =  DB::table('family_composition')->where('id_Identification_person',$consulta[0]->id)->delete();

            

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

            $composicaoFamiliar = DB::table('family_composition')->insertGetId([
            'id_Identification_person'      =>$consulta[0]->id,
            'name'                          =>$membroNome,
            'kinship'                       =>$membroParentesco,
            'idade'                         =>$membroIdade,
            'sex'                           =>$membroSexo,
            'nis'                           =>$membroNis,
            'loas'                          =>$loas,
            'bolsaFamilia'                  =>$bolsa_familia,
            'previdencia'                   =>$previdencia,
            'incomeUser'                    =>$rendaUsuario,
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

        $composicaoFamiliar = DB::table('family_composition')->insertGetId([
            'id_Identification_person'      =>$consulta[0]->id,
            'name'                          =>$membroNome,
            'kinship'                       =>$membroParentesco,
            'idade'                         =>$membroIdade,
            'sex'                           =>$membroSexo,
            'nis'                           =>$membroNis,
            'loas'                          =>$loas,
            'bolsaFamilia'                  =>$bolsa_familia,
            'previdencia'                   =>$previdencia,
            'incomeUser'                    =>$rendaUsuario,

              ]);
            }
          }
          // dd($composicaoFamiliar);
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


    public function atendimentosIndex() {

        $data = date('y-m-d');
        $identificacao = DB::select(
    'SELECT *, Identification_person.name as nomeUser,attendance_daily.data as dataAtendimento, technician.name as tecnicoNome, technician.id as idTecnico  
                FROM Identification_person, address, situation_financial,vulnerabilities, attendance_daily, technician
                 where  Identification_person.id_address = address.id  and
                Identification_person.id_situation_FInancial = situation_financial.id and
                Identification_person.id_Vulnerabilities = vulnerabilities.id  AND
                Identification_person.id  = attendance_daily.id_Identification_person AND
                attendance_daily.technician = technician.id');

        // dd($identificacao);

        // $membro = DB::select('SELECT * FROM attendance_daily, family_composition where ');   

        $membro = DB::select('SELECT *, technician.name as tecnicoNome, technician.id as idTecnico  
                             from family_composition as fc, attendance_daily as atd, technician
                                where atd.id_family_composition = fc.id  AND  atd.technician = technician.id');

          // $membro = DB::table('attendance_daily')
          // ->join('family_composition', 'attendance_daily.id_family_composition','=','family_composition.id')
          // ->select('*')->get();

          // dd($membro);


        for ($i=0; $i < count($membro) ; $i++) {
            if (!is_null($membro[$i]->data)) {
                $dataInicial = $membro[$i]->data;
                $dataP = explode('-', $membro[$i]->data);
                $dataInicial = $dataP[2] . '/' . $dataP[1] . '/' . $dataP[0];
                $membro[$i]->data = $dataInicial;
            }
        }

        for ($i=0; $i < count($identificacao) ; $i++) {
            if (!is_null($identificacao[$i]->dataAtendimento)) {
                $dataInicial = $identificacao[$i]->dataAtendimento;
                $dataP = explode('-', $identificacao[$i]->dataAtendimento);
                $dataInicial = $dataP[2] . '/' . $dataP[1] . '/' . $dataP[0];
                $identificacao[$i]->dataAtendimento = $dataInicial;
            }
        }


        return view('vendor.adminlte.layouts.Portal.Atendimento.attendance', compact('identificacao', 'membro'));
    }




    public function atendimentos($id) {        
        $identificacao = DB::select('SELECT DISTINCT * FROM Identification_person where   Identification_person.id = '.$id); 
        // dd($identificacao);           
     $membro = DB::select('SELECT * FROM family_composition as fc where fc.id_Identification_person ='.$id);
            // dd($membro);
        $tecnicos = DB::select('SELECT * FROM technician');

        $servico = DB::select('SELECT * FROM service');
            //dd($tecnicos);
        
           // dd($identificacao[0]->id);
       // dd($membro);


     return view('vendor.adminlte.layouts.Portal.Atendimento.index', compact('identificacao', 'membro', 'tecnicos','servico'));
    }

    public function atendimentosDiario() {

        $data = date('y-m-d');

        $identificacao = DB::select(
        'SELECT *, Identification_person.id as id_Identification_person FROM Identification_person,
                                address, situation_financial,vulnerabilities, attendance_daily, attendance_daily
                         where  Identification_person.id_address = address.id  and
                                Identification_person.id_situation_FInancial = situation_financial.id and
                                Identification_person.id_Vulnerabilities = vulnerabilities.id and
                                Identification_person.id = attendance_daily.id_Identification_person or attendance_daily.id = '.$data.' and
                               attendance_daily.data='.$data);

        // dd($identificacao);

     return view('vendor.adminlte.home', compact('identificacao'));


    }

    public function cadastroAtentimentos(Request $reqeust, $id)
    {
         $dados = $this->request->all();
            dd($dados);
            //dd($id);
         if (is_null($dados['id_user'])) {
            $dados['id_user'] = $id;

            $dataP = explode('/', $dados['data_atendimento']);
            $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
            $dados['data_atendimento'] =  $dataSaida;
            $atendimento  = DB::table('attendance_daily')->insert([
            'service'                    =>$dados['servico'],
            'solicitation'               =>$dados['socicitacao'],
            'transfer'                   =>$dados['providencia'],
            'result'                     =>$dados['resultado'],
            'technician'                 =>$dados['tecnico'],
            'id_Identification_person'   =>$id,
            'id_family_composition'      =>0  ,
            'data'                       =>$dados['data_atendimento'],
             ]); }else{
             $id = $dados['id_user'];
            $dataP = explode('/', $dados['data_atendimento']);
            $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
            $dados['data_atendimento']   =  $dataSaida;

            $atendimento  = DB::table('attendance_daily')->insert([
            'service'                    =>$dados['servico'],
            'solicitation'               =>$dados['socicitacao'],
            'transfer'                   =>$dados['providencia'],
            'result'                     =>$dados['resultado'],
            'technician'                 =>$dados['tecnico'],
            'id_Identification_person'   =>0,
            'data'                       =>$dados['data_atendimento'],
            'id_family_composition'      =>$id
        ]);
        }

                // dd($atendimento);

       if ($atendimento == true) {
     DB::commit();
        alert()->success('', 'Atendimento Registrado com sucesso!')->autoclose(2000);
         return Redirect::to('/family');
    }else{
             DB::rollback();
         alert()->error('Verifique as informações', 'Não foi possível registrar o atendimento')->autoclose(3000);
         return Redirect::to('/family');
    }

    }


}

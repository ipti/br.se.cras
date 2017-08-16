<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendance_daily;
use Redirect;
use DB;
use Alert;
use Session;
use Validator;

class atendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     @return \Illuminate\Http\Response
     */
     public function __construct(Request $request)
    {
        $this->request = $request;        
    }

    public function index()
    {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {        
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $reqeust, $id)
    {
         $dados = $this->request->all();
            //dd($dados);
         // $teste = is_null($dados['id_user'];

         //    dd($teste);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\atendimentos;
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
        // $dataInicio = date('Y-m-d');
        

            $identificacao = DB::table('atendimentos')
                ->join('identificacao_usuario', 'atendimentos.id_identificacao_usuario', '=', 'identificacao_usuario.id')
                ->join('tecnico', 'atendimentos.tecnico', '=', 'tecnico.id')
                ->select('*','identificacao_usuario.nome as nome_usuario','tecnico.nome as nome_tecnico' 
                            ,'atendimentos.id_identificacao_usuario as id_usuario','atendimentos.id as id_atendimento')->get();

            //  dd($identificacao);

            $membro = DB::table('atendimentos')
            ->join('membro_familiar', 'atendimentos.id_membro_familiar','=','membro_familiar.id')
            ->join('tecnico', 'atendimentos.tecnico', '=', 'tecnico.id')
            ->select('*', 'tecnico.nome as nome_tecnico','atendimentos.id_membro_familiar as id_usuario',
            'membro_familiar.nome as nome_usuario'
            ,'atendimentos.id as id_atendimento')->get();
            
        // dd($membro);
            $totalAtendimento = DB::table('atendimentos')->select('total')->count();

            $totalFamilias = DB::table('identificacao_usuario')->select('totalFamilias')->count();
            // dd($totalAtendimento);
        return view('vendor.adminlte.layouts.Portal.Atendimento.attendance', compact('identificacao', 'membro'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {        
        $identificacao = DB::select('SELECT DISTINCT * FROM identificacao_usuario where   identificacao_usuario.id = '.$id); 
        
     $membro = DB::select('SELECT * FROM membro_familiar as fc where fc.id_identificacao_usuario ='.$id);
            // dd($membro);
        $tecnicos = DB::select('SELECT * FROM tecnico');

        $servico = DB::select('SELECT * FROM servico');
            // dd($servico);
        
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

         if (is_null($dados['id_user'])) {
            $dados['id_user'] = $id;

            $dataP = explode('/', $dados['data_atendimento']);
            $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
            $dados['data_atendimento'] =  $dataSaida;
            $atendimento  = DB::table('atendimentos')->insert([
            'servico'                    =>$dados['servico'],
            'solicitacao'               =>$dados['socicitacao'],
            'encaminhamento'                   =>$dados['providencia'],
            'resultado'                     =>$dados['resultado'],
            'tecnico'                 =>$dados['tecnico'],
            'id_identificacao_usuario'   =>$id,
            'id_membro_familiar'      =>0  ,
            'data'                       =>$dados['data_atendimento'],
             ]); }else{
             $id = $dados['id_user'];
            $dataP = explode('/', $dados['data_atendimento']);
            $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
            $dados['data_atendimento']   =  $dataSaida;

            $atendimento  = DB::table('atendimentos')->insert([
            'servico'                    =>$dados['servico'],
            'solicitacao'               =>$dados['socicitacao'],
            'encaminhamento'                   =>$dados['providencia'],
            'resultado'                     =>$dados['resultado'],
            'tecnico'                 =>$dados['tecnico'],
            'id_identificacao_usuario'   =>0,
            'data'                       =>$dados['data_atendimento'],
            'id_membro_familiar'      =>$id
        ]);
        }
         if ($atendimento == true) {
     DB::commit();
        alert()->success('', 'Atendimento Registrado com sucesso!')->autoclose(2000);
         return Redirect::to('/attendance');
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
    public function edit($id, $idAtendimento)
    {

        $identificacao = DB::table('atendimentos')
        ->join('identificacao_usuario', 'atendimentos.id_identificacao_usuario', '=', 'identificacao_usuario.id')
        ->select('*' , 'atendimentos.id as id_atendimento')->where([['atendimentos.id', $idAtendimento],
                        ['atendimentos.id_identificacao_usuario', $id]])->get();

        // dd($identificacao);

     $membro = DB::table('atendimentos')
                            ->join('membro_familiar', 'atendimentos.id_membro_familiar','=','membro_familiar.id')
                            ->select('*', 'atendimentos.id as id_atendimento')->where([['atendimentos.id', $idAtendimento],
                            ['atendimentos.id_membro_familiar', $id]])->get();
            //   dd($membro);
            // dd(count($identificacao));
        if(count($identificacao) > 0){
            if (!is_null($identificacao[0]->data)) {
                $dataInicial = $identificacao[0]->data;
                $dataP = explode('-', $identificacao[0]->data);
                $dataInicial= $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[0]->data = $dataInicial;
            }
            $tecnico = DB::table('tecnico')->select('*')->where('id', $identificacao[0]->tecnico)->get();
            // dd($tecnico);
            $tecnicos = DB::select('SELECT * FROM tecnico where NOT id ='.$tecnico[0]->id);
            // dd($tecnicos);
            $membro = DB::table('membro_familiar')->select('*')->where('id_identificacao_usuario', $id)->get();
            $servico = DB::table('servico')->get();
            return view('vendor.adminlte.layouts.Portal.Atendimento.attendanceEdit', 
            compact('identificacao', 'tecnico','tecnicos', 'membro', 'servico'));                  
            }else{
            $identificacao = $membro;   
                //  dd($identificacao);
            if (!is_null($identificacao[0]->data)) {
                $dataInicial = $identificacao[0]->data;
                $dataP = explode('-', $identificacao[0]->data);
                $dataInicial= $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
                $identificacao[0]->data = $dataInicial;
            }
            $tecnico = DB::table('tecnico')->select('*')->where('id', $identificacao[0]->tecnico)->get();
            // dd($tecnico);
            $tecnicos = DB::select('SELECT * FROM tecnico where NOT id ='.$tecnico[0]->id);
            $membro = DB::table('membro_familiar')->select('*')->where('id_identificacao_usuario', $id)->get();
            $servico = DB::table('servico')->get();
            return view('vendor.adminlte.layouts.Portal.Atendimento.attendanceEdit', 
            compact('identificacao', 'tecnico','tecnicos', 'membro', 'servico'));                  
            
        }
      
    //   return view('vendor.adminlte.layouts.Portal.Atendimento.attendanceEdit', compact('identificacao', 'membro'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $idAtendimento)
    {
        DB::beginTransaction();        
        $dados = $this->request->all();
        // dd($dados);
       

            $consulta = DB::select('SELECT * FROM atendimentos WHERE  id='.$idAtendimento);
            // dd($consulta);
            // dd($consulta[0]->id_identificacao_usuario);
            if ($consulta[0]->id_identificacao_usuario != 0) {
            $id = $dados['id_user'] = $consulta[0]->id_identificacao_usuario;
            $dataP = explode('/', $dados['data_atendimento']);
            $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
            $dados['data_atendimento'] =  $dataSaida;
            
            $atendimento  = DB::table('atendimentos')->where('id', $consulta[0]->id)->update([  
            'servico'                    =>$dados['servico'],
            'solicitacao'                =>$dados['socicitacao'],
            'encaminhamento'             =>$dados['providencia'],
            'resultado'                  =>$dados['resultado'],
            'tecnico'                    =>$dados['tecnico'],
            'id_identificacao_usuario'   =>$id,
            'id_membro_familiar'         =>0  ,
            'data'                       =>$dados['data_atendimento'],
             ]); 
            }else{
                // dd($dados);
           $id = $consulta[0]->id_membro_familiar;
            $dataP = explode('/', $dados['data_atendimento']);
            $dataSaida = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];
            $dados['data_atendimento']   =  $dataSaida;

            $atendimento  = DB::table('atendimentos')->where('id', $consulta[0]->id)->update([  
            'servico'                   =>$dados['servico'],
            'solicitacao'               =>$dados['socicitacao'],
            'encaminhamento'            =>$dados['providencia'],
            'resultado'                 =>$dados['resultado'],
            'tecnico'                   =>$dados['tecnico'],
            'id_identificacao_usuario'  =>0,
            'data'                      =>$dados['data_atendimento'],
            'id_membro_familiar'        =>$id
        ]);
        }
        // dd($atendimento);
        
         if ($atendimento == 1) {
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

<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\identificacao_usuario;
use DB;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {   
      
        $dataInicio = date('Y-m-d');


           $identificacao = DB::table('atendimentos')
             ->join('identificacao_usuario', 'atendimentos.id_identificacao_usuario', '=', 'identificacao_usuario.id')
             ->select('*')->where('atendimentos.data', $dataInicio)->get();

            //  dd($identificacao);

          $membro = DB::table('atendimentos')
          ->join('membro_familiar', 'atendimentos.id_membro_familiar','=','membro_familiar.id')
          ->select('*')->where('atendimentos.data', $dataInicio)->get();
          

            $totalAtendimento = DB::table('atendimentos')->select('total')->count();

            $totalFamilias = DB::table('identificacao_usuario')->select('totalFamilias')->count();
            // dd($totalAtendimento);
            
     return view('adminlte::home', compact('identificacao', 'totalAtendimento', 'totalFamilias', 'membro'));
        // return view('adminlte::home', compact('identificacao'));
    }
}

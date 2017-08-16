<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\identification_person;
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
//         dd($dataInicio);
//        "2017-07-01"

         $identificacao = DB::select('select  attendance_daily.data as dataAtendimento from attendance_daily,family_composition, Identification_person WHERE 
                                       attendance_daily.data = '.$dataInicio.' and
                                        attendance_daily.id_Identification_person = family_composition.id_Identification_person or
                                      attendance_daily.id_Identification_person = Identification_person.id 
                                       ');

         //dd($identificacao);

        $identificacao = DB::table('attendance_daily')
            ->join('Identification_person', 'attendance_daily.id_Identification_person', '=', 'Identification_person.id')
           ->join('family_composition',  'attendance_daily.id_Identification_person','=',
                'attendance_daily.id_Identification_person')
            ->select('*')->where('data', $dataInicio)->get();

           $identificacao = DB::table('attendance_daily')
             ->join('Identification_person', 'attendance_daily.id_Identification_person', '=', 'Identification_person.id')
             ->select('*')->where('attendance_daily.data', $dataInicio)->get();

             // dd($identificacao);

          $membro = DB::table('attendance_daily')
          ->join('family_composition', 'attendance_daily.id_family_composition','=','family_composition.id')
          ->select('*')->where('attendance_daily.data', $dataInicio)->get();
          

            $totalAtendimento = DB::table('attendance_daily')->select('total')->count();

            $totalFamilias = DB::table('Identification_person')->select('totalFamilias')->count();
            // dd($totalAtendimento);
            
     return view('adminlte::home', compact('identificacao', 'totalAtendimento', 'totalFamilias', 'membro'));
        return view('adminlte::home', compact('identificacao'));
    }
}
//protected $edit;

        //public function __construct(Request $request, attendance_daily $edit )
    //{
        //$this->request = $request;
        //$this->edit = $edit;
    // }
<?php

namespace App\Http\Controllers;

use App\Boleta;
use App\Boleta_Estudiante;
use App\Competencias;
use App\Preguntas;
use App\Transacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PreguntasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        //Seleccionamos los temas que de la boleta seleccionada
        if($this->check_avaliabilty(Auth::id(),$id))
        {
            $Temas = DB::table('boletas')
            ->select('temas.Nombre','temas.id')
            ->join('temas','temas.boleta_id','=','boletas.id')
            ->where('boletas.id','=',$id)
            ->get();
            //Obteniendo las Preguntas de la Boleta
            $Preguntas = DB::table('preguntas')
            ->where('preguntas.boleta_id','=',$id)
            ->get();
            //Preguntas del tema seleccionado
            $Pregunta = $Preguntas->first();
            $plucked = $Preguntas->pluck('id');
            //Obteniendo la subpregunta en caso de que los niños seleccionen de siempre a aveces
            $SubPregunta1 = DB::table('subpreguntas')
            ->where('subpreguntas.pregunta_id','=',$Pregunta->id)
            ->where('subpreguntas.Categoria','=',1)
            ->first();

            //Obteniendo la subpregunta en caso de que los niños seleccionen de poco a nunca
            $SubPregunta2 = DB::table('subpreguntas')
            ->where('subpreguntas.pregunta_id','=',$Pregunta->id)
            ->where('subpreguntas.Categoria','=',0)
            ->first();
            $Preguntas_Contestadas = DB::table('preguntas')
                ->where('preguntas.id','<',$Pregunta->id)
                ->where('preguntas.boleta_id','=',$id)
                ->count();

            //Obteniendo el set de respuestas para la 1ra pregunta
            if($SubPregunta1 != null)
            {
                $Ops1 = DB::table('respuestas')
            ->where('respuestas.Sub_Pregunta_id','=',$SubPregunta1->id)
            ->get();

            //Obteniendo el set de respuestas para la 2nda pregunta
            $Ops2 = DB::table('respuestas')
            ->where('respuestas.Sub_Pregunta_id','=',$SubPregunta2->id)
            ->get();

            return view('encuesta',["Preguntas"=>$Pregunta,"Sub1"=>$SubPregunta1,"Sub2"=>$SubPregunta2,"Opciones1"=>$Ops1,"Opciones2"=>$Ops2,"PluckData"=>$plucked,"Preguntas_Contestadas"=>$Preguntas_Contestadas]);
            }

            return view('encuesta',["Preguntas"=>$Pregunta,"Sub1"=>$SubPregunta1,"Sub2"=>$SubPregunta2,"PluckData"=>$plucked,"Preguntas_Contestadas"=>$Preguntas_Contestadas]);

        }
        else
        {
            return redirect()->action('PreguntasController@beneficiarios_error');
        }
    }

    public function beneficiarios()
    {
        $Boletas = DB::table('estudiante_boleta')
        ->where('estudiante_boleta.estudiante_id','=',Auth::id())->get();
        return view('Beneficiarios.index',["Boletas"=>$Boletas]);
    }

    public function beneficiarios_alert()
    {
        $Boletas = DB::table('estudiante_boleta')
        ->where('estudiante_boleta.estudiante_id','=',Auth::id())->get();
        $flag = true;
        return view('Beneficiarios.index',["Boletas"=>$Boletas,"Flag"=>$flag]);
    }

    public function beneficiarios_error()
    {
        $Boletas = DB::table('estudiante_boleta')
        ->where('estudiante_boleta.estudiante_id','=',Auth::id())->get();
        $flag = false;
        return view('Beneficiarios.index',["Boletas"=>$Boletas,"Flag"=>$flag]);
    }

    public function next_question($id)
    {   //Seleccionamos los temas que de la boleta seleccionada
        $Pregunta = DB::table('preguntas')
        ->where('preguntas.id','=',$id)->first();
        if($this->check_avaliabilty(Auth::id(),$Pregunta->boleta_id))
        {
            if($this->something_left($id,$Pregunta->boleta_id))
            {
                $plucked = DB::table('preguntas')
                ->where('preguntas.boleta_id','=',$Pregunta->boleta_id)
                ->get();
                //Obteniendo las Preguntas de la Boleta
                $Data = DB::table('preguntas')
                ->where('preguntas.id','>',$id)
                ->where('preguntas.boleta_id','=',$Pregunta->boleta_id)
                ->get();
                $Preguntas_Contestadas = DB::table('preguntas')
                ->where('preguntas.id','<=',$id)
                ->where('preguntas.boleta_id','=',$Pregunta->boleta_id)
                ->count();
                $Preguntas_Contestadas= $Preguntas_Contestadas +1;
                $Siguiente_Pregunta = $Data->first();
                //Obteniendo la subpregunta en caso de que los niños seleccionen de siempre a aveces
                $SubPregunta1 = DB::table('subpreguntas')
                ->where('subpreguntas.pregunta_id','=',$Siguiente_Pregunta->id)
                ->where('subpreguntas.Categoria','=',1)
                ->first();
                //Obteniendo la subpregunta en caso de que los niños seleccionen de poco a nunca
                $SubPregunta2 = DB::table('subpreguntas')
                ->where('subpreguntas.pregunta_id','=',$Siguiente_Pregunta->id)
                ->where('subpreguntas.Categoria','=',0)
                ->first();
                //Obteniendo el set de respuestas para la 1ra pregunta
                $Ops1 = DB::table('respuestas')
                ->where('respuestas.Sub_Pregunta_id','=',$SubPregunta1->id)
                ->get();
                //Obteniendo el set de respuestas para la 2nda pregunta
                $Ops2 = DB::table('respuestas')
                ->where('respuestas.Sub_Pregunta_id','=',$SubPregunta2->id)
                ->get();
                $Pregunta = DB::table('preguntas')
                ->where('preguntas.id','>',$id)->first();            //  Return response
                return view('encuesta',["Preguntas"=>$Pregunta,"Sub1"=>$SubPregunta1,"Sub2"=>$SubPregunta2,"Opciones1"=>$Ops1,"Opciones2"=>$Ops2,"PluckData"=>$plucked,"Preguntas_Contestadas"=>$Preguntas_Contestadas]);
            }
        }
        else
        {
            return redirect()->action('PreguntasController@beneficiarios_error');
        }
    }

    public function next(Request $request)
    {   //Guardamos las respuestas del estudiante
        $score = $request->get('score');
        //Seleccionamos los temas que de la boleta seleccionada
        $Pregunta = DB::table('preguntas')
        ->where('preguntas.id','=',$request->get('pregunta_id'))->first();
        $this->save_answers($request);
        if($this->something_left($request->get('pregunta_id'),$Pregunta->boleta_id))
        {
            //Obteniendo las Preguntas de la Boleta
            $Data = DB::table('preguntas')
            ->where('preguntas.id','>',$request->get('pregunta_id'))
            ->where('preguntas.boleta_id','=',$Pregunta->boleta_id);
            $Siguiente_Pregunta = $Data->first();
            //Obteniendo la subpregunta en caso de que los niños seleccionen de siempre a aveces
            $SubPregunta1 = DB::table('subpreguntas')
            ->where('subpreguntas.pregunta_id','=',$Siguiente_Pregunta->id)
            ->where('subpreguntas.Categoria','=',1)
            ->first();
            //Obteniendo la subpregunta en caso de que los niños seleccionen de poco a nunca
            $SubPregunta2 = DB::table('subpreguntas')
            ->where('subpreguntas.pregunta_id','=',$Siguiente_Pregunta->id)
            ->where('subpreguntas.Categoria','=',0)
            ->first();
            //Obteniendo el set de respuestas para la 1ra pregunta
            $Ops1 = DB::table('respuestas')
            ->where('respuestas.Sub_Pregunta_id','=',$SubPregunta1->id)
            ->get();
            //Obteniendo el set de respuestas para la 2nda pregunta
            $Ops2 = DB::table('respuestas')
            ->where('respuestas.Sub_Pregunta_id','=',$SubPregunta2->id)
            ->get();
            //  Return response
            return response()->json([
                'code'    => '500'
            ]);
        }
        else
        {
            $Transaccion = Boleta_Estudiante::where([
                ['estudiante_id', '=', Auth::id()],
                ['boleta_id', '=', $Pregunta->boleta_id],
            ])->delete();
        }
        //return view('encuesta',["Preguntas"=>$Pregunta,"Sub1"=>$SubPregunta1,"Sub2"=>$SubPregunta2,"Opciones1"=>$Ops1,"Opciones2"=>$Ops2,"PluckData"=>$plucked]);
    }

    protected function something_left($id,$boleta)
    {
        $Data = DB::table('preguntas')
        ->where('preguntas.id','>',$id)
        ->where('preguntas.boleta_id','=',$boleta)
        ->count();
        if($Data == 0 )
        {
            return false;
        }
        else{
            return true;
        }
    }

    protected function save_answers(Request $request)
    {
        $Pregunta = Preguntas::findOrFail($request->get('pregunta_id'));
        if($this->check_avaliabilty(Auth::id(),$Pregunta->boleta_id))
        {
            $Transacciones = Transacciones::firstOrNew(
            ['pregunta_id' => $request->get('pregunta_id')],
            ['estudiante_id' => Auth::id()]
            );

            $Transacciones->tema_id=$Pregunta->tema_id;
            $Boleta = Boleta::where('boletas.id','=',$Pregunta->boleta_id)->get();
            $Boleta = $Boleta[0]['id'];//No se porque extraña razon funciona aca, asi que no tocar.... no funciona $Boleta->get('id') |⌠ $Boleta->get() || $Boleta->id , funciona asi que no tocar :c
            $Competencia = Competencias::where('competencias.id','=',$Boleta)->get();
            $Transacciones->boleta_id = $Boleta;
            $Transacciones->competencia_id= $Competencia[0]['id'];
            $Transacciones->linea_id = $Competencia[0]['linea_id'];
            $Transacciones->valoracion =  $request->get('value');
            if($request->get('respuesta_id') !=null)
            {
                $Transacciones->respuesta_id = $request->get('respuesta_id');
            }
            $Transacciones->save();

        }
        else
        {

        }
    }

    protected function check_avaliabilty($estudiante_id,$boleta_id)
    {

        if(Boleta_Estudiante::where([['estudiante_id','=',$estudiante_id],['boleta_id','=',$boleta_id]])->count() > 0 )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
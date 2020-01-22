<?php

namespace App\Http\Controllers;

use App\Boleta;
use App\Competencias;
use App\Encuestas;
use App\Linea;
use App\Preguntas;
use App\Respuestas;
use App\SubPreguntas;
use App\Temas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function create_line(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $Encuesta = new Linea;
            $Encuesta->Nombre = $request->get('Nombre');
            $Encuesta->Descripcion = $request->get('Descripcion');
            $Encuesta->Año = now()->year ;
            $Encuesta->save();
            return response()->json(['code' => '500']);
        }
        else
        {
            return redirect()->route('beneficiarios');
        }
    }

    public function create_survey(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $Competencia = new Competencias;
            $Competencia->Nombre = $request->get('Nombre');
            $Competencia->Descripcion = $request->get('Descripcion');
            $Competencia->linea_id = $request->get('linea_id');
            $Competencia->save();
            return response()->json(['code' => '500']);
        }
        else
        {
            return redirect()->route('beneficiarios');
        }
    }

    public function create_signature(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $Nombre = $request->get('Nombre');
            $Descripcion = $request->get('Descripcion');
            $Encuesta = new Competencias;
            $Encuesta->Nombre = $Nombre;
            $Encuesta->Descripcion = $Descripcion;
            $Encuesta->Año = now()->year ;
            $Encuesta->save();
            return response()->json(['code' => '500']);
        }
        else
        {
            return redirect()->route('beneficiarios');
        }

    }

    public function show_lines()
    {
        if(auth()->user()->isAdmin())
        {
            $Lineas = Linea::all();
            return view('Administracion.encuestas_listado',["Encuestas"=>$Lineas]);
        }
        else
        {
            return redirect()->route('beneficiarios');
        }
    }

    public function create_ticket(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            $Nombre = $request->get('Nombre');
            $Encuesta_Id = $request->get('Encuesta_Id');
            $Boleta = new Boleta;
            $Boleta->Nombre = $Nombre;
            $Boleta->Encuesta_Id = $Encuesta_Id;
            $Boleta->save();
            return response()->json(['code' => '500']);
        }
        else
        {
            return redirect()->route('beneficiarios');
        }
    }

    public function modify_survey(Request $request,$id)
    {
        if(auth()->user()->isAdmin())
        {
            $Encuesta = Encuestas::findOrFail($id);
            $Encuesta->Nombre = $request->get('Nombre');
            $Encuesta->Descripcion = $request->get('Descripcion');;
            $Encuesta->Año = now()->year ;
            $Encuesta->save();
            return redirect()->route('ops', ['id' => $id]);
        }
        else
        {
            return redirect()->route('beneficiarios');
        }
    }

    public function destroy(Request $request)
    {
        if(auth()->user()->isAdmin())
        {
            if(Competencias::findOrFail($request->get('id')))
            {
                $Encuesta = Competencias::findOrFail($request->get('id'));
                $Encuesta->delete();
                return response()->json(['code' => '500']);
            }
            else{return response()->json(['code' => '404']);}
        }
        else
        {
            return redirect()->route('beneficiarios');
        }
    }

    public function add_question(Request $request)
    {
        ///Seguir desde aca
        $Pregunta               =   new Preguntas;
        $Pregunta->Pregunta     =   $request->get('Pregunta');
        $Pregunta->tema_id      =   $request->get('tema_id');
        $Pregunta->boleta_id    =   $request->get('boleta_id');
        $Pregunta->save();
        return redirect()->route('preguntas', ['id' => $request->get('boleta_id')]);
    }

    public function subquestions(Request $request,$id)
    {

        $SubPregunta1 = SubPreguntas::firstOrNew(
                        ['pregunta_id' => $id,
                        'Categoria' => 1]);
        $SubPregunta1->Nombre = $request->get('S1');
        $SubPregunta1->save();
        $SubPregunta2 = SubPreguntas::firstOrNew(
                        ['pregunta_id' => $id,
                        'Categoria' => 0]);
        $SubPregunta2->Nombre = $request->get('S2');
        $SubPregunta2->save();
        return back();
    }

    public function add_topic(Request $request)
    {
        $Tema           = new Temas;
        $Tema->Nombre   = $request->get('Nombre');
        $Tema->boleta_id= $request->get('boleta_id');
        $Tema->save();
        return redirect()->route('preguntas', ['id' => $request->get('boleta_id')]);
    }

    public function listado($id)
    {
        //$Signatures = Competencias::all();
        $Signatures = Competencias::where('linea_id','=',$id)->get();
        return view('Administracion.Listado',["Encuestas"=>$Signatures,"id"=>$id]);
    }
    public function operaciones($id)
    {
        $Boletas = Boleta::where('Encuesta_Id', $id)->get();
        $Encuesta = Competencias::findOrFail($id);
        return view('Administracion.Operaciones',["Boletas"=>$Boletas,"Encuesta"=>$Encuesta]);
    }

    public function ops_line($id)
    {
        return view('Administracion.menu_lineas',["id"=>$id]);
    }

    public function preguntas($id)
    {
        $Boleta = Boleta::findOrFail($id);
        $Preguntas = Preguntas::where("preguntas.boleta_id","=", $id)->get();
        $Temas = Temas::where("temas.boleta_id","=", $id)->get();
        return view("Administracion.Preguntas",["Temas"=>$Temas,"Preguntas"=>$Preguntas,"Boleta"=>$Boleta]);
    }

    public function add_answers(Request $request)
    {
        $Respuesta = new Respuestas;
        $Respuesta->Nombre=$request->get('Answer');
        $Respuesta->Sub_Pregunta_id=$request->get('sub_id');
        $Respuesta->save();
        return back();
    }

    public function destroy_question($id)
    {
        $Preguntas = Preguntas::findOrFail($id);
        $Preguntas->destroy();
        return back();
    }

    public function destroy_topic($id)
    {
        $Tema =Temas::findOrFail($id);
        $Tema->destroy();
        return back();
    }

    public function resultados($id)
    {
        $Boleta = Boleta::findOrFail($id);
        $Temas = Temas::where("temas.boleta_id","=", $id)->get();
        return view('Administracion.Resultados',["Boleta"=>$Boleta,"Temas"=>$Temas]);
    }

     public function General_Results($id)
    {
        $Linea = Linea::findOrFail($id);
        $Competencias = Competencias::where('competencias.linea_id','=',$id)->get();
        return view('Administracion.general_results',["Competencias"=>$Competencias,"Linea"=>$Linea]);
        //SELECT AVG(valoracion) FROM  transacciones WHERE transacciones.competencia_id= 3;*/
    }

    protected function check_avaliability($id)
    {

    }
}

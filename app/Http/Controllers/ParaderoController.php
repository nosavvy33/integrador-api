<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paradero;
use App\Alumno;

use App\Http\Resources\Paradero as ParaderoResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\AlumnoPosicion as Posicion;
class ParaderoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stops = Paradero::all();
        return ParaderoResource::collection($stops);
    }

    public function pasantiaAvailable($codigo){
        $pasantia = DB::table('pasantia')
                ->select('ubicacion','nombre_empresa','fecha_hora')
                ->where('alumno_idalumno','=',DB::raw('(select idalumno from alumno where codigo = '.$codigo.')'))
                ->get();
        $arr = array();
        foreach ($pasantia as $p) {
            $arr = (array) $p;
        }
        echo json_encode($arr);
    }


    public function streamingAlumnoUbicacion(Request $request){
        date_default_timezone_set("America/Lima");
        $time = date("Y-m-d H:i:s");
        $idregistro = $request->idregistro_posicion;
        if($idregistro == ''){
            $ubicacion = new Posicion();
            $ubicacion->ubicacion = $request->idregistro_posicion;
            $ubicacion->fecha_hora = $time;
            $idalumno = Alumno::select('idalumno')->where('codigo',$request->codigo)->get();
            $ubicacion->alumno_idalumno = $idalumno[0]->idalumno;
            $ubicacion->save();
            echo $ubicacion->idalumno_posicion;
        }else{
            $ubicacion = Posicion::find($request->idregistro_posicion);
            $ubicacion->ubicacion = $request->ubicacion;
            $ubicacion->fecha_hora = $time;
            $idalumno = Alumno::select('idalumno')->where('codigo',$request->codigo)->get();
            $ubicacion->alumno_idalumno = $idalumno[0]->idalumno;
            $ubicacion->save();
            echo $ubicacion->idalumno_posicion;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        if(!$request->has('nombre') || !$request->has('ubicacion') || !$request->has('horapartida')){
                throw new \Exception('Se esperaba campos obligatorios');
        }
        $paradero = new Paradero();
        $paradero->nombre = $request->input('nombre');
        $paradero->ubicacion  = $request->input('ubicacion');
        $paradero->horapartida  = $request->input('horapartida');
        $paradero->save();
             return response()->json($paradero,200 );
         }catch(\Exception $e){
            return response()->json(['type'=>'error','message'=>$e->getMessage()],500);
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
        $paradero = Paradero::find($id);
        return response()->json($paradero,200 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
        if(!$request->has('nombre') || !$request->has('ubicacion') || !$request->has('horapartida') || !$request->has('idparadero')){
                throw new \Exception('Se esperaba campos obligatorios');
        }
        $paradero = Paradero::find($request->idparadero);
        $paradero->nombre = $request->input('nombre');
        $paradero->ubicacion  = $request->input('ubicacion');
        $paradero->horapartida  = $request->input('horapartida');
        $paradero->save();
             return response()->json($paradero,200 );
         }catch(\Exception $e){
            return response()->json(['type'=>'error','message'=>$e->getMessage()],500);
        }
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
        $paradero =  Paradero::destroy($id);
            return response()->json(["message" => "Eliminado correctamente"],200 );

    }
}

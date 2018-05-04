<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paradero;
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
        $idregistro = $request->idubicacion;
        if($idregistro == ''){
            $ubicacion = new Posicion();
            $ubicacion->ubicacion = $request->ubicacion;
            $ubicacion->fecha_hora = $time;
            $query = collect(DB::table('alumno')
                ->select('idalumno')
                ->where('codigo','=',$request->codigo)
                ->get());
            $arr = array();
            foreach ($query as $q) {
                $arr = (array) $q;
            }
            $ubicacion->alumno_idalumno = $arr["idalumno"]; 
            $ubicacion->save();
            echo $ubicacion->idalumno_posicion;
        }else{
            $ubicacion = Posicion::find($request->idubicacion);
            $ubicacion->ubicacion = $request->ubicacion;
            $ubicacion->fecha_hora = $time;
            $query = collect(DB::table('alumno')
                ->select('idalumno')
                ->where('codigo','=',$request->codigo)
                ->get());
            $arr = array();
            foreach ($query as $q) {
                $arr = (array) $q;
            }
            $ubicacion->alumno_idalumno = $arr["idalumno"]; 
            $ubicacion->save();
            echo $ubicacion->idalumno_posicion;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

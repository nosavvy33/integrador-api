<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasantia;

class PasantiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasantia = Pasantia::all();
        return response()->json($pasantia,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            if(!$request->has('nombre_empresa') || !$request->has('idalumno') || !$request->has('inicio')){
        throw new \Exception("Se esperaba campos obligatorios");
            }
            $ubicacion = (empty($request->input('ubicacion')) ?'DESCONOCIDO' : $request->input('ubicacion') );
            $pasantia = new Pasantia();
            $pasantia->ubicacion = $ubicacion;
            $pasantia->nombre_empresa = $request->input('nombre_empresa');
            $pasantia->alumno_idalumno = $request->input('idalumno');
            $pasantia->fecha = $request->input('inicio');
            $pasantia->save();
             return response()->json($pasantia,200 );
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
        $pasantia = Pasantia::find($id);
          return response()->json($pasantia,200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       try{
            if(!$request->has('nombre_empresa') || !$request->has('idalumno') || !$request->has('inicio')){
        throw new \Exception("Se esperaba campos obligatorios");
            }
            $ubicacion = (empty($request->input('ubicacion')) ?'DESCONOCIDO' : $request->input('ubicacion') );
            $pasantia = Pasantia::find($request->input('idpasantia'));
            $pasantia->ubicacion = $ubicacion;
            $pasantia->nombre_empresa = $request->input('nombre_empresa');
            $pasantia->alumno_idalumno = $request->input('idalumno');
            $pasantia->fecha = $request->input('inicio');
            $pasantia->save();
             return response()->json($pasantia,200 );
        }catch(\Exception $e){
             return response()->json(['type'=>'error','message'=>$e->getMessage()],500);
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
          $pasantia =  Pasantia::destroy($id);
            return response()->json(["message" => "Eliminado correctamente"],200 );

    }
}

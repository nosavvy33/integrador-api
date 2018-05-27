<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\BusPosicion as Posicion;
class BusController extends Controller
{

    public function streamingBus(Request $request){
    try{
    if(!$request->has('ubicacion') || !$request->has('idbus') || !$request->has('idparadero')){
        throw new \Exception("Se esperaba campos obligatorios");
    }
    date_default_timezone_set("America/Lima");
    $time = date("Y-m-d H:i:s");
    if($request->idregistro == ''){
        $ubicacion = new Posicion();
        $ubicacion->inicio = $time;
        $ubicacion->ubicacion = $request->input('ubicacion');
        $ubicacion->estado = 'ACTIVO';
        $ubicacion->bus_idbus = $request->input('idbus');
        $ubicacion->paradero_idparadero = $request->input('idparadero');
        $ubicacion->save();
        echo $ubicacion->idbus_posicion;
    }else{
        if(!$request->has('idregistro')){
            throw new \Exception("Se esperaba campos obligatorios");
        }
        $ubicacion = Posicion::find($request->idregistro);
        $ubicacion->ubicacion = $request->input('ubicacion');
        $ubicacion->estado = 'ACTIVO';
        $ubicacion->bus_idbus = $request->input('idbus');
        $ubicacion->paradero_idparadero = $request->input('idparadero');
        $ubicacion->hora_ubicacion = $time;
        $ubicacion->save();
        echo $ubicacion->idbus_posicion;
    }
    }catch(\Exception $e){
        return response()->json(['type'=>'error','message'=>$e->getMessage()],500);

    }
    }


    public function searchOne(Request $request){
        try{
    if(!$request->has('placa')){
    throw new \Exception("Se esperaba campos obligatorios");
    }
    $bus = Bus::select('idbus')->where('placa','=',$request->placa)->get();
    echo $bus;
        }catch(\Exception $e){
        return response()->json(['type'=>'error','message'=>$e->getMessage()],500);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus = Bus::all();
    return response()->json($bus,200 );
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
        $bus = new Bus();
        $bus->placa = $request->input('placa');
        $bus->save();
     return response()->json($bus,200 );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id)->toArray();
    return response()->json($bus,200 );

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
    public function update(Request $request)
    {
        $bus = Bus::find($request->idbus);
        $bus->placa = $request->input('placa');
        $bus->save();
            return response()->json($bus,200 );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bus =  Bus::destroy($id);
            return response()->json(["message" => "Eliminado correctamente"],200 );


    }
}

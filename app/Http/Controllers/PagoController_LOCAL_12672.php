<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pago;
use App\Empleado;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */     
    
    public function prueba($fecha_inicio, $fecha_fin, $empleado_objetivo){
        
        $empleado = Pago::
            join('empleados','pagos.empleado_id', '=', 'empleados.id')
            ->where('empleado_id','=',$empleado_objetivo)
            ->first();

        /*$asignaciones = Pago::
            join('conceptos','pagos.concepto_id', '=', 'conceptos.id')
            ->where('empleado_id','=',$empleado_objetivo)
            ->whereBetween('fecha', array($fecha_inicio, $fecha_fin))
            ->where('conceptos.tipo','=','Asignacion')
            ->get();*/

        $asignaciones = Pago::
            join('conceptos','pagos.concepto_id', '=', 'conceptos.id')
            ->where('empleado_id','=',$empleado_objetivo)
            ->whereBetween('fecha', array($fecha_inicio, $fecha_fin))
            ->where('conceptos.tipo','=','Asignacion')
            ->get();
        
        $deducciones = Pago::
            join('conceptos','pagos.concepto_id', '=', 'conceptos.id')
            ->where('empleado_id','=',$empleado_objetivo)
            ->whereBetween('fecha', array($fecha_inicio, $fecha_fin))
            ->where('conceptos.tipo','=','Deduccion')
            ->get();

    echo "FECHA DE PAGO";

        echo "<br />";
        echo $fecha_inicio." al ".$fecha_fin;
        echo "<br /><br />";

    echo "DATOS DE EMPLEADO";

        echo "<li>".$empleado->cedula."</li>";
        echo "<li>".$empleado->nombre."</li>";
        echo "<li>".$empleado->apellido."</li>";
        echo "<br />";

    echo "ASIGNACIONES";

        //$total_asignaciones = 0;
    
        foreach ($asignaciones as $asignacion){
            $total_asignaciones = $asignaciones->sum('monto');
            //$total_asignaciones = $asignacion->monto + $total_asignaciones;
            echo "<li>".$asignacion->concepto->descripcion ." ". $asignacion->monto. " ". $asignacion->fecha."</li>";
        }
        
        echo "<br />";
        echo "Total asignaciones: ".$total_asignaciones;
        echo "<br /><br />";

    echo "DEDUCCIONES";

        //$total_deducciones = 0;
    
        foreach ($deducciones as $deduccion){
            $total_deducciones = $deducciones->sum('monto');
            //$total_deducciones = $deduccion->monto + $total_deducciones;
            echo "<li>".$deduccion->concepto->descripcion ." ". $deduccion->monto." ". $deduccion->fecha."</li>";
        }
        
        echo "<br />";
        echo "Total deducciones: ".$total_deducciones;
        echo "<br /><br />";
        
        echo "TOTAL A COBRAR: ";
        echo ($total_asignaciones)-($total_deducciones);
    }
    
    public function index()
    { 
        //Buscar un pagos
        dd ($todos_pagos = Pago::all());
        
        //return $pagos = $todos_pagos->where('empleado_id','=', 1)->where('fecha','>=','2018-01-16')->where('fecha','<=','2018-01-31');
        
        //$asignaciones = $pagos->concepto->where('tipo','=','Asignacion')->get();
        //$deducciones = $pagos->concepto->where('tipo','=','Deduccion')->get();

        //return view('pagos',compact('pagos','empleado','asignaciones','deducciones'));
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

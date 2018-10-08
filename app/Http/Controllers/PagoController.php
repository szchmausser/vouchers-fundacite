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
    
    public function pruebas(){

        $pagos = Pago::findOrfail(5);    
        $empleado = $pagos->empleado;
        $concepto =  $pagos->concepto;
        
        return view('pruebas', compact('pagos','empleado','concepto'));
        
    }

    public function index()
    { 
        //https://laracasts.com/discuss/channels/eloquent/eloquent-equivalent-of-inner-join?page=1
        //https://laravel.io/forum/07-21-2015-eloquent-between-two-dates-from-database
        //https://richos.gitbooks.io/laravel-5/content/capitulos/chapter7.html
        //https://es.stackoverflow.com/questions/176828/consulta-m%C3%BAltiples-tablas-con-laravel-eloquent
        //https://es.stackoverflow.com/questions/115244/como-consultar-registros-entre-dos-tablas-relacionadas-en-laravel
        
        $buscar = '17201169';
        $fecha_inicio = '2018-01-01';
        $fecha_fin = '2018-01-31';
        
        $empleado = Empleado::where('cedula',$buscar)->first();
        
        $asignaciones = Pago
            ::join('empleados','pagos.empleado_id', '=', 'empleados.id')
            ->join('conceptos','pagos.concepto_id', '=', 'conceptos.id')
            ->whereBetween('fecha', array($fecha_inicio, $fecha_fin))
            ->where('empleados.cedula','=',$buscar)
            ->where('conceptos.tipo','=','Asignacion')
            ->select('pagos.monto','conceptos.descripcion')
            ->get();
        
        $deducciones = Pago
            ::join('empleados','pagos.empleado_id', '=', 'empleados.id')
            ->join('conceptos','pagos.concepto_id', '=', 'conceptos.id')
            ->whereBetween('fecha', array($fecha_inicio, $fecha_fin))
            ->where('empleados.cedula','=',$buscar)
            ->where('conceptos.tipo','=','Deduccion')
            ->select('pagos.monto','conceptos.descripcion')
            ->get();
        
        return view('pagos',compact('empleado','asignaciones','deducciones'));
    }
    
    public function buscar($fecha_inicio, $fecha_fin, $buscar)
    {        
        //https://laracasts.com/discuss/channels/eloquent/eloquent-equivalent-of-inner-join?page=1
        //https://laravel.io/forum/07-21-2015-eloquent-between-two-dates-from-database
        //https://richos.gitbooks.io/laravel-5/content/capitulos/chapter7.html
        //https://es.stackoverflow.com/questions/176828/consulta-m%C3%BAltiples-tablas-con-laravel-eloquent
        //https://es.stackoverflow.com/questions/115244/como-consultar-registros-entre-dos-tablas-relacionadas-en-laravel
               
        $empleado = Empleado::where('cedula',$buscar)->first();
        
        $asignaciones = Pago
            ::join('empleados','pagos.empleado_id', '=', 'empleados.id')
            ->join('conceptos','pagos.concepto_id', '=', 'conceptos.id')
            ->whereBetween('fecha', array($fecha_inicio, $fecha_fin))
            ->where('empleados.cedula','=',$buscar)
            ->where('conceptos.tipo','=','Asignacion')
            ->select('pagos.monto','conceptos.descripcion')
            ->get();
        
        $deducciones = Pago
            ::join('empleados','pagos.empleado_id', '=', 'empleados.id')
            ->join('conceptos','pagos.concepto_id', '=', 'conceptos.id')
            ->whereBetween('fecha', array($fecha_inicio, $fecha_fin))
            ->where('empleados.cedula','=',$buscar)
            ->where('conceptos.tipo','=','Deduccion')
            ->select('pagos.monto','conceptos.descripcion')
            ->get();
        
        return view('pagos',compact('empleado','asignaciones','deducciones'));
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

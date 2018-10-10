@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fecha de pago: {{$fecha_inicio}} al {{$fecha_fin}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h5>Datos del empleado:</h5>

                        <li>Cedula: {{$empleado->cedula}}</li>
                        <li>Nombre: {{$empleado->nombre}}</li>
                        <li>Apellido{{$empleado->apellido}}</li>
                        
                    <hr>
                    
                    <h5>Asignaciones:</h5>
  
                        @foreach ($asignaciones as $asignacion)
                            <li>{{$asignacion->concepto->descripcion}} {{$asignacion->monto}}</li>
                        @endforeach

                    <hr>
                        <b>Total asignaciones: {{$asignaciones->sum('monto')}}</b>    
                    <hr>
                    
                    <h5>Deducciones:</h5>
  
                        @foreach ($deducciones as $deduccion)
                            <li>{{$deduccion->concepto->descripcion}} {{$deduccion->monto}}</li>
                        @endforeach

                    <hr>
                        <b>Total deducciones: {{$deducciones->sum('monto')}}</b>
                    <hr>
                    
                    <hr>
                        
                    <h4>Total a cobrar: {{$asignaciones->sum('monto') - $deducciones->sum('monto')}}</h4>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

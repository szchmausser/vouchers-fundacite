@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de pagos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Empleado:</h2>
                    {{$empleado->cedula}} {{$empleado->nombre}} {{$empleado->apellido}}
                    
                    <h2>Asignaciones:</h2>
                    <!--Mostrar variable que almacena multiples registro-->
                    @foreach ($asignaciones as $asignacion)
                        <p>{{$asignacion->cedula}} {{ $asignacion->monto }} {{ $asignacion->descripcion }}</p>
                    @endforeach
                    
                    <h2>Deducciones:</h2>
                    <!--Mostrar variable que almacena multiples registro-->
                    @foreach ($deducciones as $deduccion)
                        <p>{{ $deduccion->monto }} {{ $deduccion->descripcion }}</p>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

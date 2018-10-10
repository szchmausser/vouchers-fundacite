@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Informacion de pago especifico</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <li>pagos_id:{{$pagos->id}}</li>
                    <li>pagos_fecha: {{$pagos->fecha}}</li>
                    <li>pagos_monto: {{$pagos->monto}}</li>
                    <br />
                    <li>empleado_id: {{$pagos->empleado_id}}</li>
                    <li>empleado_nombre: {{$empleado->nombre}}</li>
                    <br />
                    <li>concepto_id: {{$pagos->concepto_id}}</li>
                    <li>concepto_tipo: {{$concepto->tipo}}</li>
                    <li>concepto_descripcion: {{$concepto->descripcion}}</li>
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

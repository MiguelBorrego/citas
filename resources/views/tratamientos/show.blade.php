@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Tratamiento del Paciente {{$tratamiento->cita->paciente->fullname}}</h2></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <h3>Detalles Del Tratamiento</h3>
                            <h5>Dada por el médico {{$tratamiento->cita->medico->fullname}}</h5>
                            <h5>En la cita {{$tratamiento->cita->fecha_hora}}/{{$tratamiento->cita->hora_final}}</h5>
                            <h5>Fecha Inicial: {{$tratamiento->fecha_inicial}}</h5>
                            <h5>Fecha Final: {{$tratamiento->fecha_final}}</h5>
                            <h5>Descripción: {{$tratamiento->descripcion}}</h5>
                        </table>
                        <h1> </h1>
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicamento_tratamientos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Añadir medicamento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        <h4>Lista De Medicamentos</h4>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre Comercial</th>
                                <th>Unidades</th>
                                <th>Frecuencia</th>
                                <th>Instrucciones</th>
                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($medicamento_tratamientos as $medicamento_tratamiento)
                                <tr>
                                    <td>{{ $medicamento_tratamiento->medicamento->nombre_comercial}}</td>
                                    <td>{{ $medicamento_tratamiento->unidades }}</td>
                                    <td>{{ $medicamento_tratamiento->frecuencia}}</td>
                                    <td>{{ $medicamento_tratamiento->instrucciones}}</td>

                                    <td>

                                        {!! Form::open(['route' => ['medicamento_tratamientos.edit',$medicamento_tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicamento_tratamientos.show',$medicamento_tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver Medicamento', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicamento_tratamientos.destroy',$medicamento_tratamiento->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection


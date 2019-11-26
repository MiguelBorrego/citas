@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cita del Paciente {{ $cita->paciente->full_name}}: {{$cita->fecha_hora}}</div>

                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Hora final</th>
                                <th>Localización</th>
                                <th>Médico</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            <tr>
                                <td>{{ $fecha_final }}</td>
                                <td>{{ $cita->localizacion }}</td>
                                <td>{{ $cita->medico->full_name }}</td>
                                <td>
                                    {!! Form::open(['route' => ['citas.edit',$cita->id], 'method' => 'get']) !!}
                                    {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['citas.destroy',$cita->id], 'method' => 'delete']) !!}
                                    {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'citas.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear cita', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Hora Final De La Cita</th>
                                <th>Duración (min)</th>
                                <th>Localización</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->hora_final}}</td>
                                    <td>{{ $cita->duracion }}</td>
                                    <td>{{ $cita->localizacion->hospital}}</td>
                                    <td>{{ $cita->medico->full_name }}</td>
                                    <td>{{ $cita->paciente->full_name}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['citas.edit',$cita->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                    <td>
                                        {!! Form::open(['route' => ['citas.show',$cita->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>

                                    <td>
                                        {!! Form::open(['route' => ['citas.destroy',$cita->id], 'method' => 'delete']) !!}
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
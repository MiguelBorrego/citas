@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Cita del Paciente {{ $cita->paciente->full_name}}</h2></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <h4>Fecha Hora: {{$cita->fecha_hora}}</h4>
                            <h2> </h2>
                            <h4>Localización: Hospital {{$cita->localizacion->hospital}}</h4>
                            <p>- Ciudad: {{$cita->localizacion->ciudad}}</p>
                            <p>- Direccion: {{$cita->localizacion->direccion}}</p>
                        </table>
                        <h1> </h1>
                        @include('flash::message')
                        {!! Form::open(['route' => 'tratamientos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear tratamiento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        <h4>Lista De Tratamientos</h4>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Descripción</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($tratamientos as $tratamiento)
                                <tr>
                                    <td>{{ $tratamiento->fecha_inicial }}</td>
                                    <td>{{ $tratamiento->fecha_final }}</td>
                                    <td>{{ $tratamiento->descripcion }}</td>

                                    <td>

                                        {!! Form::open(['route' => ['tratamientos.edit',$tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['tratamientos.destroy',$tratamiento->id], 'method' => 'delete']) !!}
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

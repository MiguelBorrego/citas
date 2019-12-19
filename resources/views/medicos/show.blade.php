@extends('layouts.app')

@section('content')
    <Style>
        .Page-item{
            display: inline-block;
            padding: 10px;
        }
    </Style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Citas Del Médico {{$nombremedico}}</h2></div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'citas.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear cita', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        @if($todas)
                            {!! Form::open(['route' => ['medicos.show',$id], 'method' => 'get', 'class'=>'inline-important']) !!}
                            {!!   Form::submit('Ver citas futuras', ['class'=> 'btn btn-success'])!!}
                            {!! Form::close() !!}

                        @else
                            {!! Form::open(['route' => ['medicos.showAll',$id], 'method' => 'get', 'class'=>'inline-important']) !!}
                            {!!   Form::submit('Ver todas las citas', ['class'=> 'btn btn-success'])!!}
                            {!! Form::close() !!}
                        @endif
                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Hora Final De La Cita</th>
                                <th>Duración</th>
                                <th>Localización</th>
                                <th>Paciente</th>
                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->hora_final}}</td>
                                    <td>{{ $cita->duracion }}</td>
                                    <td>{{ $cita->localizacion->hospital }}</td>
                                    <td>{{ $cita->paciente->full_name }}</td>
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
                        <div>
                            {{$citas->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


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
                    <div class="panel-heading">Medicación</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicamento_tratamientos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear Asociación', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Paciente</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Final</th>
                                <th>Medicamento</th>
                                <th>Unidades</th>
                                <th>Frecuencia</th>
                                <th>Instrucciones</th>
                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($medicamento_tratamientos as $medicamento_tratamiento)


                                <tr>
                                    <td>{{ $medicamento_tratamiento->tratamiento->cita->paciente->fullname }}</td>
                                    <td>{{ $medicamento_tratamiento->tratamiento->fecha_inicial}}</td>
                                    <td>{{ $medicamento_tratamiento->tratamiento->fecha_final }}</td>
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
                        <div>
                            {{$medicamento_tratamientos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

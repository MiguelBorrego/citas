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
                    <div class="panel-heading"><h2>Tratamientos Del Paciente {{$nombrepaciente}}</h2></div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'tratamientos.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear Tratamiento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        @if($todos)
                            {!! Form::open(['route' => ['pacientes.show2',$id], 'method' => 'get', 'class'=>'inline-important']) !!}
                            {!!   Form::submit('Ver solo tratamientos vigentes', ['class'=> 'btn btn-success'])!!}
                            {!! Form::close() !!}

                        @else
                            {!! Form::open(['route' => ['pacientes.show2All',$id], 'method' => 'get', 'class'=>'inline-important']) !!}
                            {!!   Form::submit('Ver todos los tratamientos', ['class'=> 'btn btn-success'])!!}
                            {!! Form::close() !!}
                        @endif

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha Inicial</th>
                                <th>Fecha Final</th>
                                <th>Descripción</th>
                                <th colspan="3">Acciones</th>
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
                                        {!! Form::open(['route' => ['tratamientos.show',$tratamiento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver Detalles', ['class'=> 'btn btn-primary'])!!}
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
                        <div>
                            {{$tratamientos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

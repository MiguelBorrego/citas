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
                    <div class="panel-heading"><h2>Medicos</h2></div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicos.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear medico', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <div class="panel-body">
                            <h3>Filtros</h3>
                            {!! Form::open(['route' => 'medicos.indexBusqueda','method' => 'get']) !!}
                            <div class="form-group">
                                {!! Form::label('fullname', 'Nombre del médico') !!}
                                {!! Form::text('fullname',null,['class'=>'form-control', 'autofocus']) !!}
                            </div>
                            {!! Form::submit('Buscar',['class'=>'btn-primary btn']) !!}
                            {!! Form::close() !!}
                        </div>

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Especialidad</th>
                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($medicos as $medico)


                                <tr>
                                    <td>{{ $medico->name }}</td>
                                    <td>{{ $medico->surname }}</td>
                                    <td>{{ $medico->especialidad->name }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['medicos.edit',$medico->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicos.show',$medico->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver citas', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicos.destroy',$medico->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div>
                            {{$medicos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
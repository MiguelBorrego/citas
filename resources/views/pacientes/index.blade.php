@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'pacientes.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear paciente', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>NUHSA</th>
                                <th>Aseguradora</th>
                                <th>Enfermedad</th>

                                <th colspan="3">Acciones</th>
                            </tr>

                            @foreach ($pacientes as $paciente)


                                <tr>
                                    <td>{{ $paciente->name }}</td>
                                    <td>{{ $paciente->surname }}</td>
                                    <td>{{ $paciente->nuhsa }}</td>
                                    <td>
                                        @if($paciente->aseguradora_id==null)
                                            Sin Aseguradora
                                        @else
                                            {{ $paciente->aseguradora->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($paciente->enfermedad_id==null)
                                            Sin Enfermedad
                                        @else
                                            {{ $paciente->enfermedad->name }}
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.edit',$paciente->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.show',$paciente->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Ver Citas', ['class'=> 'btn btn-primary'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.destroy',$paciente->id], 'method' => 'delete']) !!}
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
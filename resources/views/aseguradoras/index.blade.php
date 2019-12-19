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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Aseguradoras</h2></div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'aseguradoras.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear aseguradora', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'aseguradoras.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todas', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                            @foreach ($aseguradoras as $aseguradora)
                                <tr>
                                    <td>{{ $aseguradora->name }}</td>
                                    <td>
                                        {!! Form::open(['route' => ['aseguradoras.edit',$aseguradora->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['aseguradoras.destroy',$aseguradora->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div>
                            {{$aseguradoras->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
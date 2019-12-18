@extends('layouts.app')

@section('content')
    <Style>
        .page-item{
            display: inline-block;
            padding: 10px;
        }
    </Style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicamentos</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicamentos.create', 'method' => 'get', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Crear medicamento', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'medicamentos.destroyAll', 'method' => 'delete', 'class'=>'inline-important']) !!}
                        {!!   Form::submit('Borrar todos', ['class'=> 'btn btn-danger','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}


                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre comercial</th>
                                <th>Composición</th>
                                <th>Presentación</th>
                                <th>URL Vademecum</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($medicamentos as $medicamento)


                                <tr>
                                    <td>{{ $medicamento->nombre_comercial}}</td>
                                    <td>{{ $medicamento->composicion }}</td>
                                    <td>{{ $medicamento->presentacion}}</td>
                                    <td>{{ $medicamento->URL_Vademecum}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['medicamentos.edit',$medicamento->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicamentos.destroy',$medicamento->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div>
                            {{$medicamentos->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

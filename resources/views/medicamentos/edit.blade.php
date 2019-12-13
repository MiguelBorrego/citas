@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar medicamento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($medicamento, [ 'route' => ['medicamentos.update',$medicamento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('nombre_comercial', 'Nombre comercial del medicamento') !!}
                            {!! Form::text('nombre_comercial',$medicamento->nombre_comercial,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('composicion', 'Composición del medicamento') !!}
                            {!! Form::text('composicion',$medicamento->composicion,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('presentacion', 'Presentación del medicamento') !!}
                            {!! Form::text('presentacion',$medicamento->presentacion,['class'=>'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('URL_Vademecum', 'URL Vademecum del medicamento') !!}
                            {!! Form::text('URL_Vademecum',$medicamento->URL_Vademecum,['class'=>'form-control', 'required']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


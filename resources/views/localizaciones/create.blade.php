@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear localización</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'localizaciones.store']) !!}
                        <div class="form-group">
                            {!! Form::label('hospital', 'Nombre del hospital') !!}
                            {!! Form::text('hospital',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('ciudad', 'Ciudad del hospital') !!}
                            {!! Form::text('ciudad',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('direccion', 'Dirección del hospital') !!}
                            {!! Form::text('direccion',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>

                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

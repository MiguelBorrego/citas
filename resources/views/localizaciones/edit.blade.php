@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar localización</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($localizacion, [ 'route' => ['localizaciones.update',$localizacion->id], 'method'=>'PUT']) !!}
                        <div class="form-group">

                            {!! Form::label('hospital', 'Nombre del hospital') !!}
                            {!! Form::text('hospital',$localizacion->hospital,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div>
                            {!! Form::label('ciudad', 'Ciudad del hospital') !!}
                            {!! Form::text('ciudad',$localizacion->ciudad,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div>
                            {!! Form::label('direccion', 'Dirección del hospital') !!}
                            {!! Form::text('direccion',$localizacion->direccion,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

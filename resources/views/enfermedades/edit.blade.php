@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar enfermedad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($enfermedad, [ 'route' => ['enfermedades.update',$enfermedad->id], 'method'=>'PUT', 'class'=>'form-inline']) !!}
                        <div class="form-group">

                            {!! Form::label('name', 'Nombre de la enfermedad') !!}
                            {!! Form::text('name',$enfermedad->name,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        {!! Form::submit('Actualizar',['class'=>'btn-primary btn']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


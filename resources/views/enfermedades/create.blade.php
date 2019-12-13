@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear enfermedad</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'enfermedades.store']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre de la enfermedad') !!}
                            {!! Form::text('name',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('especialidad_id', 'Especialidad enfermedad') !!}
                            <br>
                            <select id="especialidad_id" name="especialidad_id" class="form-control" required="required">
                                @foreach($especialidades as $especialidad)
                                    <option value={{$especialidad->id}}> {{$especialidad->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


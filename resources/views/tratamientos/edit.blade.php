@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar tratamiento</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($tratamiento, [ 'route' => ['tratamientos.update',$tratamiento->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha_inicial', 'Fecha Inicial del Tratamiento') !!}

                            <input type="date-local" id="fecha_inicial" name="fecha_inicial" class="form-control" value="{{$tratamiento->fecha_inicial}}" />

                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha_final', 'Fecha Final del Tratamiento') !!}

                            <input type="date-local" id="fecha_final" name="fecha_final" class="form-control" value="{{$tratamiento->fecha_final}}" />

                        </div>
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción del Tratamiento') !!}
                            {!! Form::text('descripcion',$tratamiento->descripcion,['class'=>'form-control', 'required']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('cita_id', 'Cita en la que se ha realizado el tratamiento') !!}
                            <br>
                            <select id="cita_id" name="cita_id" class="form-control">
                                @foreach($citas as $cita)
                                    <option value={{$cita->id}}> {{$cita->paciente->full_name}}/{{$cita->fecha_hora}}</option>
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


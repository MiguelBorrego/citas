@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Modificar cita</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::model($cita, [ 'route' => ['citas.update',$cita->id], 'method'=>'PUT']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha_hora', 'Fecha y hora de la cita') !!}


                            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\TH:i')}}" />


                        </div>
                        <div class="form-group">
                            {!! Form::label('duracion', 'Duración en minutos') !!}
                            {!! Form::text('duracion',$cita->duracion,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('localizacion_id', 'Localización de la cita') !!}
                            <br>
                            <select id="localizacion_id" name="localizacion_id" class="form-control">
                                @foreach($localizaciones as $localizacion)
                                    <option value={{$localizacion->id}}> {{$localizacion->ciudad}}/{{$localizacion->hospital}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico') !!}
                            <br>
                            <select id="medico_id" name="medico_id" class="form-control">
                                @foreach($medicos as $medico)
                                    <option value={{$medico->id}}> {{$medico->full_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            <select id="paciente_id" name="paciente_id" class="form-control">
                                @foreach($pacientes as $paciente)
                                    <option value={{$paciente->id}}> {{$paciente->full_name}}</option>
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
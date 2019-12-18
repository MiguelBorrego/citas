@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Medicamento {{$medicamento->nombre_comercial}}</h2></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <h3>Detalles Del Medicamento</h3>
                            <h1> </h1>
                            <h4>URL a la página web Vademecum:</h4>
                            <h5>{{ $medicamento->URL_Vademecum}}</h5>
                            <h1> </h1>
                            <h4>Composición:</h4>
                            <h5>{{$medicamento->composicion}}</h5>
                            <h1> </h1>
                            <h4>Presentación:</h4>
                            <h5>{{ $medicamento->presentacion}}</h5>
                        </table>
                        <h1> </h1>

                        {!! Form::open(['route' => ['medicamentos.edit',$medicamento->id], 'method' => 'get']) !!}
                        {!!   Form::submit('Editar medicamento', ['class'=> 'btn btn-warning'])!!}
                        {!! Form::close() !!}
                        <br>
                        {!! Form::open(['route' => ['medicamentos.destroy',$medicamento->id], 'method' => 'delete']) !!}
                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection



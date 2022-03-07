@extends('adminlte::page')

@section('title', 'Planos') 

@section('content_header')
    <h1> Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #Filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            {{ $plan->name }}
                        </tr>
                        <tr>
                            {{ $plan->price }}
                        </tr>
                        <tr>
                            <a href="" class="btn btn-warning">VER</a>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

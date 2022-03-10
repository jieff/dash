@extends('adminlte::page')

@section('title', 'Planos') 

@section('content_header')
    <h1> Planos <a href="{{ route('plano.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plano.search')}}" method="POST" class="form form-inline">
                @CSRF
                
                    <input type="text" name="filter" placeholder="Nome" class="form-control">
                          
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                {{ $plan->price }}
                            </td>
                            <td style="width-10px;">
                                <a href="{{ route('plans.show', $plan->url )}}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {{--$plans->links()--}}
            </div>
        </div>
    </div>
    
@stop

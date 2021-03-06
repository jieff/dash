@extends('adminlte::page')

@section('title', 'Planos') 

@section('content_header')
    <h1> Planos<a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus"> adicionar</i></a>
        <i class=""></i>
    </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}" >Dashboard</a>         
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('plans.index') }}" class="active">Planos</a>
        </li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                @CSRF
                
                    <input type="text" name="filter" placeholder="Nome" class="form-control">
                          
                <button type="submit" class="btn btn-dark"><i class="fa fa-search"> pesquisar</i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="400">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                               R$ {{ $plan->price }}
                            </td>
                            <td style="width-10px;">
                            <a href="{{ route('details.plans.index', $plan->url ) }}" class="btn btn-dark"><i class="fas fa-info-circle"> detalhes</i></a>
                                <a href="{{ route('plans.edit', $plan->url )}}" class="btn btn-dark"><i class="fas fa-edit"> editar</i></a> 
                                <a href="{{ route('plans.show', $plan->url )}}" class="btn btn-dark"><i class="fas fa-eye"> ver</i></a>
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>

                {{-- $plans->links()--}}           
        </div>
    </div>
    
@stop

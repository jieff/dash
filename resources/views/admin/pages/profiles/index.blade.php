@extends('adminlte::page')

@section('title', 'Perfis') 

@section('content_header')
    <h1> Perfis <a href="#create" class="btn btn-dark">ADD</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}" >Dashboard</a>         
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('profile.index') }}" class="active">Perfis</a>
        </li>
    </ol>
    <h1>Perfis <a href=""></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="#search" method="POST" class="form form-inline">
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
                      
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            
                            <td style="width-10px;">
                            <a href="{{--route('details.plans.index', $plan->url ) --}}" class="btn btn-primary">Detalhes</a>
                                <a href="{{ route('profile.edit', $plan->url )}}" class="btn btn-info">Editar</a>
                                <a href="{{ route('profile.show', $plan->url )}}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>

                {{-- $plans->links()--}}           
        </div>
    </div>
    
@stop

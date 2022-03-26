@extends('adminlte::page')

@section('title', "Perfis disponíveis para o plano {$plan->name}") 

@section('content_header')    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a> </li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" >Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.profiles', $plan->id) }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.profiles.available', $plan->id) }}" class="active">Disponíveis</a></li>
    </ol>
    <h1> Perfis disponíveis para Plano <strong>{{ $plan->name }}</strong> </h1>

    <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark"><i class="fas fa-plus"> add novo Perfil</i></a>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{--route('plans.profiles.attach', $plan->id)--}}" method="POST" class="form form-inline">
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
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>

                {{-- $plans->links()--}}           
        </div>
    </div>
    
@stop

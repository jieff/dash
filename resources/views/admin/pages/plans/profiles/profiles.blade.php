@extends('adminlte::page')

@section('title', "Perfis do Plano {$plan->name}") 

@section('content_header')    
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a> </li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" >Perfis</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.profiles', $plan->id) }}" class="active">Plans</a></li>
    </ol>
    <h1> Perfis do Plano <strong>{{ $plan->name }}</strong> </h1>

    <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark"><i class="fas fa-plus"> add novo Perfil</i></a>
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
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width-10px;">
                            <a href="{{-- route('details.plans.index', $plan->url ) --}}" class="btn btn-dark"><i class="fas fa-info-circle"> detalhes</i></a>
                                
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>

                {{-- $plans->links()--}}           
        </div>
    </div>
    
@stop

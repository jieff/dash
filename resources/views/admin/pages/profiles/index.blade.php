<!-- File: index of profiles -->
        
@extends('adminlte::page')

@section('title', 'Perfil') 

@section('content_header')
    <h1> Perfil <a href="{{ route('profile.create')}}" class="btn btn-dark"><i class="fas fa-plus"> Adicionar</i></a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}" >Dashboard</a>         
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('profile.index') }}" class="active">Perfil</a>
        </li>
    </ol>
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profile.search') }}" method="POST" class="form form-inline">
                @CSRF
                
                    <input type="text" name="filter" placeholder="Nome" class="form-control">
                          
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"> pesquisar</i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                      
                        <th width="400">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            
                            <td style="width-10px;">
                                <a href="{{ route('profile.edit', $profile->id )}}" class="btn btn-dark"><i class="fas fa-edit"> editar</i></a>
                                <a href="{{ route('profile.show', $profile->id ) }}" class="btn btn-dark"><i class="fas fa-eye"> ver</i></a>
                                <a href="{{ route('profiles.permissions', $profile->id ) }}" class="btn btn-dark"><i class="fas fa-lock"> permissões</i></a>
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>

                {{-- $plans->links()--}}           
        </div>
    </div>
    
@stop

<!-- File: permissions of profiles/premissions -->
        
@extends('adminlte::page')

@section('title', "Perfis da Permissão $permission->name ") 

@section('content_header')
    <h1> Perfil <a href="{{ route('profile.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i></a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}" >Dashboard</a>         
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('profile.index') }}" class="active">Perfil</a>
        </li>
    </ol>
    <h1>Perfis da Permissão <strong>{{$permission->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profile.search') }}" method="POST" class="form form-inline">
                @CSRF
                
                    <input type="text" name="filter" placeholder="Nome" class="form-control">
                          
                <button type="submit" class="btn btn-dark">Filtrar <i class="fas fa-search"></i></button>
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
                                <a href="{{ route('profiles.permission.detach', [$profile->id , $permission->id])}}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>             
        </div>
            <div class="card-footer">
                    {{-- $plans->links() --}}  
            </div>
    </div>
    
@stop

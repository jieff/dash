<!-- File: available of profiles/permissions -->
        
@extends('adminlte::page')

@section('title', "Permissões disponíveis Perfil $profile->name ") 

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
    <h1>Permissões disponível Perfil <strong>{{$profile->name}}</h1>
   
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
                        <th with="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                        @csrf
                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                               <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            </td>
                            <td>
                                {{ $permission->name }}
                            </td>
                        </tr>     
                    @endforeach
                    <tr>
                        <td colspan="500">
                            @include('admin.includes.alerts')
                            
                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                    </form>
                </tbody>
            </table>             
        </div>
            <div class="card-footer">
                    {{-- $plans->links() --}}  
            </div>
    </div>
    
@stop

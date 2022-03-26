<!-- File: permissions of profiles/premissions -->
        
@extends('adminlte::page')

@section('title', "Permissões do Perfil $profile->name ") 

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
    <h1>Permissões do Perfil <strong>{{$profile->name}}</h1>
    </strong><a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">NOVA PERMISSÃO<i class="fas fa-plus"></i></a>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                      
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            
                            <td style="width-10px;">
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id] )}}" class="btn btn-danger">
                                    <i class="fas fa-trash"> Desvincular</i></a>
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

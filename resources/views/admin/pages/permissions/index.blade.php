<!-- File: index of permissions -->
        
@extends('adminlte::page')

@section('title', 'Permissões') 

@section('content_header')
    <h1> Permissões <a href="{{ route('permission.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i></a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}" >Dashboard</a>         
        </li>
        <li class="breadcrumb-item">
        <a href="{{ route('permission.index') }}" class="active">Permissões</a>
        </li>
    </ol>
    
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permission.search') }}" method="POST" class="form form-inline">
                @CSRF
                
                    <input type="text" name="filter" placeholder="Nome" class="form-control">
                          
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                      
                        <th width="350">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            
                            <td style="width-10px;">
                                <a href="{{ route('permission.edit', $permission->id )}}" class="btn btn-dark"><i class="fas fa-edit"> editar</i></a>
                                <a href="{{ route('permission.show', $permission->id ) }}" class="btn btn-dark"><i class="fas fa-eye"> ver</i></a>
                                <a href="{{ route('permissions.profiles', $permission->id ) }}" class="btn btn-dark"><i class="fas fa-eye"> ver</i></a>
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>

                {{-- $plans->links()--}}           
        </div>
    </div>
    
@stop

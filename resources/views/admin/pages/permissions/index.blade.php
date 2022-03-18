<!-- File: index of profiles -->
        
@extends('adminlte::page')

@section('title', 'Permissões') 

@section('content_header')
    <h1> Permissões <a href="{{ route('permission.create')}}" class="btn btn-dark">ADD</a></h1>
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
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            
                            <td style="width-10px;">
                                <a href="{{ route('permission.edit', $permission->id )}}" class="btn btn-info">Editar</a>
                                <a href="{{ route('permission.show', $permission->id ) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>     
                    @endforeach
                </tbody>
            </table>

                {{-- $plans->links()--}}           
        </div>
    </div>
    
@stop

@extends('adminlte::page')

@section('title', "Editar o perfil {$permission->name}")

@section ('content_header')
    <h1>Editar a Permissão <strong>{{$permission->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <form action="{{ route('permission.update', $permission->id )}}" class="form" method="POST">
                    @method('PUT')
                    
                    @include('admin.pages.permissions._partials.form')
                    
                </form>
        </div>
    </div>
@stop

@extends('adminlte::page')

@section('title', "Editar o perfil {$profile->name}")

@section ('content_header')
    <h1>Editar o perfil <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <form action="{{ route('profile.update', $profile->id )}}" class="form" method="POST">
                    @method('PUT')
                    
                    @include('admin.pages.profiles._partials.form')
                    
                </form>
        </div>
    </div>
@stop

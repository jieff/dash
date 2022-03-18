@extends('adminlte::page')

@section('title', "Detalhes $permission->name ")

@section('content_header')
    <h1>Detalhes da Permissão <b>{{ $permission->name }}</b></h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $permission->name}}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $permission->description}}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('permission.destroy', $permission->id) }}" method="POST">
                @method('DELETE')
                @CSRF
                <button type="submit" class="btn btn-danger">DELETAR A PERMISSÃO: {{ $permission->name }}</button>
            </form>
        </div>
    </div>
@endsection


@extends('adminlte::page')

@section('title', "Detalhes $profile->name ")

@section('content_header')
    <h1>Detalhes do Perfil <b>{{ $profile->name }}</b></h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $profile->name}}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $profile->description}}
                </li>
            </ul>
            @include('admin.includes.alerts')
            <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                @method('DELETE')
                @CSRF
                <button type="submit" class="btn btn-danger">DELETAR O PERFIL: {{ $profile->name }}</button>
            </form>
        </div>
    </div>
@endsection


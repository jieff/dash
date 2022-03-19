@extends('adminlte::page')

@section('title', "Detalhes do detalhe {$detail->name} ") 

@section('content_header') 
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" >Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}" >{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plans.edit', [$plan->url, $detail->id]) }}" class="active" >Detalhes</a></li>
    </ol>
    <h1>Detalhes o detalhe <strong>{{ $detail->name }} </strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <ul>
                    <li>
                        <strong>Nome:</strong> {{ $detail->name}}
                    </li>
                </ul>
        </div>
        <div class="card-footer">
                <form action="{{ route('details.plans.destroy', [$plan->url, $detail->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                        Deletar o detalhe {{ $detail->name }}, do plano {{ $plan->name}} 
                    </button>
                </form>
        </div>
    </div>
@endsection
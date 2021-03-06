@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}") 

@section('content_header')
    <h1> Planos <a href="{{ route('plans.create', $plan->url) }}" class="btn btn-dark"><i class="fas fa-plus"></i></a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" >Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url ) }}" >{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plans.index', $plan->url ) }}">Detalhes</a></li>
    </ol>
    <h1>Detalhes do plano {{ $plan->name}} <a href="{{ route('details.plano.create', $plan->url) }}" class="btn btn-dark"><i class="fas fa-plus"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $detail)
                        <tr>
                            <td>
                                {{ $detail->name }}
                            </td>
                            <td style="width-10px;">  
                                <a href="{{ route('details.plans.edit', [$plan->url , $detail->id])}}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('details.plans.show', [$plan->url, $detail->id] )}}" class="btn btn-dark"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>
            </div>
                <div class="card-footer">
                    @if(isset($filters))
                    {{-- $details->appends($filters)->() --}}
                    @else
                    {{-- $details->links() --}}      
                    @endif  
                </div>            
        </div>
           
    </div>
    
@stop

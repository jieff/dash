@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}") 

@section('content_header')
    <h1> Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD</a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}" >Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" >Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url ) }}" >{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plans.index', $plan->url ) }}">Detalhes</a></li>
    </ol>
    <h1>Detalhes do plano {{ $plan->name}} <a href="{{ route('plans.create') }}" class="btn btn-dark">add</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
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
                               <a href="{{ route('details.plan.index', $detail->url )}}" class="btn btn-info">detalhes</a>
                                <a href="{{ route('plans.edit', $plan->url )}}" class="btn btn-info">Editar</a>
                                <a href="{{ route('plans.show', $plan->url )}}" class="btn btn-warning">VER</a>
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

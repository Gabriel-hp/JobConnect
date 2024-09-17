@extends('adm')

@section('content')
<div class="container">
    <h1>Candidaturas para a Vaga: {{ $vaga->titulo }}</h1>
    
    <div class="row">
    @foreach ($candidaturas as $candidatura)
    <div class="card">
        <div class="card-body">
            @if ($candidatura->candidato)
                <h5 class="card-title">{{ $candidatura->candidato->name }}</h5>
                <p class="card-text">Email: {{ $candidatura->candidato->email }}</p>
                <p class="card-text">Data da Candidatura: {{ $candidatura->created_at->format('d/m/Y H:i') }}</p>
            @else
                <h5 class="card-title">Usuário não encontrado</h5>
                <p class="card-text">Detalhes do usuário não disponíveis.</p>
                <p class="card-text">Data da Candidatura: {{ $candidatura->created_at->format('d/m/Y H:i') }}</p>
            @endif
        </div>
    </div>
@endforeach
    </div>
</div>
@endsection

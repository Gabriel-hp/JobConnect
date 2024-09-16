@extends('master')

@section('content')
<div class="container">
    <h1>Minhas Candidaturas</h1>

    @if ($candidaturas->isEmpty())
        <p>Você ainda não se candidatou a nenhuma vaga.</p>
    @else
    <div class="container">
    <div class="row">
        @foreach ($candidaturas as $candidatura)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $candidatura->vaga->titulo }}</h5>
                        <p class="card-text"><strong>Área:</strong> {{ $candidatura->vaga->area }}</p>
                        <p class="card-text"><strong>Cidade:</strong> {{ $candidatura->vaga->cidade }}</p>
                        <p class="card-text"><strong>Empresa:</strong> {{ $candidatura->vaga->nome_empresa }}</p>
                        <p class="card-text"><strong>status:</strong> {{ $candidatura->status}}</p>
                        <p class="card-text"><small class="text-muted">Data da Candidatura: {{ $candidatura->created_at->format('d/m/Y H:i') }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


    @endif
</div>
@endsection

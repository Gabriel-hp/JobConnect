@extends('master')

@section('content')

<div class="container mt-5">
    <div class="row">
        @foreach ($vagas as $vaga)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $vaga->titulo }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Descrição:</strong> {{ $vaga->descricao }}</p>
                    <p class="card-text"><strong>Cidade:</strong> {{ $vaga->cidade }}</p>
                    <p class="card-text"><strong>Empresa:</strong> {{ $vaga->nome_empresa }}</p>
                    <p class="card-text"><strong>Tipo de Contratação:</strong> {{ $vaga->regime_contratacao }}</p>
                    <p class="card-text"><strong>Modalidade:</strong> {{ $vaga->modalidade_trabalho }}</p>
                    <p class="card-text"><strong>Escolaridade:</strong> {{ $vaga->escolaridade }}</p>
                    <p class="card-text"><strong>Salário:</strong> {{ $vaga->salario }}</p>
                    <p class="card-text"><strong>Benefícios:</strong> {{ $vaga->beneficios }}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm">
                            <a href="{{ route('vagas.edit', $vaga->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        </div>
                        <div class="col-sm">
                            <form action="{{ route('vagas.destroy', $vaga->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

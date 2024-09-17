@extends('master')

@section('content')

<div class="container mt-5">
    <!-- Card Principal -->
    <div class="card shadow-lg">
        
        <!-- Header com o nome da empresa -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title text-white">{{ $vaga->nome_empresa }}</h3>
            <span class="badge bg-success">{{ $vaga->status }}</span>
        </div>

        <!-- Corpo com os detalhes da vaga -->
        <div class="card-body">
            <!-- Título da Vaga -->
            <h4 class="mb-4">{{ $vaga->titulo }}</h4>

            <div class="col-md-10">
                <h5>Descrição da Vaga:</h5>
                <p>{{ $vaga->descricao }}</p>
            </div>

            <!-- Informações principais -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Área:</strong> {{ $vaga->area }}</p>
                    <p><strong>Cidade:</strong> {{ $vaga->cidade }}</p>
                    <p><strong>Empresa:</strong> {{ $vaga->nome_empresa }}</p>
                </div>
              
                <div class="col-md-6">
                    <p><strong>Tipo de Contratação:</strong> {{ $vaga->regime_contratacao }}</p>
                    <p><strong>Modalidade:</strong> {{ $vaga->modalidade_trabalho }}</p>
                    <p><strong>PCD:</strong> {{ $vaga->pcd == 1 ? 'Sim' : 'Não' }}</p>
                </div>
            </div>

          

            <!-- Requisitos e Benefícios -->  <div class="col-md-10">
                <h5>Benefícios:</h5>
                <p> {{ $vaga->beneficios }}</p>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Escolaridade:</strong> {{ $vaga->escolaridade }}</p>
                    <p><strong>Salário:</strong> {{ $vaga->salario }}</p>
                </div>
                <div class="col-md-6">
                  
                    <p><strong>Publicado em:</strong> {{ $vaga->data_postagem }}</p>
                </div>
            </div>
        </div>
        <form action="{{ route('vagas.join', $vaga->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Candidatar-se</button>
                    </form>

    </div>
</div>
@endsection

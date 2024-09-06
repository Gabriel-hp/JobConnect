@extends('master')

@section('title', 'Lista de Candidatos')

@section('content')

<div class="container">
    <h1>Detalhes do Candidato</h1>

    <div class="card">
        <div class="card-header">
            <h2>{{ $candidato->id }} - {{ $candidato->user->name }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Telefone:</strong> {{ $candidato->telefone }}</p>
            <p><strong>Endereço:</strong> {{ $candidato->endereco }}</p>
            <p><strong>Escolaridade:</strong> {{ $candidato->escolaridade }}</p>
            <p><strong>Experiência:</strong> {{ $candidato->experiencia }}</p>
            <p><strong>Currículo:</strong> <a href="{{ asset('storage/' . $candidato->curriculo) }}" target="_blank">Visualizar Currículo</a></p>
            <p><strong>Criado em:</strong> {{ $candidato->created_at->format('d/m/Y H:i:s') }}</p>
            <p><strong>Última atualização:</strong> {{ $candidato->updated_at->format('d/m/Y H:i:s') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('candidato.index') }}" class="btn btn-primary">Voltar</a>
            <a href="{{ route('candidato.edit', $candidato->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('candidato.destroy', $candidato->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este candidato?')">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection

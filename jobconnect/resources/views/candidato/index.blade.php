@extends('master')

@section('title', 'Lista de Candidatos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Meu curriculo</h1>
        <a href="{{ route('candidatos.create') }}" class="btn btn-primary">Completar perfil</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($candidatos->isEmpty())
        <p>Nenhum candidato encontrado.</p>
    @else
        <div class="row">
            @foreach ($candidatos as $candidato)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidato->user->name }}</h5>
                            <p class="card-text"><strong>Email:</strong> {{ $candidato->user->email }}</p>
                            <p class="card-text"><strong>Escolaridade:</strong> {{ $candidato->escolaridade }}</p>
                            <p class="card-text"><strong>Telefone</strong>{{ $candidato->telefone }}</p>
                            <p class="card-text"><strong>Endereço</strong>{{ $candidato->endereco }}</p>
                            <p class="card-text"><strong>Escolaridade</strong>{{ $candidato->escolaridade }}</p>
                            <p class="card-text"><strong>Experiencia</strong>{{ $candidato->experiencia }}</p>
                            <p class="card-text"><strong>curriculo</strong>{{ $candidato->curriculo }}</p>
                            <p class="card-text"><strong>Atualizado em</strong>{{ $candidato->updated_at }}</p>

                        </div>
                        <div class="">
                            <a href="{{ route('candidatos.edit', $candidato->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('candidatos.destroy', $candidato->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este candidato?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection

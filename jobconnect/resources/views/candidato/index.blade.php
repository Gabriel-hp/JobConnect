@extends('master')


@section('title', 'Lista de Candidatos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Candidatos</h1>
        <a href="{{ route('candidatos.create') }}" class="btn btn-primary">Novo Candidato</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Cidade</th>
                <th>Vaga</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidatos as $candidato)
                <tr>
                    <td>{{ $candidato->nome }}</td>
                    <td>{{ $candidato->email }}</td>
                    <td>{{ $candidato->cidade }}</td>
                    <td>{{ $candidato->vaga->titulo }}</td>
                    <td class="d-flex">
                        <a href="{{ route('candidatos.show', $candidato->id) }}" class="btn btn-info btn-sm me-2">Ver</a>
                        <a href="{{ route('candidatos.edit', $candidato->id) }}" class="btn btn-primary btn-sm me-2">Editar</a>
                        <form action="{{ route('candidatos.destroy', $candidato->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

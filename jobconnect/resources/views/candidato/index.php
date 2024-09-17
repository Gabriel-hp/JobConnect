@extends('adm')

@section('content')
<div class="container">
    <h1>Lista de Candidatos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Data de Cadastro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidatos as $candidato)
                <tr>
                    <td>{{ $candidato->id }}</td>
                    <td>{{ $candidato->name }}</td>
                    <td>{{ $candidato->email }}</td>
                    <td>{{ $candidato->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <!-- Aqui você pode adicionar botões para editar, visualizar ou excluir o candidato -->
                        <a href="{{ route('candidatos.show', $candidato->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('candidatos.edit', $candidato->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('candidatos.destroy', $candidato->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

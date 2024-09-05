@extends('master')

@section('content')

<div class="container mt-5">
    <h2>Editar Vaga</h2>
    
    <form action="{{ route('vagas.update', $vaga->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $vaga->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ old('descricao', $vaga->descricao) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade', $vaga->cidade) }}" required>
        </div>

        <div class="mb-3">
            <label for="nome_empresa" class="form-label">Nome da Empresa</label>
            <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" value="{{ old('nome_empresa', $vaga->nome_empresa) }}" required>
        </div>

        <div class="mb-3">
            <label for="regime_contratacao" class="form-label">Regime de Contratação</label>
            <select class="form-control" id="regime_contratacao" name="regime_contratacao" required>
                <option value="CLT" {{ old('regime_contratacao', $vaga->regime_contratacao) == 'CLT' ? 'selected' : '' }}>CLT</option>
                <option value="PJ" {{ old('regime_contratacao', $vaga->regime_contratacao) == 'PJ' ? 'selected' : '' }}>PJ</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="pcd" class="form-label">PCD</label>
            <select class="form-control" id="pcd" name="pcd" required>
                <option value="0" {{ old('pcd', $vaga->pcd) == '0' ? 'selected' : '' }}>Não</option>
                <option value="1" {{ old('pcd', $vaga->pcd) == '1' ? 'selected' : '' }}>Sim</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="modalidade_trabalho" class="form-label">Modalidade de Trabalho</label>
            <select class="form-control" id="modalidade_trabalho" name="modalidade_trabalho" required>
                <option value="Presencial" {{ old('modalidade_trabalho', $vaga->modalidade_trabalho) == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                <option value="Home Office" {{ old('modalidade_trabalho', $vaga->modalidade_trabalho) == 'Home Office' ? 'selected' : '' }}>Home Office</option>
                <option value="Híbrido" {{ old('modalidade_trabalho', $vaga->modalidade_trabalho) == 'Híbrido' ? 'selected' : '' }}>Híbrido</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="escolaridade" class="form-label">Escolaridade</label>
            <input type="text" class="form-control" id="escolaridade" name="escolaridade" value="{{ old('escolaridade', $vaga->escolaridade) }}" required>
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Salário</label>
            <input type="text" class="form-control" id="salario" name="salario" value="{{ old('salario', $vaga->salario) }}">
        </div>

        <div class="mb-3">
            <label for="beneficios" class="form-label">Benefícios</label>
            <textarea class="form-control" id="beneficios" name="beneficios" rows="3" required>{{ old('beneficios', $vaga->beneficios) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>

@endsection

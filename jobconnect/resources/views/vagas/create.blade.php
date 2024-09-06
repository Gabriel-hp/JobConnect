@extends('master')

@section('content')
<div class="container">
    <h2>Criar Nova Vaga</h2>

    <!-- Exibe erros de validação, se houver -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vagas.store') }}" method="POST">
        @csrf <!-- Token de segurança para o formulário -->

        <div class="form-group">
            <label for="titulo">Título da Vaga</label>
            <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}" required>
        </div>
        <div class="form-group">
            <label for="area">Área</label>
            <select name="area" class="form-control" id="area" required>
                <option value="Tecnologia" {{ old('area') == 'Tecnologia' ? 'selected' : '' }}>Tecnologia</option>
                <option value="Contabil" {{ old('area') == 'Contabil' ? 'selected' : '' }}>Contábil</option>
                <option value="Serviço gerais" {{ old('area') == 'Serviço gerais' ? 'selected' : '' }}>Serviço gerais</option>
                <option value="Industria" {{ old('area') == 'Industria' ? 'selected' : '' }}>Indústria</option>
                <option value="Saude" {{ old('area') == 'Saude' ? 'selected' : '' }}>Saúde</option>
                <option value="Educacao" {{ old('area') == 'Educacao' ? 'selected' : '' }}>Educação</option>
                <option value="Administrativo" {{ old('area') == 'Administrativo' ? 'selected' : '' }}>Administrativo</option>
                <option value="outros" {{ old('area') == 'outros' ? 'selected' : '' }}>Outros</option>
            </select>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" id="descricao" rows="5" required>{{ old('descricao') }}</textarea>
        </div>

        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="cidade" value="{{ old('cidade') }}" required>
        </div>

        <div class="form-group">
            <label for="nome_empresa">Nome da Empresa</label>
            <input type="text" name="nome_empresa" class="form-control" id="nome_empresa" value="{{ old('nome_empresa') }}" required>
        </div>

        <div class="form-group">
            <label for="regime_contratacao">Regime de Contratação</label>
            <select name="regime_contratacao" class="form-control" id="regime_contratacao" required>
                <option value="PJ" {{ old('regime_contratacao') == 'PJ' ? 'selected' : '' }}>PJ</option>
                <option value="CLT" {{ old('regime_contratacao') == 'CLT' ? 'selected' : '' }}>CLT</option>
            </select>
        </div>

        <div class="form-group">
            <label for="pcd">Vaga para PCD?</label>
            <select name="pcd" class="form-control" id="pcd" required>
                <option value="1" {{ old('pcd') == '1' ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ old('pcd') == '0' ? 'selected' : '' }}>Não</option>
            </select>
        </div>

        <div class="form-group">
            <label for="modalidade_trabalho">Modalidade de Trabalho</label>
            <select name="modalidade_trabalho" class="form-control" id="modalidade_trabalho" required>
            <option value="Presencial" {{ old('modalidade_trabalho') == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                <option value="Home Office" {{ old('modalidade_trabalho') == 'Home Office' ? 'selected' : '' }}>Home Office</option>
                <option value="Híbrida" {{ old('modalidade_trabalho') == 'Híbrida' ? 'selected' : '' }}>Híbrido</option>
            </select>
        </div>

        <div class="form-group">
            <label for="escolaridade">Escolaridade</label>
            <input type="text" name="escolaridade" class="form-control" id="escolaridade" value="{{ old('escolaridade') }}" required>
        </div>

        <div class="form-group">
            <label for="salario">Salário (opcional)</label>
            <input type="number" name="salario" class="form-control" id="salario" value="{{ old('salario') }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="beneficios">Benefícios (opcional)</label>
            <textarea name="beneficios" class="form-control" id="beneficios" rows="3">{{ old('beneficios') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Criar Vaga</button>
    </form>
</div>
@endsection

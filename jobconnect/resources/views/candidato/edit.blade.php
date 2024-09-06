@extends('master')

@section('content')
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

    <!-- Formulário de edição de candidato -->
    <form action="{{ route('candidatos.update', $candidato->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $candidato->nome ?? '') }}" required maxlength="255">
        </div>


        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone', $candidato->telefone ?? '') }}" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade', $candidato->cidade ?? '') }}" required maxlength="255">
        </div>

        <div class="mb-3">
            <label for="experiencia" class="form-label">Experiência</label>
            <textarea class="form-control" id="experiencia" name="experiencia" required>{{ old('experiencia', $candidato->experiencia ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="escolaridade" class="form-label">Escolaridade</label>
            <input type="text" class="form-control" id="escolaridade" name="escolaridade" value="{{ old('escolaridade', $candidato->escolaridade ?? '') }}" required>
        </div>


        <div class="mb-3">
            <label for="curriculo" class="form-label">Currículo</label>
            <input type="file" class="form-control" id="curriculo" name="curriculo">
            @if(isset($candidato) && $candidato->curriculo)
                <small class="form-text text-muted">Currículo atual: {{ $candidato->curriculo }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
    </form>
@endsection

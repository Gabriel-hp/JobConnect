@extends('master')

@section('content')
    <h1>{{ isset($candidato) ? 'Editar Candidato' : 'Novo Candidato' }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($candidato) ? route('candidatos.update', $candidato->id) : route('candidatos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($candidato))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone', $candidato->telefone ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">endereco</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco', $candidato->endereco ?? '') }}" required>
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
            <input type="file" class="form-control" id="curriculo" name="curriculo" {{ !isset($candidato) ? 'required' : '' }}>
            @if(isset($candidato) && $candidato->curriculo)
                <small class="form-text text-muted">Currículo atual: {{ $candidato->curriculo }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-success">{{ isset($candidato) ? 'Atualizar' : 'Cadastrar' }}</button>
        <a href="{{ route('candidatos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

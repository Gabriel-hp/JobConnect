@extends('layouts.main')

@section('title', 'Curriculo')

@section('content')

    <h3>Detalhes Pessoais</h3>
    <p><strong>Nome Completo:</strong> {{ $resume->nome }}</p>
    <p><strong>Data de Nascimento:</strong> {{ $resume->data_nascimento }}</p>
    <p><strong>Telefone:</strong> {{ $resume->telefone }}</p>
    <p><strong>Endereço:</strong> {{ $resume->endereco }}</p>
    <p><strong>Nacionalidade:</strong> {{ $resume->nacionalidade }}</p>
    <p><strong>Estado Civil:</strong> {{ $resume->estado_civil }}</p>
    <p><strong>LinkedIn:</strong> <a href="{{ $resume->link_linkedin }}">{{ $resume->link_linkedin }}</a></p>
    <p><strong>Portfólio:</strong> <a href="{{ $resume->link_portfolio }}">{{ $resume->link_portfolio }}</a></p>

    <h3>Experiência Profissional</h3>
    @foreach($resume->experiences as $experience)
        <div class="experience">
            <p><strong>Cargo:</strong> {{ $experience->cargo }}</p>
            <p><strong>Empresa:</strong> {{ $experience->empresa }}</p>
            <p><strong>Data de Início:</strong> {{ $experience->data_inicio }}</p>
            <p><strong>Data de Fim:</strong> {{ $experience->data_fim ?? 'Atual' }}</p>
            <p><strong>Descrição:</strong> {{ $experience->descricao_responsabilidades }}</p>
            <p><strong>Localização:</strong> {{ $experience->localizacao }}</p>
        </div>
    @endforeach

    <h3>Educação</h3>
    @foreach($resume->educations as $education)
        <div class="education">
            <p><strong>Instituição:</strong> {{ $education->instituicao }}</p>
            <p><strong>Grau:</strong> {{ $education->grau }}</p>
            <p><strong>Curso:</strong> {{ $education->curso }}</p>
            <p><strong>Data de Início:</strong> {{ $education->data_inicio }}</p>
            <p><strong>Data de Fim:</strong> {{ $education->data_fim ?? 'Em andamento' }}</p>
            <p><strong>Descrição:</strong> {{ $education->descricao }}</p>
        </div>
    @endforeach

    <h3>Habilidades</h3>
    @foreach($resume->skills as $skill)
        <div class="skill">
            <p><strong>Habilidade:</strong> {{ $skill->habilidade }}</p>
            <p><strong>Nível:</strong> {{ $skill->nivel_habilidade }}</p>
        </div>
    @endforeach

    <h3>Idiomas</h3>
    @foreach($resume->languages as $language)
        <div class="language">
            <p><strong>Idioma:</strong> {{ $language->idioma }}</p>
            <p><strong>Nível:</strong> {{ $language->nivel_idioma }}</p>
        </div>
    @endforeach

@endsection

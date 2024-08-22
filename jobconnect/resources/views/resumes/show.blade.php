@extends('layouts.main')

@section('title', 'Curriculo')

@section('content')

<h3>Detalhes Pessoais</h3>
<p><strong>Nome Completo:</strong> {{ $resume->nome_completo }}</p>
<p><strong>Data de Nascimento:</strong> {{ $resume->data_nascimento }}</p>
<p><strong>Telefone:</strong> {{ $resume->telefone }}</p>
<p><strong>Endereço:</strong> {{ $resume->endereco }}</p>
<p><strong>Nacionalidade:</strong> {{ $resume->nacionalidade }}</p>
<p><strong>Estado Civil:</strong> {{ $resume->estado_civil }}</p>
<p><strong>LinkedIn:</strong> <a href="{{ $resume->link_linkedin }}">{{ $resume->link_linkedin }}</a></p>
<p><strong>Portfólio:</strong> <a href="{{ $resume->link_portfolio }}">{{ $resume->link_portfolio }}</a></p>

   

@endsection

@extends('master')

@section('content')

<div class="container mt-5">
    <div id="search-container" class="col-md-12">
        <h1>Busque uma vaga</h1>
        <form action="/" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar..." value="{{ request()->query('search') }}">

        <div class="container mt-2">
        <div class="row">
            <div class="col">
                <h6><b>Tipo de Contratação</b></h6>
                <div>
                    <input type="radio" id="contratacao_todos" name="tipo_contratacao" value="" {{ request()->query('tipo_contratacao') == '' ? 'checked' : '' }}>
                    <label for="contratacao_todos">Todos</label>
                </div>
                <div>
                    <input type="radio" id="contratacao_clt" name="tipo_contratacao" value="CLT" {{ request()->query('tipo_contratacao') == 'CLT' ? 'checked' : '' }}>
                    <label for="contratacao_clt">CLT</label>
                </div>
                <div>
                    <input type="radio" id="contratacao_pj" name="tipo_contratacao" value="PJ" {{ request()->query('tipo_contratacao') == 'PJ' ? 'checked' : '' }}>
                    <label for="contratacao_pj">PJ</label>
                </div>
                <!-- Adicione outros tipos de contratação conforme necessário -->
            </div>
        

        
            <div class="col">
                <h6><b>Modalidade de Trabalho</b></h6>
                <div>
                    <input type="radio" id="modalidade_todos" name="modalidade_trabalho" value="" {{ request()->query('modalidade_trabalho') == '' ? 'checked' : '' }}>
                    <label for="modalidade_todos">Todos</label>
                </div>
                <div>
                    <input type="radio" id="modalidade_presencial" name="modalidade_trabalho" value="Presencial" {{ request()->query('modalidade_trabalho') == 'Presencial' ? 'checked' : '' }}>
                    <label for="modalidade_presencial">Presencial</label>
                </div>
                <div>
                    <input type="radio" id="modalidade_home_office" name="modalidade_trabalho" value="Home Office" {{ request()->query('modalidade_trabalho') == 'Home Office' ? 'checked' : '' }}>
                    <label for="modalidade_home_office">Home Office</label>
                </div>
                <div>
                    <input type="radio" id="modalidade_híbrido" name="modalidade_trabalho" value="Híbrida" {{ request()->query('modalidade_trabalho') == 'Híbrida' ? 'checked' : '' }}>
                    <label for="modalidade_híbrido">Híbrido</label>
                </div>
                <!-- Adicione outras modalidades conforme necessário -->
            </div>

                <div class="col">
                    <h6><b>PCD</b></h6>
                    <div>
                        <input type="radio" id="pcd_todos" name="pcd" value="" {{ request()->query('pcd') == '' ? 'checked' : '' }}>
                        <label for="pcd_todos">Todos</label>
                    </div>
                    <div>
                        <input type="radio" id="pcd_sim" name="pcd" value="Sim" {{ request()->query('pcd') == 'Sim' ? 'checked' : '' }}>
                        <label for="pcd_sim">Sim</label>
                    </div>
                    <div>
                        <input type="radio" id="pcd_nao" name="pcd" value="Não" {{ request()->query('pcd') == 'Não' ? 'checked' : '' }}>
                        <label for="pcd_nao">Não</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Buscar</button>
            </div>
            
            </div>    

            
        </form>
    </div>

    <div class="row mt-5">
        @if($search || request()->query('tipo_contratacao') || request()->query('modalidade_trabalho') || request()->query('pcd'))
            <h2>Resultados da Busca</h2>
        @else
            <h2>Próximas Vagas</h2>
            <p class="subtitle">Veja as vagas disponíveis</p>
        @endif

        @foreach ($vagas as $vaga)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm" style="border-radius: 10px;">
                <!-- Logo e título -->
                <div class="d-flex align-items-center p-3">
                    <img src="../img/logo.png" alt="Lojas Torra" class="me-2" style="width: 50px; height: 50px;">
                    <div>
                        <h6 class="card-title mb-0 text-primary"><strong> {{ $vaga->nome_empresa }}</strong></h6>
                        <p class="text-muted mb-0">{{ $vaga->titulo }}</p>
                    </div>
                </div>

                <!-- Detalhes da vaga -->
                <div class="card-body alinhamento">
                    <div class="um">
                    <p class="card-text"><i class="bi bi-geo-alt"></i> {{ $vaga->area }}</p>
                    <p class="card-text"><i class="bi bi-geo-alt"></i> {{ $vaga->cidade }}</p>
                    <p class="card-text"><i class="bi bi-building"></i> {{ $vaga->modalidade_trabalho }}</p>
                    </div>
                    <div class="dois">
                    <p class="card-text"><i class="bi bi-briefcase"></i> {{ $vaga->regime_contratacao }}</p>
                    <p class="card-text"><i class="bi bi-wheelchair"></i> Também p/ PcD: {{ $vaga->pcd == 1 ? 'Sim' : 'Não' }}</p>
                    </div>
                   </div>
                   <div class="card-footer text-center">
                        <a href="{{ route('vagas.show', $vaga->id) }}" class="btn btn-primary">Ver Detalhes</a>
                    </div>

                <!-- Data de publicação -->
                <div class="card-footer text-muted">
                {{ $vaga->data_postagem }}
                </div>
            </div>
        </div>

        @endforeach

        @if($vagas->isEmpty())
            <p class="mt-5">Nenhuma vaga encontrada.</p>
        @endif
    </div>
</div>

@endsection
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">

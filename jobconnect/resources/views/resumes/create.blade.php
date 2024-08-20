@extends('layouts.main')

@section('title', 'Curriculo')

@section('content')

    <form action="{{ route('resume.store') }}" method="POST">
        @csrf

        <!-- Detalhes Pessoais -->
        <h3>Detalhes Pessoais</h3>
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" name="nome_completo" id="nome_completo" required>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" required>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" required>

        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" id="nacionalidade" required>

        <label for="estado_civil">Estado Civil:</label>
        <input type="text" name="estado_civil" id="estado_civil" required>

        <label for="link_linkedin">LinkedIn:</label>
        <input type="url" name="link_linkedin" id="link_linkedin">

        <label for="link_portfolio">Portfólio:</label>
        <input type="url" name="link_portfolio" id="link_portfolio">

        <!-- Experiência Profissional -->
        <h3>Experiência Profissional</h3>
        <div id="experience-wrapper">
            <div class="experience">
                <label for="cargo[]">Cargo:</label>
                <input type="text" name="cargo[]" required>

                <label for="empresa[]">Empresa:</label>
                <input type="text" name="empresa[]" required>

                <label for="data_inicio[]">Data de Início:</label>
                <input type="date" name="data_inicio[]" required>

                <label for="data_fim[]">Data de Fim:</label>
                <input type="date" name="data_fim[]">

                <label for="descricao_responsabilidades[]">Descrição das Responsabilidades:</label>
                <textarea name="descricao_responsabilidades[]" required></textarea>

                <label for="localizacao[]">Localização:</label>
                <input type="text" name="localizacao[]" required>
            </div>
        </div>
        <button type="button" onclick="addExperience()">Adicionar Outra Experiência</button>

        <!-- Educação -->
        <h3>Educação</h3>
        <div id="education-wrapper">
            <div class="education">
                <label for="instituicao[]">Instituição:</label>
                <input type="text" name="instituicao[]" required>

                <label for="grau[]">Grau:</label>
                <input type="text" name="grau[]" required>

                <label for="curso[]">Curso:</label>
                <input type="text" name="curso[]" required>

                <label for="data_inicio_edu[]">Data de Início:</label>
                <input type="date" name="data_inicio_edu[]" required>

                <label for="data_fim_edu[]">Data de Fim:</label>
                <input type="date" name="data_fim_edu[]">

                <label for="descricao_edu[]">Descrição:</label>
                <textarea name="descricao_edu[]" required></textarea>
            </div>
        </div>
        <button type="button" onclick="addEducation()">Adicionar Outra Educação</button>

        <!-- Habilidades -->
        <h3>Habilidades</h3>
        <div id="skills-wrapper">
            <div class="skill">
                <label for="habilidade[]">Habilidade:</label>
                <input type="text" name="habilidade[]" required>

                <label for="nivel_habilidade[]">Nível:</label>
                <input type="text" name="nivel_habilidade[]" required>
            </div>
        </div>
        <button type="button" onclick="addSkill()">Adicionar Outra Habilidade</button>

        <!-- Idiomas -->
        <h3>Idiomas</h3>
        <div id="languages-wrapper">
            <div class="language">
                <label for="idioma[]">Idioma:</label>
                <input type="text" name="idioma[]" required>

                <label for="nivel_idioma[]">Nível:</label>
                <input type="text" name="nivel_idioma[]" required>
            </div>
        </div>
        <button type="button" onclick="addLanguage()">Adicionar Outro Idioma</button>

        <button type="submit">Enviar</button>
    </form>
</div>
@endsection

@section('scripts')
<script>
    // Scripts para adicionar mais campos de experiência, educação, habilidades e idiomas
    function addExperience() {
        const experienceWrapper = document.getElementById('experience-wrapper');
        const newExperience = document.createElement('div');
        newExperience.classList.add('experience');
        newExperience.innerHTML = `
            <label for="cargo[]">Cargo:</label>
            <input type="text" name="cargo[]" required>

            <label for="empresa[]">Empresa:</label>
            <input type="text" name="empresa[]" required>

            <label for="data_inicio[]">Data de Início:</label>
            <input type="date" name="data_inicio[]" required>

            <label for="data_fim[]">Data de Fim:</label>
            <input type="date" name="data_fim[]">

            <label for="descricao_responsabilidades[]">Descrição das Responsabilidades:</label>
            <textarea name="descricao_responsabilidades[]" required></textarea>

            <label for="localizacao[]">Localização:</label>
            <input type="text" name="localizacao[]" required>
        `;
        experienceWrapper.appendChild(newExperience);
    }

    function addEducation() {
        const educationWrapper = document.getElementById('education-wrapper');
        const newEducation = document.createElement('div');
        newEducation.classList.add('education');
        newEducation.innerHTML = `
            <label for="instituicao[]">Instituição:</label>
            <input type="text" name="instituicao[]" required>

            <label for="grau[]">Grau:</label>
            <input type="text" name="grau[]" required>

            <label for="curso[]">Curso:</label>
            <input type="text" name="curso[]" required>

            <label for="data_inicio_edu[]">Data de Início:</label>
            <input type="date" name="data_inicio_edu[]" required>

            <label for="data_fim_edu[]">Data de Fim:</label>
            <input type="date" name="data_fim_edu[]">

            <label for="descricao_edu[]">Descrição:</label>
            <textarea name="descricao_edu[]" required></textarea>
        `;
        educationWrapper.appendChild(newEducation);
    }

    function addSkill() {
        const skillsWrapper = document.getElementById('skills-wrapper');
        const newSkill = document.createElement('div');
        newSkill.classList.add('skill');
        newSkill.innerHTML = `
            <label for="habilidade[]">Habilidade:</label>
            <input type="text" name="habilidade[]" required>

            <label for="nivel_habilidade[]">Nível:</label>
            <input type="text" name="nivel_habilidade[]" required>
        `;
        skillsWrapper.appendChild(newSkill);
    }

    function addLanguage() {
        const languagesWrapper = document.getElementById('languages-wrapper');
        const newLanguage = document.createElement('div');
        newLanguage.classList.add('language');
        newLanguage.innerHTML = `
            <label for="idioma[]">Idioma:</label>
            <input type="text" name="idioma[]" required>

            <label for="nivel_idioma[]">Nível:</label>
            <input type="text" name="nivel_idioma[]" required>
        `;
        languagesWrapper.appendChild(newLanguage);
    }
</script>
@endsection

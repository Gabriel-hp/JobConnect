<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\PersonalDetail;
use App\Models\ProfessionalExperience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Language;
use Illuminate\Http\Request;

class ResumeController extends Controller{

    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('resumes.create');
    }

    public function store(Request $request)
    {
          // Cria o currículo (Resume)
        $resume = Resume::create([
            'usuario_id' => 35411
        ]);

        // Cria os detalhes pessoais
        PersonalDetail::create([
            'resume_id' => $resume->id,
            'nome_completo' => $request->nome_completo,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'nacionalidade' => $request->nacionalidade,
            'estado_civil' => $request->estado_civil,
            'link_linkedin' => $request->link_linkedin,
            'link_portfolio' => $request->link_portfolio,
        ]);

        // Cria as experiências profissionais
        foreach ($request->cargo as $index => $cargo) {
            ProfessionalExperience::create([
                'resume_id' => $resume->id,
                'cargo' => $cargo,
                'empresa' => $request->empresa[$index],
                'data_inicio' => $request->data_inicio[$index],
                'data_fim' => $request->data_fim[$index],
                'descricao_responsabilidades' => $request->descricao_responsabilidades[$index],
                'localizacao' => $request->localizacao[$index],
            ]);
        }

        // Cria as educações
        foreach ($request->instituicao as $index => $instituicao) {
            Education::create([
                'resume_id' => $resume->id,
                'instituicao' => $instituicao,
                'grau' => $request->grau[$index],
                'curso' => $request->curso[$index],
                'data_inicio' => $request->data_inicio_edu[$index],
                'data_fim' => $request->data_fim_edu[$index],
                'descricao' => $request->descricao_edu[$index],
            ]);
        }

        // Cria as habilidades
        foreach ($request->habilidade as $index => $habilidade) {
            Skill::create([
                'resume_id' => $resume->id,
                'habilidade' => $habilidade,
                'nivel_habilidade' => $request->nivel_habilidade[$index],
            ]);
        }

        // Cria os idiomas
        foreach ($request->idioma as $index => $idioma) {
            Language::create([
                'resume_id' => $resume->id,
                'idioma' => $idioma,
                'nivel_idioma' => $request->nivel_idioma[$index],
            ]);
        }

        return redirect()->route('resumes.show')->with('success', 'Currículo criado com sucesso!');
    }

    public function show($id)
    {
        // Carrega o currículo junto com suas relações
        $resume = Resume::with(['ProfessionalExperience', 'Education', 'PersonalDetail', 'Skill', 'Language'])
                        ->findOrFail($id);


        return view('resumes.show', compact('resumes'));

        
        
    }

}




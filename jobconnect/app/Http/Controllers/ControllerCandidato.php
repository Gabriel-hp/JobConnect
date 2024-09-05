<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Models\Vaga;

class ControllerCandidato extends Controller
{
    // Exibe a lista de candidatos
    public function index()
    {
        $candidatos = Candidato::all();
        return view('candidato.index', compact('candidatos'));
    }

    // Exibe o formulário de criação de um novo candidato
    public function create()
    {
         // Buscar todas as vagas disponíveis
         $vagas = Vaga::all();
        
         // Passar as vagas para a view de criação
         return view('candidato.create', compact('vagas'));
    }

    // Armazena o novo candidato no banco de dados
    public function store(Request $request)
{
    $request->validate([
        'telefone' => 'nullable|max:20',
        'endereco' => 'required|max:255',
        'experiencia' => 'required',
        'escolaridade' => 'required',
        'curriculo' => 'required|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Upload do currículo
    $curriculoPath = $request->file('curriculo')->store('curriculo', 'public');

    // Criação do candidato associando ao usuário logado
    Candidato::create([
        'user_id' => 3, // Adiciona o ID do usuário logado
        'telefone' => $request->telefone,
        'endereco' => $request->endereco,
        'experiencia' => $request->experiencia,
        'escolaridade' => $request->escolaridade,
        'curriculo' => $curriculoPath,
    ]);

    return redirect()->route('candidato.index')->with('success', 'Candidato cadastrado com sucesso!');
}

    // Exibe os detalhes de um candidato específico
    public function show($id)
    {
        $candidato = Candidato::findOrFail($id);
        return view('candidato.show', compact('candidato'));
    }

    // Exibe o formulário de edição de um candidato específico
    public function edit($id)
    {
        $candidato = Candidato::findOrFail($id);
        return view('candidato.edit', compact('candidato'));
    }

    // Atualiza os dados de um candidato específico
    public function update(Request $request, $id)
    {
        $candidato = Candidato::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:candidatos,email,' . $candidato->id,
            
            'telefone' => 'nullable|max:20',
            'cidade' => 'required|max:255',
            'experiencia' => 'required',
            'escolaridade' => 'required',
            'curriculo' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'vaga_id' => 'exists:vagas,id',
        ]);

        // Upload do currículo, se houver um novo arquivo
        if ($request->hasFile('curriculo')) {
            $curriculoPath = $request->file('curriculo')->store('curriculo', 'public');
            $candidato->curriculo = $curriculoPath;
        }

        $candidato->update($request->except(['curriculo']));

        return redirect()->route('candidato.index')->with('success', 'Candidato atualizado com sucesso!');
    }

    // Remove um candidato específico do banco de dados
    public function destroy($id)
    {
        $candidato = Candidato::findOrFail($id);
        $candidato->delete();

        return redirect()->route('candidato.index')->with('success', 'Candidato removido com sucesso!');
    }
}

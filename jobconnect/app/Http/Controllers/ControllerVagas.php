<?php

namespace App\Http\Controllers;

use App\Models\Vaga;    
use Illuminate\Http\Request;

class ControllerVagas extends Controller
{
    // Exibe a lista de vagas
    public function index()
    {
        $vagas = Vaga::all();
        return view('vagas.index', compact('vagas'));
    }

    // Exibe o formulário de criação de uma nova vaga
    public function create()
    {
        return view('vagas.create');
    }

    // Armazena uma nova vaga no banco de dados
    public function store(Request $request)
    {
        // Validação dos campos do formulário
        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'cidade' => 'required|max:100',
            'nome_empresa' => 'required|max:255',
            'regime_contratacao' => 'required|in:PJ,CLT',
            'pcd' => 'required|boolean',
            'modalidade_trabalho' => 'required|in:Home Office,Presencial',
            'escolaridade' => 'required|max:100',
            'salario' => 'nullable|numeric',
            'beneficios' => 'nullable|string',
        ]);

        // Criação da vaga no banco de dados
        Vaga::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'cidade' => $request->cidade,
            'nome_empresa' => $request->nome_empresa,
            'regime_contratacao' => $request->regime_contratacao,
            'pcd' => $request->pcd,
            'modalidade_trabalho' => $request->modalidade_trabalho,
            'escolaridade' => $request->escolaridade,
            'salario' => $request->salario,
            'beneficios' => $request->beneficios,
            'admin_id' => 1 //auth()->user()->id, // Assume que o admin está logado
        ]);

        // Redireciona para a lista de vagas com uma mensagem de sucesso
        return redirect()->route('vagas.index')->with('success', 'Vaga criada com sucesso!');
    }

    // Exibe uma vaga específica
    public function show(Vaga $vaga)
    {
        return view('vagas.show', compact('vaga'));
    }

    // Exibe o formulário de edição de uma vaga
    public function edit(Vaga $vaga)
    {
        return view('vagas.edit', compact('vaga'));
    }

    // Atualiza uma vaga existente no banco de dados
    public function update(Request $request, Vaga $vaga)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'required',
            'cidade' => 'required|max:100',
            'nome_empresa' => 'required|max:255',
            'regime_contratacao' => 'required|in:PJ,CLT',
            'pcd' => 'required|boolean',
            'modalidade_trabalho' => 'required|in:Home Office,Presencial',
            'escolaridade' => 'required|max:100',
            'salario' => 'nullable|numeric',
            'beneficios' => 'nullable|string',
        ]);

        $vaga->update($request->all());

        return redirect()->route('vagas.index')->with('success', 'Vaga atualizada com sucesso!');
    }

    // Remove uma vaga do banco de dados
    public function destroy(Vaga $vaga)
    {
        $vaga->delete();
        return redirect()->route('vagas.index')->with('success', 'Vaga excluída com sucesso!');
    }
}

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
        // Buscar o candidato associado ao usuário autenticado
        $userId = auth()->id(); // Obtém o ID do usuário autenticado
    
        // Busca o candidato relacionado ao usuário autenticado
        $candidatos = Candidato::where('user_id', $userId)->get();
        
    
        // Retorna a view com os candidatos filtrados
        return view('candidato.index', compact('candidatos'));
    }

    public function candidatura()
    {
        // Retorna a view com os candidatos filtrados
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
        
            if ($request->hasFile('curriculo')) {
                $curriculoPath = $request->file('curriculo')->store('curriculo', 'public');
            } else {
                return back()->withErrors(['curriculo' => 'O upload do currículo é obrigatório e deve ser um arquivo válido.']);
            }
        
            // Verifica se o usuário está autenticado
            if (auth()->check()) {
                Candidato::create([
                    'user_id' => auth()->user()->id, 
                    'telefone' => $request->telefone,
                    'endereco' => $request->endereco,
                    'experiencia' => $request->experiencia,
                    'escolaridade' => $request->escolaridade,
                    'curriculo' => $curriculoPath,
                ]);
                
        
                return redirect()->route('candidatos.index')->with('success', 'Candidato cadastrado com sucesso!');
            } else {
                return back()->withErrors(['user' => 'Você precisa estar logado para se candidatar.']);
            }
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

        $validatedData = $request->validate([
            'nome' => 'required|max:255',

            'telefone' => 'nullable|max:20',
            'cidade' => 'required|max:255',
            'experiencia' => 'required',
            'escolaridade' => 'required',
            'vaga_id' => 'exists:vagas,id',
        ]);

        $candidato->update($validatedData);

        return redirect()->route('candidatos.index')->with('success', 'Candidato atualizado com sucesso!');
    }


    // Remove um candidato específico do banco de dados
    public function destroy($id)
    {
        $candidato = Candidato::findOrFail($id);
        $candidato->delete();

        return redirect()->route('candidato.index')->with('success', 'Candidato removido com sucesso!');
    }

    public function candidaturas()
    {
        $user = auth()->user();

        // Recupere o candidato associado ao usuário
        $candidato = $user->candidato;

        // Recupere todas as candidaturas deste candidato
        $candidaturas = $candidato->candidaturas()->with('vaga')->get();

        return view('candidato.candidaturas', ['candidaturas' => $candidaturas]);
    }

   

}

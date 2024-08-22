<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{

    public function index() {

    
        return view('welcome');

    }
    /**
     * Show the form for creating a new resume.
     */
    public function create()
    {
        return view('resumes.create');
    }

    /**
     * Store a newly created resume in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'nacionalidade' => 'required|string|max:255',
            'estado_civil' => 'required|string|max:50',
            'link_linkedin' => 'nullable|url',
            'link_portfolio' => 'nullable|url',
            'habilidades' => 'nullable|array',
            'idiomas' => 'nullable|array',
            'cursos' => 'nullable|array',
        ]);
    
        // Criação do currículo com as colunas JSON
        $resume = Resume::create([
            'usuario_id' => auth()->user()->id,
            'nome_completo' => $validatedData['nome_completo'],
            'data_nascimento' => $validatedData['data_nascimento'],
            'telefone' => $validatedData['telefone'],
            'endereco' => $validatedData['endereco'],
            'nacionalidade' => $validatedData['nacionalidade'],
            'estado_civil' => $validatedData['estado_civil'],
            'link_linkedin' => $validatedData['link_linkedin'],
            'link_portfolio' => $validatedData['link_portfolio'],
            'habilidades' => isset($validatedData['habilidades']) ? json_encode($validatedData['habilidades']) : json_encode([]),
            'idiomas' => isset($validatedData['idiomas']) ? json_encode($validatedData['idiomas']) : json_encode([]),
            'cursos' => isset($validatedData['cursos']) ? json_encode($validatedData['cursos']) : json_encode([]),
        ]);
    

        return redirect()->route('resumes.show', $resume->id)
                         ->with('success', 'Currículo criado com sucesso!');
    }

    /**
     * Display the specified resume.
            */public function show($id)
        {
            // Buscar o currículo no banco de dados pelo ID
            $resume = Resume::find($id);

            // Se encontrado, passe o currículo para a view
            return view('resumes.show', compact('resume'));
        }

    

    /**
     * Show the form for editing the specified resume.
     */
    public function edit(Resume $resume)
    {
        return view('resumes.edit', compact('resume'));
    }

    /**
     * Update the specified resume in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'data_nascimento' => 'nullable|date',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'nacionalidade' => 'nullable|string|max:50',
            'estado_civil' => 'nullable|string|max:50',
            'link_linkedin' => 'nullable|url|max:255',
            'link_portfolio' => 'nullable|url|max:255',
            'habilidades' => 'nullable|array',
            'idiomas' => 'nullable|array',
            'cursos' => 'nullable|array',
        ]);

        // Atualizando o currículo
        $resume->update([
            'nome_completo' => $validatedData['nome_completo'],
            'data_nascimento' => $validatedData['data_nascimento'],
            'telefone' => $validatedData['telefone'],
            'endereco' => $validatedData['endereco'],
            'nacionalidade' => $validatedData['nacionalidade'],
            'estado_civil' => $validatedData['estado_civil'],
            'link_linkedin' => $validatedData['link_linkedin'],
            'link_portfolio' => $validatedData['link_portfolio'],
            'habilidades' => json_encode($validatedData['habilidades']), // Convertendo para JSON
            'idiomas' => json_encode($validatedData['idiomas']), // Convertendo para JSON
            'cursos' => json_encode($validatedData['cursos']), // Convertendo para JSON
        ]);

        return redirect()->route('resumes.show', $resume->id)
                         ->with('success', 'Currículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resume from storage.
     */
    public function destroy(Resume $resume)
    {
        $resume->delete();

        return redirect()->route('resumes.index')
                         ->with('success', 'Currículo excluído com sucesso!');
    }
}

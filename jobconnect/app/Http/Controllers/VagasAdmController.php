<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagasAdmController extends Controller
{
    public function index()
    {
        $vagas = Vaga::all(); // Carregar todas as vagas
        return view('vagasadm.index', compact('vagas'));
    }

    public function edit(Vaga $vaga)
    {
        return view('vagas.edit', compact('vaga'));
    }
    

    public function destroy(Vaga $vaga)
    {
        $vaga->delete();
        return redirect()->route('vagasadm.index')->with('success', 'Vaga excluída com sucesso.');
    }

    public function candidatos(Vaga $vaga)
    {
        $candidaturas = $vaga->candidaturas; // Assumindo que você tenha uma relação com candidaturas
        return view('vagasadm.candidatos', compact('vaga', 'candidaturas'));
    }
}

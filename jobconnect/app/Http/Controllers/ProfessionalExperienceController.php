<?php

namespace App\Http\Controllers;

use App\Models\ProfessionalExperience;
use Illuminate\Http\Request;

class ProfessionalExperienceController extends Controller
{
    public function store(Request $request)
    {
        $professionalExperience = ProfessionalExperience::create($request->all());
        return response()->json($professionalExperience, 201);
    }

    public function update(Request $request, $id)
    {
        $professionalExperience = ProfessionalExperience::findOrFail($id);
        $professionalExperience->update($request->all());
        return response()->json($professionalExperience, 200);
    }

    public function destroy($id)
    {
        ProfessionalExperience::destroy($id);
        return response()->json(null, 204);
    }
}

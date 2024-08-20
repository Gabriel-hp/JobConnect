<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function store(Request $request)
    {
        $education = Education::create($request->all());
        return response()->json($education, 201);
    }

    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);
        $education->update($request->all());
        return response()->json($education, 200);
    }

    public function destroy($id)
    {
        Education::destroy($id);
        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetail;
use Illuminate\Http\Request;

class PersonalDetailController extends Controller
{
    public function store(Request $request)
    {
        $personalDetail = PersonalDetail::create($request->all());
        return response()->json($personalDetail, 201);
    }

    public function update(Request $request, $id)
    {
        $personalDetail = PersonalDetail::findOrFail($id);
        $personalDetail->update($request->all());
        return response()->json($personalDetail, 200);
    }

    public function destroy($id)
    {
        PersonalDetail::destroy($id);
        return response()->json(null, 204);
    }
}

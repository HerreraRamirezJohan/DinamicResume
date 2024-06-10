<?php

namespace App\Http\Controllers;

use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EducationController extends Controller
{
    public function store(StoreEducationRequest $request){
        $validated = $request->validated();

        $user = $request->user();

        $education = $user->education()->create($validated);

        return response()->json([
            'message' => 'created successfuly',
            'data' => $education,
        ]);
    }

    public function getAll(Request $request) {
        $user  = $request->user();

        return response()->json([
            'message' => 'Element founded successfully',
            'data' => $user->load('education'),
        ],200);
    }

    public function update(UpdateEducationRequest $request, int $id){
        $validated = $request->validated();

        $education = Education::findOrFail($id);
        Gate::authorize('update', $education);

        $education->update($validated);

        return response()->json([
            'message' => 'Element saved successfully',
            'data' => $education
        ]);
    }
}

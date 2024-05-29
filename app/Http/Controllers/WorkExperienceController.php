<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkExperience\StoreWorkExperienceRequest;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WorkExperienceController extends Controller
{
    public function store(StoreWorkExperienceRequest $request){
        $validated = $request->validated();

        $user = $request->user();
        $workExperience = $user->workExperience()->create($validated);

        return response()->json([
            'message' => 'created successfuly',
            'data' => $workExperience,
        ]);
    }

    public function getAll(Request $request){
        $user = $request->user();

        return response()->json([
            'message' => 'Element founded successfully.',
            'data' => $user->workExperience,
        ]);
    }

    public function update(StoreWorkExperienceRequest $request, int $id){
        $validated = $request->validated();

        $workExperience = WorkExperience::findOrFail($id);
        Gate::authorize('update', $workExperience);
        $workExperience->update($validated);

        return response()->json([
            'message' => 'Element saved successfully',
            'data' => $workExperience
        ]);


    }
}

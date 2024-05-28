<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkExperience\StoreWorkExperienceRequest;

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
}

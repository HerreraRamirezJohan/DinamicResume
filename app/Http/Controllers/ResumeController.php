<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResumeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $resume = Resume::create([
            "user_id" => $user->id,
        ]);

        return response()->json([
            'message' => 'Created successfully',
            'data' => $resume,
        ], 201);
    }

    /**
     * Get the specified resource by id
     */
    public function show(Request $request, int $id)
    {
        $resume = Resume::find($id)->load('workExperience');

        if (!$resume)
            return response()->json(status: 204);

        Gate::authorize('view', $resume);

        $contactInformation = $request->user()->contactInformation;

        return response()->json([
            'message' => 'Element founded successfully',
            'data' => [
                'resume' => $resume,
                'contact_information' => $contactInformation,
            ],
        ]);
    }

    public function getAll(Request $request){
        $user = $request->user();

        return response()->json([
            'data' => $user->resumes,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $resume = Resume::find($id);

        if (!$resume)
            return response()->json([
                'message' => 'Element not found',
                'search' => $id
            ]);

        $resume->delete();

        return response()->json([
            'message' => 'Deleted successfully',
            'data' => $resume,
        ]);
    }

    public function addWorkExperience(int $resume_id, int $work_id){
        $resume = Resume::findOrFail($resume_id);
        $workExperience = WorkExperience::findOrFail($work_id);

        Gate::authorize('addWorkExperience', [$resume, $workExperience]);

        try {
            $resume->workExperience()->attach($workExperience->id);
        } catch (\Throwable $th) {
            throw new \Exception('This work experice has already been saved');
        }

        return response()->json([
            'message' => 'Added successfully',
        ]);
    }
}

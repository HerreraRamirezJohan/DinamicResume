<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resume\StoreResumeRequest;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resume = Resume::create([
            "user_id" => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Created successfully',
            'data' => $resume,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resume $resume)
    {
        //
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
}

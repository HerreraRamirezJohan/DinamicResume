<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInformation\UpdateContactInformationRequest;
use App\Models\ContactInformation;
use Illuminate\Support\Facades\Gate;

class ContactInformationController extends Controller
{
    public function update(UpdateContactInformationRequest $request, int $id){
        $validated = $request->validated();

        $contactInformation = ContactInformation::find($id);
        if (!$contactInformation)
            return response()->json(status: 204);

        Gate::authorize('update', $contactInformation);

        $contactInformation->update($validated);

        return response()->json([
            'message' => 'Element updated correctly',
            'data' => $contactInformation,
        ]);
    }
}

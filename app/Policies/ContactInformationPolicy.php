<?php

namespace App\Policies;

use App\Models\ContactInformation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactInformationPolicy
{
    public function update(
        User $user,
        ContactInformation $contactInformation
    ) {
        return $user->id === $contactInformation->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}

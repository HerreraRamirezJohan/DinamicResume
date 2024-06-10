<?php

namespace App\Policies;

use App\Models\Education;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EducationPolicy
{
    public function update(User $user, Education $education){
        return $user->id === $education->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}

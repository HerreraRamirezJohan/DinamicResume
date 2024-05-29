<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Auth\Access\Response;

class WorkExperiencePolicy
{
    public function update(User $user, WorkExperience $workExperience){
        return $user->id === $workExperience->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}

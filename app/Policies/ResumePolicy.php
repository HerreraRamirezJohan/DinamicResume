<?php

namespace App\Policies;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResumePolicy
{
    /**
     * Verify if is the resume's owner
     * @return Illuminate\Auth\Access\Response
     */
    public function view(User $user, Resume $resume) : Response{
        return $user->id === $resume->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}

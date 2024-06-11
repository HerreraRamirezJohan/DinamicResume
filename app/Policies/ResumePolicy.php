<?php

namespace App\Policies;

use App\Models\Education;
use App\Models\Resume;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Auth\Access\Response;

class ResumePolicy
{
    /**
     * Verify if is the resume's owner
     * @return Illuminate\Auth\Access\Response
     */
    public function view(User $user, Resume $resume): Response
    {
        return $user->id === $resume->user_id
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    public function addWorkExperience(
        User $user,
        Resume $resume,
        WorkExperience $workExperience
    ) {
        return $user->id === $resume->user_id && $user->id === $workExperience->user_id
            ? Response::allow()
            : Response::denyAsNotFound('The resume or work experience was not found');
    }
    public function addEducation(
        User $user,
        Resume $resume,
        Education $education
    ) {
        return $user->id === $resume->user_id && $user->id === $education->user_id
            ? Response::allow()
            : Response::denyAsNotFound('The resume or work experience was not found');
    }
}

<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApplicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewApplications(User $user, Job $job): bool
    {
        return $user->emploer->id == $job->employer->id;
    }

}

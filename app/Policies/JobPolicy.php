<?php

namespace App\Policies;

use App\Models\User;
use App\Models\job;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function viewAnyEmployer(User $user): bool
    {
        return $user->employer->user_id == $user->id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, job $job): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer != null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, job $job): bool
    {
        if ($job->employer->user_id !== $user->id) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, job $job): bool
    {
        return $user->employer->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, job $job): bool
    {
        return $user->employer->user_id == $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, job $job): bool
    {
        return $user->employer->user_id == $user->id;
    }

    public function apply(User $user, job $job):bool
    {
        return !$job->hasAlreadyApplied($user) ;
    }

    public function employerCantApply(User $user, job $job):bool
    {
        return $job->employer_id != $user->employer->id ;
    }
}

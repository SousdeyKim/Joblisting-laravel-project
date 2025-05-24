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
    public function edit(User $user, job $job):bool{
        return $job->employer->user->is($user); // return as boolean
         
    }
}

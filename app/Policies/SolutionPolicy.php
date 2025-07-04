<?php

namespace App\Policies;

use App\Models\Solution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolutionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Solution $solution): bool
    {
        if ($user->isTeacher()) {
            // Teachers can view solutions for tasks in their subjects
            return (int)$solution->task->subject->user_id === (int)$user->id;
        } else {
            // Students can view their own solutions
            return (int)$solution->user_id === (int)$user->id;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Solution $solution)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Solution $solution)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Solution $solution)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Solution $solution)
    {
        //
    }

    public function evaluate(User $user, Solution $solution): bool
    {
        // Only teachers who own the subject can evaluate solutions
        // Only teachers who own the subject can evaluate solutions
        return $user->isTeacher() && (int)$solution->task->subject->user_id === (int)$user->id;
    }
}

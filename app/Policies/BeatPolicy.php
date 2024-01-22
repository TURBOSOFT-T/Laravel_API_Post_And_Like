<?php

namespace App\Policies;

use App\Models\Beat;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BeatPolicy
{
    use HandlesAuthorization;

    // app/Policies/BeatPolicy.php

    public function viewPremiumFile(User $user, Beat $beat)
    {
        // Check if the user is authorized to view the premium file
        return $user->isPremiumMember();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Beat $beat)
    {
        //
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
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Beat $beat)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Beat $beat)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Beat $beat)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Beat  $beat
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Beat $beat)
    {
        //
    }
}
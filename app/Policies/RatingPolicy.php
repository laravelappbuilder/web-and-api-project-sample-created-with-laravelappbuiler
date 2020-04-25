<?php

namespace App\Policies;

use App\User;
use App\Rating;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class RatingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the rating.
     *
     * @param  \App\User  $user
     * @param  \App\Rating  $rating
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true ) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the rating.
     *
     * @param  \App\User  $user
     * @param  \App\Rating  $rating
     * @return mixed
     */
    public function view(?User $user, Rating $rating)
    {
        return true;
    }

    /**
     * Determine whether the user can update the rating.
     *
     * @param  \App\User  $user
     * @param  \App\Rating  $rating
     * @return mixed
     */
    public function update(User $user, Rating $rating)
    {
      if ($user->id==$rating->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the rating.
     *
     * @param  \App\User  $user
     * @param  \App\Rating  $rating
     * @return mixed
     */
    public function delete(User $user, Rating $rating)
    {
      if ($user->id==$rating->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the rating.
     *
     * @param  \App\User  $user
     * @param  \App\Rating  $rating
     * @return mixed
     */
    public function restore(User $user, Rating $rating)
    {
      if ($user->id==$rating->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the rating.
     *
     * @param  \App\User  $user
     * @param  \App\Rating  $rating
     * @return mixed
     */
    public function forceDelete(User $user, Rating $rating)
    {
      if ($user->id==$rating->user_id ) {
        return true;
      }
    }
}

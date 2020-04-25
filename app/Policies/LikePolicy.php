<?php

namespace App\Policies;

use App\User;
use App\Like;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true ) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function view(?User $user, Like $like)
    {
        return true;
    }

    /**
     * Determine whether the user can update the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function update(User $user, Like $like)
    {
      if ($user->id==$like->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function delete(User $user, Like $like)
    {
      if ($user->id==$like->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function restore(User $user, Like $like)
    {
      if ($user->id==$like->user_id ) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the like.
     *
     * @param  \App\User  $user
     * @param  \App\Like  $like
     * @return mixed
     */
    public function forceDelete(User $user, Like $like)
    {
      if ($user->id==$like->user_id ) {
        return true;
      }
    }
}

<?php

namespace App\Policies;

use App\User;
use App\Tag;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return mixed
     */
    public function view(User $user, Tag $tag)
    {
        if($user->IsAdmin() || $user->IsSuperUser()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return mixed
     */
    public function update(User $user, Tag $tag)
    {
      if ($user->id==$tag->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return mixed
     */
    public function delete(User $user, Tag $tag)
    {
      if ($user->id==$tag->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return mixed
     */
    public function restore(User $user, Tag $tag)
    {
      if ($user->id==$tag->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return mixed
     */
    public function forceDelete(User $user, Tag $tag)
    {
      if ($user->id==$tag->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }
}

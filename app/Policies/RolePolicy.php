<?php

namespace App\Policies;

use App\User;
use App\Role;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create and store the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function create(User $user)
    {
      if (Auth::check()==true  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        if($user->IsAdmin() || $user->IsSuperUser()){
					return true;
				}
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
      if ($user->id==$role->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
      if ($user->id==$role->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
      if ($user->id==$role->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
      if ($user->id==$role->user_id  || $user->IsAdmin() || $user->IsSuperUser()) {
        return true;
      }
    }
}
